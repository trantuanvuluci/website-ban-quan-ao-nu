
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from themeforestdemo.com/templates/shapebootstrap/html/be-admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 May 2017 03:24:12 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Be-Admin - Admin</title>
        <base href="{{asset('')}}">

        <!-- Bootstrap -->
        <link href="admin_asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="admin_asset/css/waves.min.css" type="text/css" rel="stylesheet">
        <!--        <link rel="stylesheet" href="css/nanoscroller.css">-->
        <link href="admin_asset/css/style.css" type="text/css" rel="stylesheet">
        <link href="admin_asset/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="account">
        <div class="container">
            <div class="row">
                <div class="account-col text-center">
                    <h1>Admin</h1>
                    <h3>Log into your account</h3>
                    @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('notify'))
                                {{session('notify')}}
                        @endif
                    <form class="m-t" role="form" action="admin/login" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                         <div class="form-group">
                            <input class="form-control" placeholder="Username"  name="email" type="email" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Passowrd" name="password" type="password" value="">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block ">Login</button>
                        
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="admin_asset/js/jquery.min.js"></script>
        <script type="text/javascript" src="admin_asset/bootstrap/js/bootstrap.min.js"></script>
        <script src="admin_asset/js/pace.min.js"></script>
    </body>

<!-- Mirrored from themeforestdemo.com/templates/shapebootstrap/html/be-admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 May 2017 03:24:12 GMT -->
</html>
