@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khách hàng
                    <small>Sửa {{$customer->customer_name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($error->all() as $err)
                        {{$err}}<br>
                        @endforeach
                    </div>
                @endif

                @if(session('notify'))
                    <div class="alert alert-success">
                        {{session('notify')}}
                    </div>
                @endif

            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/customer/edit/{{$customer->customer_id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input class="form-control" name="customer_name" placeholder="Vui lòng nhập tên khách hàng" value="{{$customer->customer_name}}" />
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <select name="customer_gender" class="form-control" aria-invalid="false">
                            <option value="{{$customer->customer_gender}}">Nam</option>
                            <option value="{{$customer->customer_gender}}">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="customer_email" placeholder="Vui lòng nhập email" value="{{$customer->customer_email}}" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="customer_address" placeholder="Vui lòng nhập địa chỉ" value="{{$customer->customer_address}}" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="number" class="form-control" name="customer_phone" placeholder="Vui lòng nhập số điện thoại" value="{{$customer->customer_phone}}" />
                    </div>
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <input class="form-control" name="customer_note" placeholder="Vui lòng nhập ghi chú" value="{{$customer->customer_note}}" />
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
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