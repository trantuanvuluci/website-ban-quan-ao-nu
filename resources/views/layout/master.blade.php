<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Website bán hàng </title>
	<base href="{{asset('')}}">

	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{!! asset('dist/css/bootstrap.min.css') !!}">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/complete.css">
</head>
<body>

	@include('layout.header')
	<div class="rev-slider">
	@yield('content')

	@include('layout.footer')


	<!-- include js files -->
	<script src="source/assets/dest/js/jquery.js"></script>
	<script type="text/javascript" src="source/assets/dest/js/jquery-3.1.1.min.js"></script>
	<script src="source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="{!! asset('dist/js/bootstrap.min.js') !!}"></script>
	<script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="source/assets/dest/vendors/animo/Animo.js"></script>
	<script src="source/assets/dest/vendors/dug/dug.js"></script>
	<script src="source/assets/dest/js/scripts.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<!-- <script src="source/assets/dest/js/waypoints.min.js"></script> -->
	<script src="source/assets/dest/js/wow.min.js"></script>
	<!--customjs-->
	<script src="source/assets/dest/js/custom2.js"></script>
	<script>
	$(document).ready(function($) {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)

		$('.add-to-cart').click(function (event) {
			event.preventDefault();
			var size = '';
			var color = '';
			var qty  = $('#qty').val();
			var qty_max  = $(this).attr('max');
			var qty_cart = $(this).attr('qtyCart');
			var url = $(this).attr('href');
			var size_x = $(this).attr('size');
			var size_y = $('#product_size').val();

			var color_x = $(this).attr('color');
			var color_y = $('#product_color').val();

			if(parseInt(qty_cart) >= parseInt(qty_max) || parseInt(qty) + parseInt(qty_cart) > parseInt(qty_max)) {
				
				alert('Số lượng sản phẩm trong kho không đủ để đặt hàng');
				return false;
			}

			if(parseInt(qty) > parseInt(qty_max)) {
				alert('Số lượng sản phẩm trong kho không đủ để đặt hàng');
				return false;
			}

			if(parseInt(qty) < 0) {
				alert("Số lượng sản phẩm không được âm");
				location.reload();
				return false;
			}

			if(size_x == undefined && size_y.length > 0 ) {
				size = size_y;
			} else if(size_y == undefined && size_x.length > 0) {
				size = size_x;
			}

			if(color_x == undefined && color_y.length > 0 ) {
				color = color_y;
			} else if(color_y == undefined && color_x.length > 0) {
				color = color_x;
			}

			if(qty == undefined) {
				qty = 1;
			}

			$.ajax({
				url : url,
				type : 'get',
				dataType: 'json',
				async: true,
				data : {
					qty : qty,
					size: size,
					color: color
				}
			}).done(function (data) {

				var link = "{{ url('cart/dat-hang') }}";
				window.location.href = link;
			});
		})
	})
	</script>
	@yield('script')
</body>
</html>
