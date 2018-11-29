<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryData extends Model
{
    //
    protected $table = 'delivery_data';
    public $timestamps = false;

    public function scopeInsertData($query,$name,$post_num,$addr,$phone,$tel,$product_num,$buyer,$seller){
        
    	$data = [
    		'name' => $name,
    		'post_num' => $post_num,
    		'addr' => $addr,
    		'phone' => $phone,
    		'tel' => $tel,
    		'product_num' => $product_num,
    		'buyer' => $buyer,
    		'seller' => $seller
    	];
//
    	$query -> insert($data);
    }

    public function scopeGetProductNum($query,$product_num){
        
        $data = $query -> where('product_num','=',$product_num)->get();
       
        return $data ;
    }

    public function scopeInsertInvoiceNumber($query,$product_num,$invoice_number,$code){
    	$data = [
    		'invoice_number' => $invoice_number,
    		'code' => $code
    	];
        
        $query -> where('product_num','=',$product_num)->update($data);
    }
}