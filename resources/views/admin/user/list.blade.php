@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người dùng
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('notify'))
                <div class="alert alert-success">
                        {{session('notify')}}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Ảnh đại diện</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Permissions</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                    <tr class="odd gradeX" align="center">
                        <td>{{$u->id}}</td>
                        <td>
                            <img width="120" height="140" src="upload/user/{{$u->image}}">
                        </td>
                        <td>{{$u->full_name}}</td>
                        <td>{{$u->email}}</td>
                        <td>
                            @if($u->permissions == 1)
                            {{"Admin"}}
                            @else
                            {{"Thường"}}
                            @endif
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/delete/{{$u->id}}"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/edit/{{$u->id}}">Sửa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection