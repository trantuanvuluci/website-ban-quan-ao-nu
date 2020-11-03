<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "tbl_type_products";
    protected $primaryKey = 'type_product_id';

    public function product(){
    	return $this->hasMany('App\Product','product_type_id','type_product_id');
    }
}
