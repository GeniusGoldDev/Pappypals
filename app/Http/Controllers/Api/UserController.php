<?php namespace App\Http\Controllers\Api;
use App\User;
use App\Purchase;
use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use Response;
use App\Repository\Transformers\UserTransformer;
use \Illuminate\Http\Response as Res;
use Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends ApiController
{
    /**
     * @var \App\Repository\Transformers\UserTransformer
     * */
    protected $userTransformer;

    public function __construct(userTransformer $userTransformer)
    {
        $this->userTransformer = $userTransformer;
    }

    /**
     * @description: Api user authenticate method
     * @author: Adelekan David Aderemi
     * @param: email, password
     * @return: Json String response
     */
    public function authenticate(Request $request)
    {
        $rules = array (
            'email' => 'required|email',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator-> fails()){
            return $this->respondValidationError('Fields Validation Failed.', $validator->errors());
        }
        else{
            $user = User::where('email', $request['email'])->first();

            $credentials = ['email' => $request['email'], 'password' => $request['password']];
            if ( ! $token = JWTAuth::attempt($credentials)) {
                return $this->respondWithError("Invalid Email or Password");
            }

            if($user){
                $api_token = $user->api_token;
                if ($api_token == NULL){
                    return $this->_login($request['email'], $request['password']);
                }
                try{
                    $user = JWTAuth::toUser($api_token);
                    return $this->respond([
                        'status' => 'success',
                        'status_code' => $this->getStatusCode(),
                        'message' => 'Already logged in',
                        'user' => $this->userTransformer->transform($user)
                    ]);
                }catch(JWTException $e){
                    $user->api_token = NULL;
                    $user->save();
                    return $this->respondInternalError("Login Unsuccessful. An error occurred while performing an action!");
                }
            }
            else{
                return $this->respondWithError("Invalid Email or Password");
            }
        }
    }

    private function _login($email, $password)
    {
        $credentials = ['email' => $email, 'password' => $password];

        if ( ! $token = JWTAuth::attempt($credentials)) {
            return $this->respondWithError("User does not exist!");
        }
        $user = JWTAuth::toUser($token);
        $user->api_token = $token;
        $user->save();
        return $this->respond([
            'status' => 'success',
            'status_code' => $this->getStatusCode(),
            'message' => 'Login successful!',
            'data' => $this->userTransformer->transform($user)
        ]);
    }

    private function _registerUser($email, $password)
    {
        $credentials = ['email' => $email, 'password' => $password];

        if ( ! $token = JWTAuth::attempt($credentials)) {
            return $this->respondWithError("User does not exist!");
        }
        $user = JWTAuth::toUser($token);
        $user->api_token = $token;
        $user->save();
        return $this->respond([
            'status' => 'success',
            'status_code' => $this->getStatusCode(),
            'message' => 'Login successful!',
            'data' => $this->userTransformer->transform($user)
        ]);
    }

    /**
     * @description: Api user register method
     * @author: Adelekan David Aderemi
     * @param: lastname, firstname, username, email, password
     * @return: Json String response
     */
    public function register(Request $request)
    {
        $rules = array (
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:3'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator-> fails()){
            return $this->respondValidationError('Fields Validation Failed.', $validator->errors());
        }
        else{
            $user = User::create([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'password' => \Hash::make($request['password']),
            ]);
            return $this->_registerUser($request['email'], $request['password']);
        }
    }
    
    public function update(Request $request)
    {        
        $user = User::where('id', $request['uid'])->first();
        if($user){
            $api_token = $user->api_token;
            if ($api_token == $request['api_token']) {

                $purchase = Purchase::where('uid', $request['uid'])->where('transaction_id', $request['transaction_id'])->first();
                if (!$purchase) {
                    $purchase = new Purchase;
                }
                $purchase -> uid = $request['uid'];
                $purchase -> product_id = $request['product_id'];
                $purchase -> transaction_id = $request['transaction_id'];
                $purchase -> original_transaction_id = $request['original_transaction_id'];
                $purchase -> purchase_date = $request['purchase_date'];
                $purchase -> purchase_date_ms = $request['purchase_date_ms'];
                $purchase -> purchase_date_pst = $request['purchase_date_pst'];
                $purchase -> original_purchase_date = $request['original_purchase_date'];
                $purchase -> original_purchase_date_ms = $request['original_purchase_date_ms'];
                $purchase -> original_purchase_date_pst = $request['original_purchase_date_pst'];
                $purchase -> expires_date = $request['expires_date'];
                $purchase -> expires_date_ms = $request['expires_date_ms'];
                $purchase -> expires_date_pst = $request['expires_date_pst'];
                $purchase -> web_order_line_item_id = $request['web_order_line_item_id'];
                $purchase -> is_trial_period = $request['is_trial_period'];
                $purchase -> save();

                $user -> status = 1;
                $user -> save();
                return $this->respond([
                    'status' => 'success',
                    'status_code' => $this->getStatusCode(),
                    'message' => 'Updated successful!',
                    'data' => $this->userTransformer->updateUser($user, $purchase)
                ]);
            } else {
                return $this->respondWithError("User was not authorized");
            }
            
        }
        else{
            return $this->respondWithError("User does not exist");
        }
    }


    /**
     * @description: Api user logout method
     * @author: Adelekan David Aderemi
     * @param: null
     * @return: Json String response
     */
    public function logout($api_token)
    {
        try{
            $user = JWTAuth::toUser($api_token);
            $user->api_token = NULL;
            $user->save();
            JWTAuth::setToken($api_token)->invalidate();
            $this->setStatusCode(Res::HTTP_OK);
            return $this->respond([
                'status' => 'success',
                'status_code' => $this->getStatusCode(),
                'message' => 'Logout successful!',
            ]);

        }catch(JWTException $e){
            return $this->respondInternalError("An error occurred while performing an action!");
        }
    }
}