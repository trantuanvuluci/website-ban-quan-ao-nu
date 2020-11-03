@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Hóa đơn
                <small>Danh sách</small>
            </h1>
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
                    <th>Khách hàng </th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Hình thức thanh toán</th>
                    <th>Ghi chú</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bill as $bl)
                <tr class="odd gradeX" align="center">
                    <td>{{$bl->bill_id}}</td>
                    <td>{{$bl->customer->customer_name}}</td>
                    <td>{{$bl->bill_date_order}}</td>
                    <td>{{$bl->bill_total}}</td>
                    <td>{{$bl->bill_payment}}</td>
                    <td>{{$bl->bill_note}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/bill/delete/{{$bl->bill_id}}"> Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/bill/edit/{{$bl->bill_id}}">Sửa</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection