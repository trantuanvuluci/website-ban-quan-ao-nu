@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại sản phẩm
                    <small>Sửa {{$producttype->type_product_name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

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

            <div class="col-lg-7" style="padding-bottom:120px">

                <form action="admin/producttype/edit/{{$producttype->type_product_id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tên loại sản phẩm</label>
                        <input class="form-control" name="type_product_name" placeholder="Vui lòng nhập tên loại sản phẩm" value="{{$producttype->type_product_name}}" />
                    </div>
                    <div class="form-group">
                        <label>Miêu tả loại sản phẩm</label>
                        <textarea name="type_product_description" id="demo" class="form-control ckeditor" rows="3">{{$producttype->type_product_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình</label>
                        <p><img width="400px" src="upload/product/{{$producttype->type_product_image}}"></p>
                        <input type="file" class="form-control" name="type_product_image" />
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