@extends('layout.master')
@section('content')
<div class="fullwidthbanner-container">
				<div class="fullwidthbanner">
					<div class="bannercontainer" >
				    <div class="banner" >
							<ul>
								@foreach($slide as $sl)
								<!-- THE FIRST SLIDE -->
								<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
					            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
												<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="upload/slide/{{$sl->slide_image}}" data-src="upload/slide/{{$sl->slide_image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('upload/slide/{{$sl->slide_image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
												</div>
											</div>

						        </li>
						        @endforeach
							</ul>
						</div>
					</div>

					<div class="tp-bannertimer"></div>
				</div>
</div>
<!--slider-->
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Sản phẩm mới</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($new_product)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($new_product as $new)
							<div class="col-sm-3">
								<div class="single-item">
									@if($new->product_promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('detailproduct',$new->product_id)}}"><img width="300" height="250" src="upload/product/{{$new->product_image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title1">{{$new->product_name}}</p>
										<p class="single-item-price" style="font-size: 18px">
											@if($new->product_promotion_price == 0)
											<span class="flash-sale">{{number_format($new->product_unit_price)}} đồng</span>
											@else
											<span class="flash-del">{{number_format($new->product_unit_price)}} đồng</span>
											<span class="flash-sale">{{number_format($new->product_promotion_price)}} đồng</span>
											@endif
										</p>
									</div>
										<?php
											$array_size = explode(',', $new->product_size);
											$array_color = explode(',', $new->product_color);
										?>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{asset('cart/add/'.$new->product_id)}}" size="{{ $array_size[0] !== "" ? $array_size[0] : 'Size'}}" color="{{ $array_color[0] !== "" ? $array_color[0] : 'Color' }}" qtyCart="{{ Cart::count() > 0 ? Cart::count() : 0}}" max="{{$new->product_quantity}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('detailproduct',$new->product_id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$new_product->links()}}</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Sản phẩm khuyến mãi</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($product_sale)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							@foreach($product_sale as $ps)
							<div class="col-sm-3">
								<div class="single-item">
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									<div class="single-item-header">
										<a href="{{route('detailproduct',$ps->product_id)}}"><img width="300" height="250" src="upload/product/{{$ps->product_image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title1">{{$ps->product_name}}</p>
										<p class="single-item-price" style="font-size: 18px">
											<span class="flash-del">{{number_format($ps->product_unit_price)}} đồng</span>
											<span class="flash-sale">{{number_format($ps->product_promotion_price)}} đồng</span>
										</p>
									</div>
									<?php
										$array_size = explode(',', $ps->product_size);
										$array_color = explode(',', $ps->product_color);
									?>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{asset('cart/add/'.$ps->product_id)}}" size="{{ $array_size[0] !== "" ? $array_size[0] : 'Size'}}" color="{{ $array_color[0] !== "" ? $array_color[0] : 'Color' }}" qtyCart="{{ Cart::count() > 0 ? Cart::count() : 0}}" max="{{$ps->product_quantity}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('detailproduct',$ps->product_id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$product_sale->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection