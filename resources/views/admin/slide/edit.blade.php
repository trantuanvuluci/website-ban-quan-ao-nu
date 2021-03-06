@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>Sửa {{$slide->slide_name}}</small>
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
                
                <form action="admin/slide/edit/{{$slide->slide_id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tên slide</label>
                        <input class="form-control" name="slide_name" placeholder="Vui lòng nhập tên slide" value="{{$slide->slide_name}}" />
                    </div>
                    <div class="form-group">
                        <label>Link slide</label>
                        <input class="form-control" name="slide_link" placeholder="Vui lòng nhập link" value="{{$slide->slide_link}}" />
                    </div>
                    <div class="form-group">
                        <label>Hình</label>
                        <p><img width="400px" src="upload/slide/{{$slide->slide_image}}"></p>
                        <input type="file" class="form-control" name="slide_image" />
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