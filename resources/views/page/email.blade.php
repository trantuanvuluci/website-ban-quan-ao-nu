<font face="Arial">
	<div>
	<div></div>
		<h3><font color="#FF9600">Thông tin khách hàng</font></h3>
		<p>
			<strong class="info">Khách hàng: </strong>
			{{$info['customer_name']}}
		</p>
		<p>
			<strong class="info">Giới tính: </strong>
			{{$info['customer_gender']}}
		</p>
		<p>
			<strong class="info">Email: </strong>
			{{$info['customer_email']}}
		</p>
		<p>
			<strong class="info">Điện thoại: </strong>
			{{$info['customer_phone']}}
		</p>
		<p>
			<strong class="info">Địa chỉ: </strong>
			{{$info['customer_address']}}
		</p>
		<p>
			<strong class="info">Ghi chú: </strong>
			{{$info['customer_note']}}
		</p>
	</div>						
	<div>
		<h3><font color="#FF9600">Hoá đơn mua hàng</font></h3>							
		<table border="1" cellspacing="0">
			<tr>
				<td><strong>Tên sản phẩm</strong></td>
				<td><strong>Giá</strong></td>
				<td><strong>Số lượng</strong></td>
				<td><strong>Thành tiền</strong></td>
			</tr>
			@foreach($cart as $item)
			<tr>
				<td>{{$item->name}}</td>
				<td>{{number_format($item->price)}} VNĐ</td>
				<td>{{$item->qty}}</td>
				<td>{{number_format($item->price*$item->qty,0,',','.')}}</td>
			</tr>
			@endforeach
			<tr>
				<td>Tổng tiền:</td>
				<td colspan="3" align="right">{{$total}}VNĐ</td>
			</tr>
		</table>
	</div>
		<div>
			<h3><font color="#FF9600">Quý khách đã đặt hàng thành công!</font></h3>
			<p>• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng tôi.</p>
			<p>• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.</p>
			<p>• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.</p>
			<p>• Trụ sở chính: 100/54/10 Đinh Tiên Hoàng - Phường 1 - Quận Bình Thạnh - TP.Hồ Chí Minh</p>
			<p>Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
		</div>
	</div>					
		<!-- end main -->
	</div>
</div>
</font>