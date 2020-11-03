@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết hóa đơn
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif

                @if(session('notify'))
                    <div class="alert alert-success">
                        {{session('notify')}}
                    </div>
                @endif

                <form action="admin/billdetail/add" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Mã hóa đơn</label>
                        <select class="form-control" name="bill_id">
                            @foreach($bill as $bl)
                                <option value="{{$bl->bill_id}}">{{$bl->bill_id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sản phẩm</label>
                        <select class="form-control" name="product_name">
                            @foreach($product as $pd)
                                <option value="{{$pd->product_id}}">{{$pd->product_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Số lượng sản phẩm</label>
                        <input class="form-control" name="bill_detail_quantity" placeholder="Vui lòng nhập số lượng sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Đơn giá</label>
                        <input class="form-control" name="bill_detail_unit_price" placeholder="Vui lòng nhập giá cả hóa đơn" />
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
        <!-- /#page-wrapper -->

@endsection