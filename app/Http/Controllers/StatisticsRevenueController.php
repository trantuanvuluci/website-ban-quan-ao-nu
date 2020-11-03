<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class StatisticsRevenueController extends Controller
{
    //
    public function index()
    {
        $product = Product::all();
        return view('admin.statistics_revenue.index', ['product'=>$product]);
    }
}
