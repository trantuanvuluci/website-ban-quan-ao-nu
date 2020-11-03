@extends('layout.master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Sản phẩm {{$product->product_name}}</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">

				<div class="row">
					
					<div class="col-sm-4">
						<img height="320" src="upload/product/{{$product->product_image}}" alt="">
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<p class="single-item-title"><h2>{{$product->product_name}}</h2></p>
							<p class="single-item-price" style="font-size: 18px">
								@if($product->product_promotion_price == 0)
									<span class="flash-sale">{{number_format($product->product_unit_price)}} đồng</span>
								@else
									<span class="flash-del">{{number_format($product->product_unit_price)}} đồng</span>
									<span class="flash-sale">{{number_format($product->product_promotion_price)}} đồng</span>
								@endif
							</p>
						</div>

						<div class="clearfix"></div>
						<div class="space20">&nbsp;</div>
						<!-- <p>Tùy chọn:</p> -->
						<?php
							// lấy ra list size sản phẩm
							$array_size = explode(',', $product->product_size);
							$array_color = explode(',', $product->product_color);
						?>
						<div class="single-item-options">
							<select class="wc-select" id="product_size" name="product_size" style="border-radius: 4px; border: 1px solid #ccc">
								@if($array_size[0] !== "")
									@foreach($array_size as $key => $size)
										<option value="{{$size}}">{{$size}}</option>
									@endforeach
								@else
									<option value="Size"></option>
								@endif
							</select>
							<select class="wc-select" id="product_color" name="product_size" style="border-radius: 4px; border: 1px solid #ccc">
								@if($array_color[0] !== "")
									@foreach($array_color as $key => $color)
										<option value="{{$color}}">{{$color}}</option>
									@endforeach
								@else
									<option value="Color"></option>
								@endif
							</select>
    						<input class="form-control" id="qty" style="width: 100px; height: 35px; margin-right: 10px;" type="number" min="1" " placeholder="Số lượng" name="qty" value="1">
							<a class="add-to-cart" style="width: 170px" href="{{asset('cart/add/'.$product->product_id)}}" qtyCart="{{ Cart::count() > 0 ? Cart::count() : 0}}" max="{{$product->product_quantity}}"><i class="fa fa-shopping-cart"> Thêm vào giỏ</i></a>
							<div class="clearfix"></div>
							<!-- <p>Đặt hàng:</p> -->
						</div>
					</div>
				</div>

				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<li><a href="#tab-description">Mô tả</a></li>
					</ul>

					<div class="panel" id="tab-description">
						<p>{!! $product->product_description !!}</p>
					</div>
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4>Sản phẩm tương tự</h4>
					<br>
					<div class="row">
						@foreach($product_same as $pds)
						<div class="col-sm-4">
							<div class="single-item">
								@if($pds->product_promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
								@endif
								<div class="single-item-header">
									<a href="{{route('detailproduct',$pds->product_id)}}"><img height="300" width="270" src="upload/product/{{$pds->product_image}}" alt=""></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title1">{{$pds->product_name}}</p>
									<p class="single-item-price" style="font-size: 18px">
										@if($pds->product_promotion_price == 0)
											<span class="flash-sale">{{number_format($pds->product_unit_price)}} đồng</span>
										@else
											<span class="flash-del">{{number_format($pds->product_unit_price)}} đồng</span>
											<span class="flash-sale">{{number_format($pds->product_promotion_price)}} đồng</span>
										@endif
									</p>
								</div>
								<?php
									$array_size = explode(',', $pds->product_size);
									$array_color = explode(',', $pds->product_color);
								?>
								<div class="single-item-caption">
									<a class="add-to-cart pull-left" href="{{asset('cart/add/'.$pds->product_id)}}" size="{{ $array_size[0] !== "" ? $array_size[0] : 'Size'}}" color="{{ $array_color[0] !== "" ? $array_color[0] : 'Color' }}" qtyCart="{{ Cart::count() > 0 ? Cart::count() : 0}}" max="{{$pds->product_quantity}}"> <i class="fa fa-shopping-cart"></i></a>
									<a class="beta-btn primary" href="{{route('detailproduct',$pds->product_id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="row">{{$product_same->links()}}</div>
				</div> <!-- .beta-products-list -->
			</div>
			<div class="col-sm-3 aside">
				<div class="widget">
					<h3 class="widget-title">Sản phẩm khuyến mãi</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							@foreach($product_sale as $ps)
							<div class="media beta-sales-item">
								<a class="pull-left" href="{{route('detailproduct',$ps->product_id)}}"><img src="upload/product/{{$ps->product_image}}" alt=""></a>
								<div class="media-body">
									{{$ps->product_name}}<br>
									<span class="flash-del">{{number_format($ps->product_unit_price)}} đồng</span><br>
									<span class="flash-sale">{{number_format($ps->product_promotion_price)}} đồng</span>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div> <!-- best sellers widget -->
				<div class="widget">
					<h3 class="widget-title">Sản phẩm mới</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							@foreach($new_product as $new)
							<div class="media beta-sales-item">
								<a class="pull-left" href="{{route('detailproduct',$new->product_id)}}"><img src="upload/product/{{$new->product_image}}" alt=""></a>
								<div class="media-body">
									{{$new->product_name}}<br>
									@if($new->product_promotion_price == 0)
											<span class="flash-sale">{{number_format($new->product_unit_price)}} đồng</span>
											@else
											<span class="flash-del">{{number_format($new->product_unit_price)}} đồng</span><br>
											<span class="flash-sale">{{number_format($new->product_promotion_price)}} đồng</span>
											@endif
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div> <!-- best sellers widget -->
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection


