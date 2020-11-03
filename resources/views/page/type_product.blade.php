@extends('layout.master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Sản phẩm {{$type_pd->type_product_name}}</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('trang-chu')}}">Home</a> / <span>Loại sản phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<ul class="aside-menu">
						@foreach($producttype as $pt)
						<li><a href="{{route('typeproduct',$pt->type_product_id)}}">{{$pt->type_product_name}}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4>Sản phẩm</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($type_of_product)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($type_of_product as $tp)
							<div class="col-sm-4">
								<div class="single-item">
									@if($tp->product_promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('detailproduct',$tp->product_id)}}"><img src="upload/product/{{$tp->product_image}}" alt="" height="300" width="270"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title1">{{$tp->product_name}}</p>
										<p class="single-item-price" style="font-size: 18px">
											@if($tp->product_promotion_price == 0)
											<span class="flash-sale">{{number_format($tp->product_unit_price)}} đồng</span>
											@else
											<span class="flash-del">{{number_format($tp->product_unit_price)}} đồng</span>
											<span class="flash-sale">{{number_format($tp->product_promotion_price)}} đồng</span>
											@endif
										</p>
									</div>
									<?php
										$array_size = explode(',', $tp->product_size);
										$array_color = explode(',', $tp->product_color);
									?>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('addtocart',$tp->product_id)}}" size="{{ $array_size[0] !== "" ? $array_size[0] : 'Size'}}" color="{{ $array_color[0] !== "" ? $array_color[0] : 'Color' }}" qtyCart="{{ Cart::count() > 0 ? Cart::count() : 0}}" max="{{$tp->product_quantity}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('detailproduct',$tp->product_id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Sản phẩm khác</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($product_other)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							@foreach($product_other as $po)
							<div class="col-sm-4">
								<div class="single-item">
									@if($po->product_promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('detailproduct',$po->product_id)}}"><img src="upload/product/{{$po->product_image}}" alt="" height="300" width="270"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title1">{{$po->product_name}}</p>
										<p class="single-item-price" style="font-size: 18px">
											@if($po->product_promotion_price == 0)
											<span class="flash-sale">{{number_format($po->product_unit_price)}} đồng</span>
											@else
											<span class="flash-del">{{number_format($po->product_unit_price)}} đồng</span>
											<span class="flash-sale">{{number_format($po->product_promotion_price)}} đồng</span>
											@endif
										</p>
									</div>
									<?php
										$array_size = explode(',', $po->product_size);
										$array_color = explode(',', $po->product_color);
									?>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('addtocart',$po->product_id)}}" size="{{ $array_size[0] !== "" ? $array_size[0] : 'Size'}}" color="{{ $array_color[0] !== "" ? $array_color[0] : 'Color' }}" qtyCart="{{ Cart::count() > 0 ? Cart::count() : 0}}" max="{{$po->product_quantity}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('detailproduct',$po->product_id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$product_other->links()}}</div>
						<div class="space40">&nbsp;</div>
						
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection