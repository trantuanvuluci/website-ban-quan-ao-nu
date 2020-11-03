<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "tbl_products";
    protected $primaryKey = 'product_id';

    public function product_type(){
    	return $this->belongsTo('App\ProductType','product_type_id','type_product_id');
    }

    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','bill_detail_product_id','bill_detail_id');
    }
}
