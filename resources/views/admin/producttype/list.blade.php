@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Loại sản phẩm
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
                    <th>Hình ảnh</th>
                    <th>Tên</th>
                    <th>Miêu tả loại sản phẩm</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($producttype as $pt)
                <tr class="odd gradeX" align="center">
                    <td>{{$pt->type_product_id}}</td>
                    <td>
                        <img width="150px" height="150px" src="upload/product/{{$pt->type_product_image}}">
                    </td>
                    <td>{{$pt->type_product_name}}</td>
                    <td>{!! $pt->type_product_description !!}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/producttype/delete/{{$pt->type_product_id}}"> Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/producttype/edit/{{$pt->type_product_id}}">Sửa</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection