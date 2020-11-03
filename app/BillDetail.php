<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "tbl_bill_detail";
    protected $primaryKey = 'bill_detail_id';

    public function product(){
    	return $this->belongsTo('App\Product','bill_detail_product_id','product_id');
    }

    public function bill(){
    	return $this->belongsTo('App\Bill','bill_detail_bill_id','bill_id');
    }
}
