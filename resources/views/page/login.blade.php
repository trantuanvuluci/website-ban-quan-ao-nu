@extends('layout.master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Đăng nhập</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Đăng nhập</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		
		<form action="{{route('login')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="row">
				<div class="col-sm-3"></div>
				@if(Session::has('notify'))
					<div class="alert alert-danger">{{Session::get('notify')}}</div>
				@endif
				<div class="col-sm-6">
					<h4>Đăng nhập</h4>
					<div class="space20">&nbsp;</div>

					
					<div class="form-block">
						<label for="email">Địa chỉ email*</label>
						<input type="email" id="email" name="email" required>
					</div>
					<div class="form-block">
						<label for="phone">Mật khẩu*</label>
						<input type="password" id="phone" name="password" required>
					</div>
					<div class="form-block">
						<button type="submit" class="btn btn-primary">Đăng nhập</button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection