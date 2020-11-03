@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng
                            <small>Sửa {{$user->full_name}}</small>
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
                        
                        <form action="admin/user/edit/{{$user->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="full_name" placeholder="Vui lòng nhập tên người dùng" value="{{$user->full_name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Vui lòng nhập email" value="{{$user->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="changePassword" name="changePassword">
                                <label>Đổi mật khẩu</label>

                                <input type="password" class="form-control password" name="password" placeholder="Please Enter Password" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Lặp lại mật khẩu</label>
                                <input type="password" class="form-control password" name="password_again" placeholder="Please Repeat Password" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Phân quyền</label>
                                <label class="radio-inline">
                                    <input name="permissions" value="0" 
                                    @if($user->permissions == 0) {{"checked"}}
                                    @endif
                                     type="radio">Thường

                                </label>
                                <label class="radio-inline">
                                    <input name="permissions" value="1" 
                                    @if($user->permissions == 1) {{"checked"}}
                                    @endif
                                     type="radio">Admin
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Hình</label>
                                <p><img width="400px" src="upload/user/{{$user->image}}"></p>
                                <input type="file" class="form-control" name="image" />
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

@section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection