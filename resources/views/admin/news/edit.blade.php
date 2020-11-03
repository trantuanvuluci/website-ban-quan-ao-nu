@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Sửa {{$news->news_title}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($error->all() as $err)
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
                <form action="admin/news/edit/{{$news->news_id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="news_title" placeholder="Vui lòng nhập tiêu đề" value="{{$news->news_title}}" />
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="news_content" id="demo" class="form-control ckeditor" rows="3">{{$news->news_content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình</label>
                        <p><img width="400px" src="upload/news/{{$news->news_image}}"></p>
                        <input type="file" class="form-control" name="news_image" />
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