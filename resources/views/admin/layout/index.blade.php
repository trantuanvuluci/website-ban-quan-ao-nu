<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Be-Admin - Admin</title>
        <base href="{{asset('')}}">
        
        <link href="admin_asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="admin_asset/css/waves.min.css" type="text/css" rel="stylesheet">
        <link href="admin_asset/css/styles.css" rel="stylesheet">
        <link href="admin_asset/css/menu-light.css" type="text/css" rel="stylesheet">
        <link href="admin_asset/css/style.css" type="text/css" rel="stylesheet">
        <link href="admin_asset/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- DataTables CSS -->
        <link href="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
        
    </head>
    <body>
        
		<!-- navbar top -->
        @include('admin.layout.header')
        <section class="page">
        	@include('admin.layout.menu')

			<div id="wrapper">

            @yield('content')

        </div>
        <!-- /#page-wrapper -->
        </section>

        <script type="text/javascript" src="admin_asset/js/jquery.min.js"></script>
        
        <script src="admin_asset/js/jquery-jvectormap-1.2.2.min.js"></script>

        <script src="admin_asset/js/jquery-jvectormap-world-mill-en.js"></script>
        <!-- <script src="js/jquery.nanoscroller.min.js"></script> -->
        <script type="text/javascript" src="admin_asset/js/custom.js"></script>
        <!-- ChartJS-->
        <script src="admin_asset/js/chartjs/Chart.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="admin_asset/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                    responsive: true
            });
        });
        </script>

        <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src="https://code.highcharts.com/modules/drilldown.js"></script>

        @yield('script')
    </body>

<!-- Mirrored from themeforestdemo.com/templates/shapebootstrap/html/be-admin/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 May 2017 03:22:41 GMT -->
</html>
