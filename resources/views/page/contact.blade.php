@extends('layout.master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Liên hệ</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Liên hệ</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="beta-map">
	
	<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2812703994723!2d106.69628931418266!3d10.789756261899385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528cab634ca31%3A0xf5b7de969df83338!2zMTAwLCA1NCDEkGluaCBUacOqbiBIb8OgbmcsIMSQYSBLYW8sIFF14bqtbiAxLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1531730472696" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		
		<div class="space50">&nbsp;</div>
		<div class="row">
			
			<div class="col-sm-12">
				<h2>Thông tin liên hệ</h2>
				<div class="space20">&nbsp;</div>

				<h6 class="contact-title">Địa chỉ</h6>
				<p>
					Số 4 Trường Chinh, Ấp Ninh Lợi, Xã Ninh Thạnh , TP.Tây Ninh, Tỉnh Tây Ninh
				</p>
				<div class="space20">&nbsp;</div>
				<h6 class="contact-title">Email</h6>
				<p>
					<a href="mailto:mysunshine2504@gmail.com">mysunshine2504@gmail.com</a>
				</p>
				<div class="space20">&nbsp;</div>
				<h6 class="contact-title">Thông tin liên hệ khác</h6>
				<p>
					Số điện thoại : 034 531 4828 <br>
					<a href="mailto:ngoctuyen1996.huynh@gmail.com">ngoctuyen1996.huynh@gmail.com</a>
				</p>
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection
