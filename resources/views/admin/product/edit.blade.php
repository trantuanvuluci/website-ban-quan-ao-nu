@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Sửa {{$product->product_name}}</small>
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
                
                <form action="admin/product/edit/{{$product->product_id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="product_name" placeholder="Vui lòng nhập tên sản phẩm" value="{{$product->product_name}}" />
                    </div>
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select class="form-control" name="type_product_name">
                            @foreach($producttype as $pt)
                                <option 
                                @if($product->product_type_id == $pt->type_product_id)
                                    {{"selected"}}
                                @endif
                                 value="{{$pt->type_product_id}}">{{$pt->type_product_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Miêu tả sản phẩm</label>
                        <textarea name="product_description" id="demo" class="form-control ckeditor" rows="3">{{$product->product_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Giá nhập sản phẩm</label>
                        <input type="number" class="form-control" name="product_import_price" placeholder="Vui lòng nhập giá nhập vào của sản phẩm" value="{{$product->product_import_price}}" />
                    </div>
                    <div class="form-group">
                        <label>Giá cả sản phẩm</label>
                        <input type="number" class="form-control" name="product_unit_price" placeholder="Vui lòng nhập giá cả sản phẩm" value="{{$product->product_unit_price}}" />
                    </div>
                    <div class="form-group">
                        <label>Giá ưu đãi</label>
                        <input type="number" class="form-control" name="product_promotion_price" placeholder="Vui lòng nhập giá ưu đãi" value="{{$product->product_promotion_price}}" />
                    </div>
                    <div class="form-group">
                        <label>Đơn vị tính</label>
                        <input class="form-control" name="product_unit" placeholder="Vui lòng nhập đơn vị tính" value="{{$product->product_unit}}" />
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="number" class="form-control" name="product_quantity" placeholder="Vui lòng nhập số lượng sản phẩm" value="{{$product->product_quantity}}" />
                    </div>
                    <div class="form-group">
                        <label>Màu sắc</label>
                        <input class="form-control" name="product_color" placeholder="Vui lòng nhập màu sắc(vd xanh,vàng,đỏ, ...)" type="text" value="{{$product->product_color}}"  />
                        <p><b>Lưu Ý </b> Mỗi định dạng màu sắc cần cách nhau bằng dấu phẩy </p>
                    </div>
                    <div class="form-group">
                        <label>Kích thước</label>
                        <br>
                        <input type="checkbox" name="product_size[]" value="XS"
                        {{in_array("XS",$product_size)?"checked":""}}
                        > XS
                        <br>
                        <input type="checkbox" name="product_size[]" value="S"
                        {{in_array("S",$product_size)?"checked":""}}
                        > S
                        <br>
                        <input type="checkbox" name="product_size[]" value="M"
                        {{in_array("M",$product_size)?"checked":""}}
                        > M
                        <br>
                        <input type="checkbox" name="product_size[]" value="L"
                        {{in_array("L",$product_size)?"checked":""}}
                        > L
                        <br>
                        <input type="checkbox" name="product_size[]" value="XL"
                        {{in_array("XL",$product_size)?"checked":""}}
                        > XL
                        <br>
                        <input type="checkbox" name="product_size[]" value="Freesize"
                        {{in_array("Freesize",$product_size)?"checked":""}}
                        > Freesize
                        <br>
                        <input type="checkbox" name="product_size[]" value="Onesize"
                        {{in_array("Onesize",$product_size)?"checked":""}}
                        > Onesize
                        <br>
                    </div>
                    <div class="form-group">
                        <label>Sản phẩm mới</label>
                        <label class="radio-inline">
                            <input type="radio" name="product_new" value="0"
                            @if($product->product_new == 0)
                                {{"checked"}}
                            @endif
                            >Không
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="product_new" value="1" 
                            @if($product->product_new == 1) 
                                {{"checked"}}
                            @endif
                            >Có
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Hình</label>
                        <p><img width="400px" src="upload/product/{{$product->product_image}}"></p>
                        <input type="file" class="form-control" name="product_image" />
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