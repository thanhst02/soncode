<div class="login-box ">
	<a class="close-login" href="#"><i class="fa fa-times"></i></a>
	{!! Form::open(['method' => 'POST', 'route' => 'account.login', 'id' => 'login-form']) !!}
		<div class="container">
			<p>Chào mừng đến với cửa hàng! <i class="fa fa-3x fa-hand-peace-o" aria-hidden="true"></i> <i class="fa fa-2x fa-hand-peace-o" aria-hidden="true"></i> <i class="fa fa-hand-peace-o" aria-hidden="true"></i></p>
			<div class="login-controls">
				<div class="skew-25 input-box left">
					<div class="form-group{{ $errors->has('account') ? ' has-error' : '' }}">
					    {!! Form::text('account', null, 
					    ['class' => 'txt-box skew25', 'required' => 'required', 'placeholder' => 'Tài khoản hoặc Email']) !!}
					</div>
					<small class="text-danger" style="color: red">{{ $errors->first('account') }}</small>
				</div>
				<div class="skew-25 input-box left">
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						{!! Form::password('password', 
						['class' => 'txt-box skew25', 'required' => 'required', 'placeholder' => 'Password']) !!}
					</div>
					<small class="text-danger" style="color: red">{{ $errors->first('password') }}</small>
				</div>
				<div class="left skew-25 main-bg">
					{!! Form::submit("Login", ['class' => 'btn skew25']) !!}
				</div>
				<div class="check-box-box">
					{!! Form::checkbox('checkbox_id', '1', null, 
						['id' => 'remember_me', 'name' => 'remember_me', 'class' => 'check-box']
					) !!}
					<label for="remember_me"> Lưu người dùng</label>
					<a href="#"> Quên mật khẩu ?</a>
				</div>
			</div>
			<p class="text-danger" style="color: red">{!! Session::has('login-status-error') ? Session::get('login-status-error', 'default') : '' !!}</p>
		</div>
	{!! Form::close() !!}
</div>
