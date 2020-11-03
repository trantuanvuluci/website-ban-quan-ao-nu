@extends('layout.master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Xác nhận</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Xác nhận</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div> 
	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="main" class="col-md-9">
					<div id="wrap-inner">
						<div id="complete">
							<p class="info">Quý khách đã đặt hàng thành công!</p>
							<p>• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng Tôi</p>
							<p>• Sản phẩm của Quý khách sẽ được chuyển đến Địa có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.</p>
							<p>• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</p>
							<p>• Trụ sở chính: 100/54/10 Đinh Tiên Hoàng - Phường 1 - Quận Bình Thạnh - TP.Hồ Chí Minh</p>
							<p>Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
						</div>
						<p class="text-right return"><a href="#">Quay lại trang chủ</a></p>
					</div>					
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->
@endsection