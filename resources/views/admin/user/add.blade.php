@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng
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
                        <form action="admin/user/add" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="full_name" placeholder="Vui lòng nhập tên người dùng" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Vui lòng nhập email" />
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="password" placeholder="Vui lòng nhập mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Lặp lại mật khẩu</label>
                                <input type="password" class="form-control" name="password_again" placeholder="Vui lòng nhập lại mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Phân quyền</label>
                                <label class="radio-inline">
                                    <input name="permissions" value="0" checked="" type="radio">Thường
                                </label>
                                <label class="radio-inline">
                                    <input name="permissions" value="1" type="radio">Admin
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Hình</label>
                                <input type="file" class="form-control" name="image" />
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