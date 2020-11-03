@extends('layout.master')

@section('content')

<div class="container">
    	<div class="space20"></div>
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading"><p><strong>Thông tin tài khoản</strong></p></div>
				  	<div class="panel-body">
				  		@if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(Session::has('notify'))
                            <div class="alert alert-success">{{Session::get('notify')}}</div>
                        @endif
				    	<form action="{{route('user')}}" method="post" enctype="multipart/form-data">
				    		<input type="hidden" name="_token" value="{{csrf_token()}}">
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Username" name="full_name" aria-describedby="basic-addon1" value="{{$user->full_name}}">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	readonly value="{{$user->email}}">
							</div>
							<br>	
							<div>
								<!-- <input type="checkbox" id="changePassword" name="changePassword" style="display: inline-flex;"> -->
				    			<label>Đổi mật khẩu</label>
							  	<input type="password" class="form-control" name="password" aria-describedby="basic-addon1" >
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1" >
							</div>
							<br>
                            <div class="form-group">
                                <label>Hình</label>
                                <p><img width="400px" src="upload/user/{{$user->image}}"></p>
                                <input type="file" class="form-control" name="image" />
                            </div>
                            <br>
							<button type="submit" class="btn btn-default">Sửa
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        	
    	</div>
    </div>

@endsection

<!-- @section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection -->