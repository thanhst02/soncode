<div class="top-bar">
	<div class="container">
		<div class="row">
			<div class="cell-5">
				<ul class="social-list">
					<li><a href="#" data-title="dribbble" data-tooltip="true" data-position="bottom"><span class="fa fa-dribbble"></span></a></li>
					<li><a href="#" data-title="facebook" data-tooltip="true" data-position="bottom"><span class="fa fa-facebook"></span></a></li>
					<li><a href="#" data-title="linkedin" data-tooltip="true" data-position="bottom"><span class="fa fa-linkedin"></span></a></li>
					<li><a href="#" data-title="skype" data-tooltip="true" data-position="bottom"><span class="fa fa-skype"></span></a></li>
					<li><a href="#" data-title="tumbler" data-tooltip="true" data-position="bottom"><span class="fa fa-tumblr"></span></a></li>
					<li><a href="#" data-title="twitter" data-tooltip="true" data-position="bottom"><span class="fa fa-twitter"></span></a></li>
					<li><a href="#" data-title="YouTube" data-tooltip="true" data-position="bottom"><span class="fa fa-youtube"></span></a></li>
				</ul>
			</div>
			<div class="cell-7 right-bar">
				<ul class="right">
					<li class="top-icon-cart"><a href="cart.html"><span><i class="fa fa-shopping-cart"></i> 0 item(s) - 0 vnd</span></a></li>
					@if(!Auth::check())
						<li><a href="{{ route('account.signup') }}"><i class="fa fa-user-plus"></i> Đăng ký</a></li>
						<li><a href="#" class="login-btn"><i class="fa fa-unlock-alt"></i> Đăng nhập</a></li>
					@else
						<li><a href="#"><i class="fa fa-user"></i> {{ Auth::user()->human->name }}</a></li>
						<li><a href="{{ route('account.logout') }}"><i class="fa fa-unlock"></i> Đăng xuất</a></li>
					@endif
				</ul>
			</div>
		</div>
	</div>
</div>