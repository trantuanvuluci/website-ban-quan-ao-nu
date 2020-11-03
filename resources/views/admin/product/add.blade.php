@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
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

                <form action="admin/product/add" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="product_name" placeholder="Vui lòng nhập tên sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select class="form-control" name="type_product_name">
                            @foreach($producttype as $pt)
                                <option value="{{$pt->type_product_id}}">{{$pt->type_product_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Miêu tả sản phẩm</label>
                        <textarea name="product_description" id="demo" class="form-control ckeditor" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Giá nhập sản phẩm</label>
                        <input type="number" class="form-control" name="product_import_price" placeholder="Vui lòng nhập giá nhập vào của sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Giá cả sản phẩm</label>
                        <input type="number" class="form-control" name="product_unit_price" placeholder="Vui lòng nhập giá cả sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Giá ưu đãi</label>
                        <input type="number" class="form-control" name="product_promotion_price" placeholder="Vui lòng nhập giá ưu đãi" />
                    </div>
                    <div class="form-group">
                        <label>Đơn vị tính</label>
                        <input class="form-control" name="product_unit" placeholder="Vui lòng nhập đơn vị tính" />
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="number" class="form-control" name="product_quantity" placeholder="Vui lòng nhập số lượng sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Màu sắc</label>
                        <input class="form-control" name="product_color" placeholder="Vui lòng nhập màu sắc(vd xanh,vàng,đỏ, ...)" type="text" />
                        <p><b>Lưu Ý </b> Mỗi định dạng màu sắc cần cách nhau bằng dấu phẩy </p>
                    </div>
                    <div class="form-group">
                        <label>Kích thước</label>
                        <br>
                        <input type="checkbox" name="product_size[]" value="XS"> XS
                        <br>
                        <input type="checkbox" name="product_size[]" value="S"> S
                        <br>
                        <input type="checkbox" name="product_size[]" value="M"> M
                        <br>
                        <input type="checkbox" name="product_size[]" value="L"> L
                        <br>
                        <input type="checkbox" name="product_size[]" value="XL"> XL
                        <br>
                        <input type="checkbox" name="product_size[]" value="Freesize"> Freesize
                        <br>
                        <input type="checkbox" name="product_size[]" value="Onesize"> Onesize
                        <br>
                    </div>
                    <div class="form-group">
                        <label>Sản phẩm mới</label>
                        <label class="radio-inline">
                            <input type="radio" name="product_new" value="0" checked="">Không
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="product_new" value="1" checked="">Có
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Hình</label>
                        <input type="file" class="form-control" name="product_image" />
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