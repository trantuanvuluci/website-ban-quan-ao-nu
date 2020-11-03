@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm
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
                    <th>Hình ảnh </th>
                    <th>Tên</th>
                    <th>Loại</th>
                    <th>Kích thước</th>
                    <th>Màu</th>
                    <th>Giá nhập</th>
                    <th>Giá bán</th>
                    <th>Đơn vị tính</th>
                    <th>Sản phẩm mới</th>
                    <th>Số lượng</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $pd)
                <tr class="odd gradeX" align="center">
                    <td>{{$pd->product_id}}</td>
                    <td>
                        <img width="100px" height="100px" src="upload/product/{{$pd->product_image}}">
                    </td>
                    <td>{{$pd->product_name}}</td>
                    <td>{{$pd->product_type->type_product_name}}</td>
                    <td>{{$pd->product_size}}</td>
                    <td>{{$pd->product_color}}</td>
                    <td>{{number_format($pd->product_import_price)}} <sup>đ</sup></td>
                    <td>{{number_format(!empty($pd->product_promotion_price) ? $pd->product_promotion_price : $pd->product_unit_price)}} <sup>đ</sup></td>
                    <td>{{$pd->product_unit}}</td>
                    <td>
                        @if($pd->product_new == 1)
                        {{"Mới"}}
                        @else
                        {{"Cũ"}}
                        @endif
                    </td>
                    <td>{{$pd->product_quantity}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/delete/{{$pd->product_id}}"> Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$pd->product_id}}">Sửa</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection