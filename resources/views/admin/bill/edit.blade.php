@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hóa đơn
                    <small>Sửa {{$bill->bill_id}}</small>
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
                <form action="admin/bill/edit/{{$bill->bill_id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Khách hàng</label>
                        <select class="form-control" name="customer_name">
                            @foreach($customer as $cm)
                                <option 
                                @if($bill->bill_customer_id == $cm->customer_id)
                                    {{"selected"}}
                                @endif
                                 value="{{$cm->customer_id}}">{{$cm->customer_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ngày đặt hàng</label>
                        <input type="date" class="form-control" name="bill_date_order" placeholder="Vui lòng nhập ngày đặt hàng" value="{{$bill->bill_date_order}}" />
                    </div>
                    <div class="form-group">
                        <label>Tổng tiền</label>
                        <input class="form-control" name="bill_total" placeholder="Vui lòng nhập tổng tiền hóa đơn" value="{{$bill->bill_total}}" />
                    </div>
                    <div class="form-group">
                        <label>Hình thức thanh toán</label>
                        <input class="form-control" name="bill_payment" placeholder="Vui lòng nhập hình thức thanh toán" value="{{$bill->bill_payment}}" />
                    </div>
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <input class="form-control" name="bill_note" placeholder="Vui lòng nhập ghi chú" value="{{$bill->bill_note}}" />
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