<div id="header">
	<div class="header-top">
		<div class="container">
			<div class="pull-left auto-width-left">
				<ul class="top-menu menu-beta l-inline">
					<li><a ><i class="fa fa-home"></i> Số 4 Trường Chinh, Ấp Ninh Lợi, Xã Ninh Thạnh , TP.Tây Ninh, Tỉnh Tây Ninh</a></li>
					<li><a ><i class="fa fa-phone"></i> 034 531 4828</a></li>
				</ul>
			</div>
			<div class="pull-right auto-width-right">
				<ul class="top-details menu-beta l-inline">
					@if(isset($user))
						<li><a href="{{route('user')}}">Chào bạn {{$user->full_name}}</a></li>
						<li><a href="{{route('logout')}}">Đăng xuất</a></li>
					@else
						<li><a href="{{route('register')}}">Đăng kí</a></li>
						<li><a href="{{route('login')}}">Đăng nhập</a></li>
					@endif
				</ul>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-top -->
	<div class="header-body">
		<div class="container beta-relative">
			<div class="pull-left">
				<a href="{{route('trang-chu')}}" id="logo"><img src="source/assets/dest/images/logo_fashion.png" width="200px" alt=""></a>
			</div>
			<div class="pull-right beta-components space-left ov">
				<div class="space10">&nbsp;</div>
				<div class="beta-comp">
					<form role="search" method="get" id="searchform" action="{{route('search')}}">
				        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
				        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
					</form>
				</div>

				<div class="beta-comp">
				
					<div class="cart">
						<div class="beta-select"><a href="{{asset('cart/dat-hang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng ({{Cart::count()}}) <i class="fa fa-chevron-down"></i></a></div>
						<div class="beta-dropdown cart-body">
							<div class="cart-caption">
								<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Cart::total()}}</span></div>
								<div class="clearfix"></div>
									<a href="{{asset('cart/dat-hang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
					</div> <!-- .cart -->
				
				</div>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-body -->
	<div class="header-bottom" style="background-color: #0277b8;">
		<div class="container">
			<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
			<div class="visible-xs clearfix"></div>
			<nav class="main-menu">
				<ul class="l-inline ov">
					<li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
					<li><a href="#">Loại sản phẩm</a>
						<ul class="sub-menu">
							@foreach($type_product as $type)
							<li><a href="{{route('typeproduct',$type->type_product_id)}}">{{$type->type_product_name}}</a></li>
							@endforeach
						</ul>
					</li>
					<li><a href="{{route('about')}}">Giới thiệu</a></li>
					<li><a href="{{route('contact')}}">Liên hệ</a></li>
				</ul>
				<div class="clearfix"></div>
			</nav>
		</div> <!-- .container -->
	</div> <!-- .header-bottom -->
</div> <!-- #header -->

