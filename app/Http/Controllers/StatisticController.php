<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bill;
use Carbon\Carbon;
use App\Product;
use App\User;
use App\ProductType;

class StatisticController extends Controller
{
    public function getStatistic()
    {
        $totalProduct = Product::count();
        $totalStatistic = Bill::sum('bill_total');
        $totalUser = User::count();
        $totalProductType = ProductType::count();
        $now = Carbon::now();

        $moneyDay = Bill::whereDay('created_at','=',date('d'))
            ->sum('bill_total');

        $moneyWeek = Bill::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->sum('bill_total');

        $moneyMonth = Bill::whereMonth('created_at','=',date('m'))
            ->sum('bill_total');

        $moneyYear = Bill::whereYear('created_at','=',date('Y'))
            ->sum('bill_total');

        $dataMoney = [
            [
                "name" => "Doanh thu ngày",
                "y"    => (int)$moneyDay
            ],
            [
                "name" => "Doanh thu tuần",
                "y"    => (int)$moneyWeek
            ],
            [
                "name" => "Doanh thu tháng",
                "y"    => (int)$moneyMonth
            ],
            [
                "name" => "Doanh thu năm",
                "y"    => (int)$moneyYear
            ]
        ];

        $viewData = [
            'totalProduct'     => $totalProduct,
            'totalStatistic'   => $totalStatistic,
            'totalUser'        => $totalUser,
            'totalProductType' => $totalProductType,
            'moneyDay'         => $moneyDay,
            'moneyWeek'        => $moneyWeek,
            'moneyMonth'       => $moneyMonth,
            'moneyYear'        => $moneyYear,
            'dataMoney'        => json_encode($dataMoney)
        ];  
    	return view('admin.overview.statistic',$viewData);
    }
}
