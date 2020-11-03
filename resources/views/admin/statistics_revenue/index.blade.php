@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thống kê doanh thu</h1>
            </div>

            @if(session('notify'))
                <div class="alert alert-success">
                    {{session('notify')}}
                </div>
            @endif

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Giá nhập</th>
                    <th>Giá bán</th>
                    <th>Đơn vị tính</th>
                    <th>SL nhập vào</th>
                    <th>SL bán ra</th>
                    <th>SL Tồn</th>
                    <th>TT nhập vào</th>
                    <th>TT bán ra</th>
                    <th>Doanh thu</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $totalAmountImportAll = 0;
                    $totalAmountBuyedAll = 0;
                    $totalPriceImportAll = 0;
                    $totalPriceBuyedAll = 0;
                @endphp
                @foreach($product as $pd)
                    <tr class="odd gradeX" align="center">
                        <td>{{$pd->product_id}}</td>
                        <td>{{$pd->product_name}}</td>
                        <td>{{number_format($pd->product_import_price)}} <sup>đ</sup></td>
                        <td>{{number_format(!empty($pd->product_promotion_price) ? $pd->product_promotion_price : $pd->product_unit_price)}} <sup>đ</sup></td>
                        <td>{{$pd->product_unit}}</td>
                        @php

                            $totalAll = intval($pd->product_quantity) + intval($pd->product_buyed);
                            $totalAmountImportAll = $totalAmountImportAll + $totalAll ;
                        @endphp
                        <td>{{ $totalAll }}</td>
                        @php
                            $totalAmountBuyedAll = $totalAmountBuyedAll + $pd->product_buyed;
                        @endphp
                        <td>{{$pd->product_buyed}}</td>
                        <td>{{$pd->product_quantity}}</td>
                        @php
                            $totalImport = 0;
                            $totalImport = $totalImport + ($totalAll * $pd->product_import_price);
                            $totalPriceImportAll = $totalPriceImportAll + $totalImport;
                        @endphp
                        <td>{{number_format($totalImport)}} <sup>đ</sup></td>
                        <td>
                            @php
                                $totalBuyedAll = 0;
                                $price = !empty($pd->product_promotion_price) ? $pd->product_promotion_price : $pd->product_unit_price;
                                $totalBuyedProduct =  intval($pd->product_buyed) * floatval($price);
                                $totalBuyedAll = $totalBuyedAll + $totalBuyedProduct;
                                $totalPriceBuyedAll = $totalPriceBuyedAll + $totalBuyedAll;
                            @endphp
                            {{number_format($totalBuyedAll)}} <sup>đ</sup>
                        </td>
                        <td>
                            {{number_format($totalBuyedAll - $totalImport)}} <sup>đ</sup>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>Tổng số sản phẩm nhập vào</th>
                        <th>Tổng số sản phẩm bán ra</th>
                        <th>Tổng số tiền nhập vào</th>
                        <th>Tổng số tiền bán ra</th>
                        <th>Tổng số doanh thu</th>
                    </tr>
                    <tr>
                        <td>{{number_format($totalAmountImportAll)}}</td>
                        <td>{{number_format($totalAmountBuyedAll)}}</td>
                        <td>{{number_format($totalPriceImportAll)}} <sup>đ</sup></td>
                        <td>{{number_format($totalPriceBuyedAll)}} <sup>đ</sup></td>
                        <td>{{number_format($totalPriceBuyedAll - $totalPriceImportAll)}} <sup>đ</sup></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
@endsection