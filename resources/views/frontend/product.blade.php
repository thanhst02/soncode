@php
use Illuminate\Support\Facades\Request;
@endphp
@extends('frontend.layouts.master')
@section('title')
@parent  {{ $title }}
@endsection
@section('banner-top')
	<div class="page-title title-1 center">
		<div class="container">
			<div class="row">
				<div class="cell-12">
					<h1 class="fx animated fadeInLeft" data-animate="fadeInLeft"> {{ $title }}</h1>
					<div class="breadcrumbs main-bg fx animated fadeInUp" data-animate="fadeInUp">
						<a href="{{ route('frontend.index') }}">Trang chủ</a><span class="line-separate">/</span>
						<span>{{ $title }}</span><span class="line-separate"></span>
					</div>
					@includeif('frontend.ItemHtml.cart-quick')
				</div>
			</div>
		</div>
	</div>
@endsection
{{-- content --}}
@section('content')
	<div class="sectionWrapper">
		<div class="container">
			<div class="row">
				<div class="row">
					<aside class="cell-3 left-shop">
						@if(isset($categories) && $categories)
							@includeif('frontend.ItemHtml.category-bar')
						@endif
						@includeif('frontend.ItemHtml.filter-search-bar')
						@if(isset($top_sales) && $top_sale)
							@includeif('frontend.ItemHtml.top-sale-bar')
						@endif
					</aside>
					<div class="cell-9">
						<div class="toolsBar">
							<div class="cell-10 left products-filter-top">
								<form action="" method="get" id="filter">
									@if (Route::currentRouteName() == 'frontend.search')
										<input type="hidden" value="{{ $keywork }}" name="keywork">
									@endif
									<div class="left">
										<span>Xắp xếp: </span>
										<select name="order-type">
											<option value="date" {{ Request::get('order-type') == 'date' ? 'selected': ''}}>Theo ngày</option>
											<option value="price" {{ Request::get('order-type') == 'price' ? 'selected': ''}}>Theo giá</option>
											<option value="random" {{ Request::get('order-type') == 'random' ? 'selected': ''}}>Ngẫu nhiên</option>
										</select>
									</div>
									<div class="left">
										<span>Hiển thị: </span>
										<select name="page-display">
											<option value="15" {{ Request::get('page-display') == '15' ? 'selected': ''}}>15</option>
											<option value="30" {{ Request::get('page-display') == '30' ? 'selected': ''}}>30</option>
											<option value="60" {{ Request::get('page-display') == '60' ? 'selected': ''}}>60</option>
										</select>
									</div>
									<div class="left">
										<span>Hiển thị: </span>
										<select name="order">
											<option value="asc" {{ Request::get('order') == 'asc' ? 'selected': ''}}>Tăng dần</option>
											<option value="desc" {{ Request::get('order') == 'desc' ? 'selected': ''}}>Giảm dần</option>
										</select>
									</div>
								</form>
								
							</div>
							<div class="right cell-2 list-grid">
								<a class="list-btn" href="#" data-title="List view" data-tooltip="true"><i class="fa fa-list"></i></a>
								<a class="grid-btn selected" href="#" data-title="Grid view" data-tooltip="true"><i class="fa fa-th"></i></a>
							</div>
						</div>
						<div class="clearfix"></div>
						@if(isset($products_data) && $products_data)
						<div class="grid-list">
							@php
								$index = 0;
								$mumber_cols = 2;
							@endphp
							@foreach( $products_data as $product )
							<div class="product-item-add">
								<div class="cell-4 fx shop-item" data-animate="fadeInUp">
				    				<div class="item-box">
				    					<h3 class="item-title"><a href="{{ route('frontend.single', $product['id']) }}">{{ $product['name'] }}</a></h3>
				    					<div class="item-img">
				    						<a href="{{ route('frontend.single', $product['id']) }}">
				    							@if( $product['sale'] != 0 )
				    								<span class="sale">{{ $product['sale'] }} %</span>
				    							@endif
				    							<img alt="" src="{{ asset( 'public/dataUpload/images/'.$product['image']['image_name'] ) }}">
				    						</a>
				    					</div>
				    					<div class="item-details">
			                            	{{-- <p>Phasellus blandit elementum tellus, nec adipiscing dui elementum non Phasellus blandit elementum tellus, nec adipiscing dui elementum non Phasellus blandit elementum tellus, nec adipiscing dui elementum non</p> --}}
			                            	<div class="right">
			                            		@php
													$rate = $product['rate'];
												@endphp
												@includeif('frontend.ItemHtml.review')
												<div class="item-price">{{ number_format($product['price']) }} vnd</div>
			                            	</div>
											<div class="left">
												<div class="item-cart">
													<input class="product-quantity" type="hidden" value="1">
													<input class="product-id" type="hidden" value="{{ $product['id'] }}">
													<a class="add-cart"><i class="fa fa-shopping-cart"></i> Add to cart</a>
												</div>
	                                            <div class="item-tools">
		                                            <a href="#"><i class="fa fa-heart" data-title="Add to Favourites" data-tooltip="true"></i></a>
		                                            <a href="#"><i class="fa fa-exchange" data-title="Compare" data-tooltip="true"></i></a>
	                                            </div>
	                                        </div>
				    					</div>
				    				</div>
				    			</div>
				    			@if($index != 0 && $index%$mumber_cols == 0)
				    			<div class="clearfix"></div>
				    			@endif
								@php
									$index ++;
								@endphp
							</div>
							@endforeach
						</div>
						<div class="clearfix"></div>
						<div class="pager skew-25">
				    		<div style="text-align: center;">
				    			{{ $product_types->appends(Request::all())->links() }}
				    		</div>
			    		</div>
			    		@else
			    		<h1 style="text-align: center;">Không có sản phẩm nào!</h1>
			    		@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer-js-bottom')
	
@endsection