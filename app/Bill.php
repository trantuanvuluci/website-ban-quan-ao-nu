<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "tbl_bills";
    protected $primaryKey = 'bill_id';

    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','bill_detail_bill_id','bill_id');
    }

    public function customer(){
    	return $this->belongsTo('App\Customer','bill_customer_id','customer_id');
    }
}
