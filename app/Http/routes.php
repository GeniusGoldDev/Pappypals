<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group( ['middleware' => 'auth' ], function()
{
    
    Route::group(['prefix' => 'account','middleware' => ['securitycheck','revalidate']], function() {
        Route::get('/',['uses' => '\App\Http\Controllers\PaymentControllers@getAccounts', 'as' => 'subscription',  ]);
    });
    Route::group(['prefix' => 'eq','middleware' => ['securitycheck','revalidate']], function() {
        Route::get('/',['uses' => '\App\Http\Controllers\HomeControllers@getEQ',  ]);
    });
  
    Route::resource('playTogether', 'PlayTogethercontroller');
    Route::get('/playbord/{slug}', 'PlayTogethercontroller@showPost');
    Route::get('get_data', 'PlayTogethercontroller@showreleted');
    Route::get('/update_playTogether/{id}', 'PlayTogethercontroller@update');
    Route::post('playTogether/create','PlayTogethercontroller@store');

 
    Route::group(['prefix' => 'articles','middleware' => ['securitycheck','revalidate']], function() {
        Route::get('/',['uses' => '\App\Http\Controllers\HomeControllers@getarticles@postjoin',  ]);
    });


    Route::resource('activities', 'ActiviteController');
    Route::get('get_activities_data', 'ActiviteController@showreleted');
    Route::post('activities/create','ActiviteController@store');

    Route::group(['prefix' => 'videos','middleware' => ['securitycheck','revalidate']], function() {
        Route::get('/',['uses' => '\App\Http\Controllers\HomeControllers@getvideos',  ]);
    });

    Route::group(['prefix' => 'Activity','middleware' => ['securitycheck','revalidate']], function() {
        Route::get('/',['uses' => '\App\Http\Controllers\LogsController@index',  ]);
        
    });
    Route::group(['prefix' => 'settings','middleware' => ['securitycheck','revalidate']], function() {
        Route::get('/',['uses' => '\App\Http\Controllers\PaymentControllers@getSettings',  ]);
        
    });


});
Route::group( ['middleware' => 'revalidate' ], function()
{
Route::get('/', [
        'uses' => '\App\Http\Controllers\HomeControllers@home', 
        'as' => 'home', 
]);
});
/*Route::get('/', [
    'uses' => '\App\Http\Controllers\HomeControllers@home', 
    'as' => 'home', 
])->middleware('securitycheck');*/

Route::post('/feedback', [
    'uses' => '\App\Http\Controllers\AuthControllers@feedback', 
    'as' => 'feedbak', 
]);

Route::get('/alert', function(){
  return redirect()->route('home')->with('info', 'knazz');
});
Route::get('/contact', [
    'uses' => '\App\Http\Controllers\HomeControllers@getcontact', 
    'as' => 'contact', 
]);
Route::get('/faq', [
    'uses' => '\App\Http\Controllers\HomeControllers@getfaq', 
    'as' => 'faq', 
]);
Route::get('/signup',['uses' => '\App\Http\Controllers\AuthControllers@getSignup',]);

Route::get('/signin',['uses' => '\App\Http\Controllers\AuthControllers@getSignin',]);

Route::post('/signup',[
    'uses' => '\App\Http\Controllers\AuthControllers@postSignup', 
    'as' => 'postsignup',  
]);

Route::post('/signin',[
    'uses' => '\App\Http\Controllers\AuthControllers@postSignin', 
    'as' => 'postsignin',
    
]);
/*Route::get('/signout', '\App\Http\Controllers\AuthControllers@postSignOut');*/
Route::get('/signout',[
    'uses' => '\App\Http\Controllers\AuthControllers@postSignOut', 
    'as' => 'postSignOut',
]);
Route::post('/create-account',[
    'uses' => '\App\Http\Controllers\AuthControllers@postcreateAccount', 
    'as' => 'postcreateAccount',  
]);
Route::get('/create-account',[
    'uses' => '\App\Http\Controllers\AuthControllers@getcreateAccount', 
    'as' => 'Auth.create-account',  
   // 'middleware' => ['guest'], 
]);

/******
*
* PATMENT  
*
******************************/ 
Route::group(['prefix' => 'account','middleware' => ['securitycheck']], function()
{
    //Route::get('/',['uses' => '\App\Http\Controllers\PaymentControllers@getAccounts', 'as' => 'subscription',  ]);
    Route::post('/',['uses' => '\App\Http\Controllers\PaymentControllers@postjoin',]);
});



