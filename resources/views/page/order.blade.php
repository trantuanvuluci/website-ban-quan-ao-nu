@extends('layout.master')
@section('content')
<script type="text/javascript">
	function updateCart(qty,max,rowId){
		if(parseInt(qty) > parseInt(max)) {
			alert("Số lượng sản phẩm trong kho không đủ");
			location.reload();
			return false;
		}
		if(qty < 0) {
			alert("Số lượng sản phẩm không được âm");
			location.reload();
			return false;
		}
		$.get(
			'{{asset('cart/update')}}',
			{qty:qty,rowId:rowId},
			function(){
				location.reload();
			}
		);
	}
	function updateCartOption(size,color,img,rowId){
		$.get(
				'{{asset('cart/update')}}',
				{size:size,color: color,img: img,rowId:rowId},
				function(){
					location.reload();
				}
		);
	}
</script>
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Đặt hàng</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Đặt hàng</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		@if(Session::has('notify'))
		<div class="alert alert-success">{{Session::get('notify')}}</div>
		@endif
		<form action="{{route('order')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			@if(Cart::count()>=1)
			<div class="row">
				<div class="col-sm-6">
					<h4>Thông tin khách hàng</h4>
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label for="name">Họ tên*</label>
						<input type="text" id="name" name="customer_name" placeholder="Nhập họ và tên" required>
					</div>
					<div class="form-block">
						<label>Giới tính </label>
						<input id="gender" type="radio" class="input-radio" name="customer_gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
						<input id="gender" type="radio" class="input-radio" name="customer_gender" value="nữ" style="width: 10%"><span>Nữ</span>
									
					</div>

					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" id="email" name="customer_email" required placeholder="expample@gmail.com">
					</div>

					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" id="adress" name="customer_address" placeholder="Street Address" required>
					</div>
					

					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="number" id="phone" name="customer_phone" maxlength="10" required>
					</div>
					
					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea id="notes" name="customer_note"></textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
						<div class="your-order-body" style="padding: 0px 10px">
							<div class="your-order-item">
								<div>
								@foreach($items as $item)
								<?php
									$product = \DB::table('tbl_products')->where('product_id', $item->id)->first();
									// lấy ra list size sản phẩm
									$array_size = explode(',', $product->product_size);
									$array_color = explode(',', $product->product_color);
								?>
								<!--  one item	 -->
								<div class="cart-item">
								<a class="cart-item-delete" href="{{asset('cart/delete/'.$item->rowId)}}"><i class="fa fa-times"></i></a>
									<div class="media">

										<img width="25px" height="100px" src="{{asset('upload/product/'.$item->options->img)}}" alt="" class="pull-left">
										<div class="media-body">
											<p class="font-large">{{$item->name}} </p>
											<div class="row" style="margin-top: 10px">
												<div class="col-md-4">
													<span class="color-gray your-order-info" style="margin-bottom: 10px">Số lượng: </span>
													<input class="form-control" style="width: 70px; height: 25px" type="number" min="1" max="{{$product->product_quantity}}" value="{{$item->qty}}" onchange="updateCart(this.value,'{{$product->product_quantity}}','{{$item->rowId}}')">
												</div>
												<div class="col-md-4">
													<p style="margin-bottom: 10px">Size:</p>
													<select class="wc-select" name="size" style="border-radius: 4px; height: 25px" onchange="updateCartOption(this.value,'{{$item->options->color}}','{{$item->options->img}}','{{$item->rowId}}')">
														@if($array_size[0] !== "")
															@foreach($array_size as $key => $size)
																<option {{  $size == $item->options->size ? 'selected="selected' : ''}} value="{{$size}}">{{$size}}</option>
															@endforeach
														@else
															<option value="Size"></option>
														@endif
													</select>
												</div>

												<div class="col-md-4">
													<p style="margin-bottom: 10px">Màu:</p>
													<select class="wc-select" name="color" style="border-radius: 4px; height: 25px" onchange="updateCartOption('{{$item->options->size}}', this.value, '{{$item->options->img}}','{{$item->rowId}}')">
														@if($array_color[0] !== "")
															@foreach($array_color as $key => $color)
																<option {{  $color == $item->options->color ? 'selected="selected' : ''}} value="{{$color}}">{{$color}}</option>
															@endforeach
														@else
															<option value="Color"></option>
														@endif
													</select>
												</div>
											</div>
											<span class="color-gray your-order-info">Đơn giá: {{number_format($item->price,0,',','.')}} đồng</span>
											<span class="color-gray your-order-info">Tổng đơn giá: {{number_format($item->price*$item->qty,0,',','.')}} đồng</span>
										</div>
									</div>
								</div>
								<!-- end one item -->

								@endforeach
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
								<div class="pull-right"><h5 class="color-black">{{$total}} đồng</h5></div>
								<div class="clearfix"></div>
							</div>

						</div>
						<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
						
						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
									</div>						
								</li>

								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
									<label for="payment_method_cheque">Chuyển khoản </label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										Chuyển tiền đến tài khoản sau:
										<br>- Số tài khoản: 123 456 789
										<br>- Chủ tài khoản: Huỳnh Ngọc Tuyền
										<br>- Ngân hàng ARIBANK, Chi nhánh TPHCM
									</div>						
								</li>
							</ul>
						</div>

						<div class="text-center"><button type="submit" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button> </div>
					</div> <!-- .your-order -->
				</div>
			</div>
			@else
			<h5 style="color:#675e5e; text-align: center;">Hiện không có sản phẩm nào trong giỏ hàng</h5>
			@endif
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection
