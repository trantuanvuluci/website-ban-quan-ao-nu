<!-- menu -->
<nav class="navbar-aside navbar-static-side" role="navigation">
    <div class="sidebar-collapse nano">
        <div class="nano-content">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown side-profile text-left"> 
                        <span style="display: block;">
                            @if(isset($user_login))
                            <img alt="image" class="img-circle" src="upload/user/{{$user_login->image}}" width="50" height="100">
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear" style="display: block;"> <span class="block m-t-xs"> <strong class="font-bold">{{$user_login->full_name}}<b class="caret"></b></strong>
                                </span></span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><i class="fa fa-user"></i>{{$user_login->full_name}}</li>
                            <li><a href="admin/user/edit/{{$user_login->id}}"><i class="fa fa-cog"></i>Setting</a></li>                         
                            <li><a href="admin/logout"><i class="fa fa-key"></i>Logout</a></li>
                            @endif
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="admin/overview/statistic"><i class="fa fa-th-large"></i> <span class="nav-label">Tổng quan </span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Sản phẩm </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="admin/product/list">Danh sách </a></li>
                        <li><a href="admin/product/add">Thêm </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart"></i> <span class="nav-label">Loại sản phẩm </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="admin/producttype/list">Danh sách </a></li>
                        <li><a href="admin/producttype/add">Thêm </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Hóa đơn</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="admin/bill/list">Danh sách </a></li>
                        <li><a href="admin/bill/add">Thêm </a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('statistics.revenue.index')}}"><i class="fa fa-fw fa-signal"></i> <span class="nav-label">Thống kê thu chi</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Chi tiết hóa đơn</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="admin/billdetail/list">Danh sách </a></li>
                        <li><a href="admin/billdetail/add">Thêm </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Khách hàng</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="admin/customer/list">Danh sách </a></li>
                        <li><a href="admin/customer/add">Thêm </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Tin tức</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="admin/news/list">Danh sách </a></li>
                        <li><a href="admin/news/add">Thêm </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">Slide</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="admin/slide/list">Danh sách </a></li>
                        <li><a href="admin/slide/add">Thêm </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Người dùng</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="admin/user/list">Danh sách </a></li>
                        <li><a href="admin/user/add">Thêm </a></li>
                    </ul>
                </li>                             
            </ul>

        </div>
    </div>
</nav>
<!-- end menu -->