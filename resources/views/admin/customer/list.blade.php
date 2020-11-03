@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Khách hàng
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
                    <th>Tên khách hàng</th>
                    <th>Giới tính</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Ghi chú</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customer as $cm)
                <tr class="odd gradeX" align="center">
                    <td>{{$cm->customer_id}}</td>
                    <td>{{$cm->customer_name}}</td>
                    <td>{{$cm->customer_gender}}</td>
                    <td>{{$cm->customer_email}}</td>
                    <td>{{$cm->customer_address}}</td>
                    <td>{{$cm->customer_phone}}</td>
                    <td>{{$cm->customer_note}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/customer/delete/{{$cm->customer_id}}"> Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/customer/edit/{{$cm->customer_id}}">Sửa</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection