@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chi tiết hóa đơn
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
                    <th>Mã hóa đơn </th>
                    <th>Sản phẩm</th>
                    <th>Kích thước sản phẩm</th>
                    <th>Màu sản phẩm</th>
                    <th>Số lượng hóa đơn</th>
                    <th>Đơn giá</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($billdetail as $bd)
                <tr class="odd gradeX" align="center">
                    <td>{{$bd->bill_detail_id}}</td>
                    <td>{{$bd->bill_detail_bill_id}}</td>
                    <td>{{$bd->product->product_name}}</td>
                    <td>{{$bd->bill_detail_size}}</td>
                    <td>{{!empty($bd->bill_detail_color) ? $bd->bill_detail_color : ''}}</td>
                    <td>{{$bd->bill_detail_quantity}}</td>
                    <td>{{$bd->bill_detail_unit_price}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/billdetail/delete/{{$bd->bill_detail_id}}"> Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/billdetail/edit/{{$bd->bill_detail_id}}">Sửa</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection