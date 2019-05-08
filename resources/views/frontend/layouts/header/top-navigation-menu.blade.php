@php
use App\Models\Category;
use App\Models\Country;
use App\Models\Maker;
    $route_name = Route::currentRouteName();
    $categories = Category::slidebar();
    $country_product = Country::country_product();
    $maker_product = Maker::maker_product();
@endphp
<nav class="top-nav mega-menu">
	<ul class="slide">
		<li class="{{ ($route_name = 'frontend.index') ? 'selected' : '' }}">
			<a href="{{ route('frontend.index') }}" title="Trang chủ"><i class="fa fa-home"></i><span>Trang chủ</span></a>
		</li>
		<li><a href="#"><i class="fa fa-leaf"></i><span>Danh mục <b class="menu-hint success">New</b></span></a>
			<div class="div-mega main-bg">
				<div class="div-mega-section">
					<h4>Danh sách loại</h4>
					<ul>
						@foreach($categories as $category)
							<li><a href="{{ route('frontend.category-filder', $category['id']) }}">{{ $category['name'] }}</a></li>
						@endforeach
					</ul>
				</div>
				
				<div class="div-mega-section">
					<h4>Quốc gia</h4>
					<ul>
						@foreach($country_product as $country)
							<li><a href="{{ route('frontend.country-filder', $country['id']) }}">{{ $country['name'] }}</a></li>
						@endforeach
					</ul>
				</div>
				
				<div class="div-mega-section">
					<h4>Hãng sản xuất</h4>
					<ul>
						@foreach($maker_product as $maker)
							<li><a href="{{ route('frontend.maker-filder', $maker['id']) }}">{{ $maker['name'] }}</a></li>
						@endforeach
					</ul>
				</div>
				
			</div>
		</li>
	</ul>
</nav>