Route::group(['prefix' => 'Join'], function()
{
    Route::get('/',[
        'uses' => '\App\Http\Controllers\AuthControllers@getPassword', 
        'as' => 'subscription',  
        //'middleware' => ['guest'], 
    ]);
    Route::post('/',[
        'uses' => '\App\Http\Controllers\AuthControllers@postPassword', 
        //'middleware' => ['guest'], 
    ]);
});
Route::group(['prefix' => 'ChangePassword'], function()
{
    Route::get('/',[
        'uses' => '\App\Http\Controllers\AuthControllers@getChangePassword', 
        'as' => 'ChangePassword',  
        //'middleware' => ['guest'], 
    ])->name('ChangePassword');
    Route::post('/',[
        'uses' => '\App\Http\Controllers\AuthControllers@postPassword', 
        //'middleware' => ['guest'], 
    ])->name('ChangePassword');
});

Route::group(['prefix' => 'changeEmail'], function()
{
    Route::get('/',[
        'uses' => '\App\Http\Controllers\AuthControllers@getchangeEmail', 
        'as' => 'changeEmail',  
        //'middleware' => ['guest'], 
    ])->name('changeEmail');
    Route::post('/',[
        'uses' => '\App\Http\Controllers\AuthControllers@postemail', 
        //'middleware' => ['guest'], 
    ])->name('changeEmail');
});

Route::group(['prefix' => 'SecurityCheck'], function()
{
    Route::get('/',[
        'uses' => '\App\Http\Controllers\AuthControllers@getSecurtyCheck', 
        'as' => 'subscription',  
        //'middleware' => ['guest'], 
    ])->name('chk_security');

    Route::post('/',[
        'uses' => '\App\Http\Controllers\AuthControllers@postSecurtyCheck', 
        //'middleware' => ['guest'], 
    ]);
});


Route::get('/cancel',['uses' => '\App\Http\Controllers\PaymentControllers@canceljoin', 'as' => 'cancel', ]);
Route::get('/upgrade',['uses' => '\App\Http\Controllers\PaymentControllers@upgrade', 'as' => 'upgrade', ]);
// Star fixing MVC structure 
Route::resource('subusers', 'SubUserController');
Route::post('subusers/update','SubUserController@update');
Route::post('subusers/create','SubUserController@store');
Route::post('/subusers/{Id}/','SubUserController@destroy');
Route::get('/subusers/{Id}/delete', 'SubUserController@delete');
Route::post('subusers/select','SubUserController@select');
//Route::get('/Activity', 'LogsController@index');
Route::resource('dashboard', 'DashBoardController');
Route::post('order-post', ['as'=>'order-post','uses'=>'PaymentControllers@postjoin']);
Route::get('user/invoice/{invoice}', function (Request $request, $invoiceId) {
    return $request->user()->downloadInvoice($invoiceId, [
        'vendor'  => 'Pappy Pals',
        'product' => 'Pappy Pals Subscription',
    ]);
});
//password recovery
Route::controllers([
   'password' => 'PasswordController'
]);
Route::get('/ForgotPassword', 'PasswordController@request');
//session controller
Route::post('/session','SessionController@updateSession'); 
//Language Route
Route::post('/language', array(
    'before' => 'csrf',
    'as' => 'language-chooser',
    'uses' => 'LanguageController@chooser',
    ));
//The belows are for the REST api//
Route::group(['middleware' => 'cors', 'prefix' => '/rest'], function () {
    Route::get('/login', 'ApiController@getlogin');
    Route::post('/login', 'ApiController@postlogin');
});

//adminpanel
Route::resource('/admin', 'adminpanel@index');

Route::get('/adminstart', 'PaymentControllers@start');

// rest api for ios

Route::group(['middleware' => 'cors', 'prefix' => '/api/v1'], function () {
    Route::post('/login', 'Api\UserController@authenticate');
    Route::post('/register', 'Api\UserController@register');
    Route::post('/update', 'Api\UserController@update');
    Route::post('/getUserData', 'Api\UserController@getUserData');
    Route::get('/logout/{api_token}', 'Api\UserController@logout');
});