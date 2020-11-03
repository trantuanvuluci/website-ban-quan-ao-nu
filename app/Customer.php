<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "tbl_customer";
    protected $primaryKey = 'customer_id';

    public function bill(){
    	return $this->hasMany('App\Bill','bill_customer_id','customer_id');
    }
}
