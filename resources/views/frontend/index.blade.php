@extends('frontend.layouts.master')
@section('title')
@parent  Home
@endsection
@section('banner-top')
<div class="page-title title-1 center">
		<div class="container">
			<div class="row">
				<div class="cell-12">
					<h1 class="fx animated fadeInLeft" data-animate="fadeInLeft"> Trang chủ</h1>
					<div class="breadcrumbs main-bg fx animated fadeInUp" data-animate="fadeInUp">
						<a href="{{ route('frontend.index') }}">Trang chủ</a><span class="line-separate">
					</div>
					@includeif('frontend.ItemHtml.cart-quick')
				</div>
			</div>
		</div>
	</div>
@endsection
{{-- content --}}
@section('content')
	<div id="content-1">
		
	</div>
	<div id="content-2">
		@if(isset($new_products) && $new_products)
		@php
			$title_client = 'Hàng mới về';
			$products = $new_products;
		@endphp
		@includeif('frontend.ItemHtml.product-box-4-cols')
		@endif
	</div>
	<div id="content-3">
		@if(isset($new_products) && $new_products)
		@php
			$title_client = 'Yêu thích';
			$products = $new_products;
		@endphp
		@includeif('frontend.itemhtml.slide-content')
		@endif
	</div>
	<div id="content-4">
	</div>
	<div id="content-5">
		
	</div>

@endsection