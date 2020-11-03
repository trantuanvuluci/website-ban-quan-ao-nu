@extends('layout.master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Giới thiệu</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Giới thiệu</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div id="content">
		<div class="our-history">
			<h3 style="text-align: center; font-size: 22px">Sử dụng Fashion-Shop như thế nào?</h3>
			<h4 style="text-align: center; color: #f80; font-size: 30px;">Vô cùng dễ dàng!</h4>
			<div class="row">
				<div class="col-sm-4" style="text-align: center;">
					<img style="margin-top: 17px; margin-bottom: -7px" src="source/assets/dest/images/ic1.png">
					<h5 style="text-align: center; font-size: 20px">Chọn hàng hóa và thêm vào giỏ hàng</h5>
					<p style="text-align: center;">Bạn muốn mua gì? Chỉ việc nhấn nút thêm vào giỏ hàng.</p>
				</div>
				<div class="col-sm-4" style="text-align: center;">
					<img style="margin-top: 26px;" src="source/assets/dest/images/icon2.jpg">
					<h5 style="text-align: center; font-size: 20px">Nhập vị trí của bạn</h5>
					<p style="text-align: center;">Điền thông tin địa chỉ mà bạn muốn được chuyển hàng đến.</p>
			</div>
				<div class="col-sm-4" style="text-align: center;">
					<img style="margin-top: 23px;" src="source/assets/dest/images/ic3.png">
					<h5 style="text-align: center; font-size: 20px">Thanh toán và giao hàng tận nơi</h5>
					<p style="text-align: center;">Thanh toán tiền mặt hoặc qua hình thức chuyển khoản.</p>
				</div>
			</div>
		</div>

		<div class="space50">&nbsp;</div>
		<hr />
		<div class="space50">&nbsp;</div>
		<h2 class="text-center wow fadeInDown">GIỚI THIỆU VỀ FASHION-SHOP VIỆT NAM</h2>
		<div class="space20">&nbsp;</div>
		<p class="text-center wow fadeInLeft">Với hơn 20 năm kinh nghiệm hoạt động trong lĩnh vực mua bán hàng online tại Việt Nam<br /> Fashion-Shop mang đến Dịch vụ mua sắm trực tuyến thông minh và chuyên nghiệp hàng đầu tại Việt Nam </p>
		<div class="space35">&nbsp;</div>

		<div class="row">
			<div class="col-sm-3" style="left: 12%">
				<div class="beta-counter">
					<p class="beta-counter-icon"><i class="fa fa-user" style="color: #F80"></i></p>
					<p class="beta-counter-value timer numbers" data-to="19855" data-speed="2000">19855</p>
					<p class="beta-counter-title">THÀNH VIÊN</p>
				</div>
			</div>

			<div class="col-sm-3" style="left: 12%">
				<div class="beta-counter">
					<p class="beta-counter-icon"><i class="fa fa-bar-chart-o" style="color: #F80"></i></p>
					<p class="beta-counter-value timer numbers" data-to="3568" data-speed="2000">3568</p>
					<p class="beta-counter-title">SẢN PHẨM</p>
				</div>
			</div>

			<div class="col-sm-3" style="left: 12%">
				<div class="beta-counter">
					<p class="beta-counter-icon"><i class="fa fa-signal" style="color: #F80"></i></p>
					<p class="beta-counter-value timer numbers" data-to="258934" data-speed="2000">258934</p>
					<p class="beta-counter-title">LOẠI SẢN PHẨM</p>
				</div>
			</div>
		</div> <!-- .beta-counter block end -->

		<div class="space50">&nbsp;</div>
		<hr />
		<div class="space50">&nbsp;</div>
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<P>Quý khách có nhu cầu liên lạc, trao đổi hoặc đóng góp ý kiến, vui lòng tham khảo các thông tin sau:</P>
				<ul>
					<li><b>Liên lạc qua điện thoại:</b> 034 531 4828</li>
					<li><b>Liên lạc qua email:</b> ngoctuyen1996.huynh@gmail.com</li>
					<li><b>Liên lạc qua facebook:</b> https://www.facebook.com/tuyen.huynh.7543</li>
					<li><b>Địa chỉ nhận hàng đổi/trả/bảo hành:</b> Trung tâm xử lý đơn hàng Fashion - 367/F370 Đường Đinh Tiên Hoàng, P.1, Q.Bình Thạnh TP.Hồ Chí Minh hoặc liên hệ 034 531 4828 để được hướng dẫn trước khi gửi sản phẩm về Fashion-Shop</li>
					<li><b>Văn phòng:</b> 100/54/10 Đinh Tiên Hoàng, phường 1, quận Bình Thạnh, thành phố Hồ Chí Minh</li>
				</ul>
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection