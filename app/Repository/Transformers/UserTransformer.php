<?php
namespace App\Repository\Transformers;

class UserTransformer extends Transformer{

    public function transform($user){
        return [
            'UID' => $user->id,
            'status' => $user->status,
            'api_token' => $user->api_token,
        ];
    }   

    public function updateUser($user, $purchase){
        return [
            'UID' => $user->id,
            'transaction_id' => $purchase->transaction_id,
            'product_id' => $purchase -> product_id,
            'original_transaction_id' => $purchase -> original_transaction_id,
            'purchase_date' => $purchase -> purchase_date,
            'purchase_date_ms' => $purchase -> purchase_date_ms,
            'purchase_date_pst' => $purchase -> purchase_date_pst,
            'original_purchase_date' => $purchase -> original_purchase_date,
            'original_purchase_date_ms' => $purchase -> original_purchase_date_ms,
            'original_purchase_date_pst' => $purchase -> original_purchase_date_pst,
            'expires_date' => $purchase -> expires_date,
            'expires_date_ms' => $purchase -> expires_date_ms,
            'expires_date_pst' => $purchase -> expires_date_pst,
            'web_order_line_item_id' => $purchase -> web_order_line_item_id,
            'is_trial_period' => $purchase -> is_trial_period,
            'status' => $user->status,
        ];
    }
}