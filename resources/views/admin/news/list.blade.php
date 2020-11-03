@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tin tức
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
                    <th>Hình</th>
                    <th>Tiêu đề không dấu</th>
                    <th>Tiêu đề</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $ns)
                <tr class="odd gradeX" align="center">
                    <td>{{$ns->news_id}}</td>
                    <td>
                        <img width="150px" height="130px" src="upload/news/{{$ns->news_image}}">
                    </td>
                    <td>{{$ns->news_alias}}</td>
                    <td>{{$ns->news_title}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/news/delete/{{$ns->news_id}}"> Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/news/edit/{{$ns->news_id}}">Sửa</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection