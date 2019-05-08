@extends('frontend.layouts.master')
@section('title')
@parent  {{ $product_type_data['name'] }}
@endsection
@section('banner-top')
	<div class="page-title title-1 center">
		<div class="container">
			<div class="row">
				<div class="cell-12">
					<h1 class="fx animated fadeInLeft" data-animate="fadeInLeft"> {{ $product_type_data['name'] }}</h1>
					<div class="breadcrumbs main-bg fx animated fadeInUp" data-animate="fadeInUp">
						<a href="{{ route('frontend.index') }}">Trang chủ</a><span class="line-separate">/</span><a href="{{ route('frontend.category-filder', $product_type_data['category']->id) }}">{{ $product_type_data['category']->name }}</a><span class="line-separate">/</span><span>{{ $product_type_data['name'] }}</span>
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
				<div class="cell-12">
					<div class="cell-4">
						@if($product_type_data['images'])
						<div class="product-img">
							<img alt="" id="img_01" src="{{ asset('public/dataUpload/images/'. $product_type_data['images'][0]) }}" />
							<div class="thumbs">
								<ul id="gal1">
									@php
										$index = 0;
									@endphp
									@foreach($product_type_data['images'] as $image)
										
										<li>
											<a data-image="{{ asset('public/dataUpload/images/'. $image) }}" href="#">
												<img alt="" src="{{ asset('public/dataUpload/images/'. $image) }}" />
											</a>
										</li>
										@php
											$index ++;
											if ($index == 4) {
												break;
											}
										@endphp
									@endforeach
									
								</ul>
							</div>
						</div>
						@else
							<div class="product-img">
								<h2>Lỗi !</h2>
							</div>
						@endif
					</div>
					<div class="cell-8">
						<div class="product-specs price-block list-item">

							<div class="price-box">
								<span class="product-price">{{ $product_type_data['price'] - ($product_type_data['price'] * $product_type_data['sale'])/100 }} vnd</span>
								@if($product_type_data['sale'] != 0)
									<span class="old-price">{{ $product_type_data['price'] }} vnd</span>
								@endif
							</div>
							<div>
								@php
									$rate = $product_type_data['rate'];
								@endphp
								@includeif('frontend.ItemHtml.review')
								{{-- <span><span>{{ $product_type_data['review'] }} Review(s)</span><span class="separator"> | </span><a href="#">Add Review</a></span> --}}
							</div>
						</div>
						<div class="product-block item-avl list-item">
							@if($product_type_data['quantity'] == 0)
								<div class="error-box left"><i class="fa fa-times"></i></div>
							@else
								<div class="success-box left"><i class="fa fa-check"></i></div>
							@endif
							<span>Số lượng: <b>{{ $product_type_data['quantity'] }}</b></span>
						</div>
						<div class="product-specs product-block list-item">
							<label class="control-label"><i class="fa fa-camera"></i>Màu:</label>
							@foreach($product_type_data['colors'] as $color)
							<a href="#" class="btn btn-small btn-border">{{ $color }}</a>
							@endforeach
						</div>
						<div class="product-item-add">
							<div class="list-item product-block item-add">
								
								<div class="left">
									<div class="left add-items">
										<a href="#"><i class="fa fa-minus"></i></a>
									</div>
									<input class="left product-quantity" id="items-num" value="1">
										<div class="left add-items">
										<a href="#"><i class="fa fa-plus"></i></a>
									</div>
									<input class="product-id" type="hidden" value="{{ $product_type_data['id'] }}">
									<a class="btn btn-medium add-cart main-bg">Thêm giỏ hàng</a>
								</div>
								<div class="left pro-btns">
									<a href="#"><i class="fa fa-heart"></i> Thêm danh sách yêu thích</a><br>
									<a href="#comments"><i class="fa fa-commenting" aria-hidden="true"></i> Comments</a>
								</div>
							</div>
						</div>
						{{-- <div class="list-item last-list">
							<label class="control-label"><i class="fa fa-align-justify"></i>Overview:</label>
							<p>Pellentesque tincidunt purus ac condimentum adipiscing. Nulla interdum lacus erat, at pellentesque quam eleifend id. Fusce aliquet, ante cursus gravida sagittis, justo erat.</p>
						</div> --}}
					</div>
					<div class="clearfix"></div>
					<div class="padd-top-20"></div>
					<hr class="hr-style5">
					<div class="clearfix padd-bottom-20"></div>
					<div class="cell-12">
						<div class="row">
							<div id="tabs" class="tabs">
								<ul>
									<li class="skew-25 active"><a href="#" class="skew25">Tổng quan</a></li>
									<li class="skew-25"><a href="#" class="skew25">Thông số kĩ thuật</a></li>
									<li class="skew-25"><a href="#" class="skew25">Bình luận</a></li>
									<li class="skew-25"><a href="#" class="skew25">Hình ảnh</a></li>
								</ul>
								<div class="tabs-pane">
									<div class="tab-panel active">
										{!!html_entity_decode($product_type_data['description'])!!}
										<ul class="list alt list-ok">
											<li>Giao hàng: miễn phí </li>
											<li>Bảo hành: 12 tháng</li>
											<li>Đổi hoặc hoàn trả: 15 ngày</li>
										</ul>
									</div>
									<div class="tab-panel">
										<h4><strong>{{ $product_type_data['name'] }}</strong></h4>
										<table>
											<tr>
												<th colspan="2" class="left-text">Thông số chung</th>
											</tr>
											<tr>
												<td class="width150">Tên sản phẩm: </td>
												<td>{{ $product_type_data['name'] }}</td>
											</tr>
											<tr>
												<td class="width150">Mã sản phẩm:</td>
												<td>{{ $product_type_data['code'] }}</td>
											</tr>
											<tr>
												<td class="width150">Nhãn hiệu:</td>
												<td><a href="#">{{ $product_type_data['maker']->name }}</a></td>
											</tr>
											<tr>
												<td class="width150">Thể loại chính:</td>
												<td><a href="#">{{ $product_type_data['category']->name }}</a></td>
											</tr>
											<tr>
												<td class="width150">Nơi sản xuất:</td>
												<td><a href="#">{{ $product_type_data['country']->name }}</a></td>
											</tr>
											<tr>
												<td class="width150">Color:</td>
												<td>
													@foreach($product_type_data['colors'] as $color)
														{{ $color }}|
													@endforeach
												</td>
											</tr>
											<tr>
												<td class="width150">Tag:</td>
												<td>
													@foreach($product_type_data['tag'] as $tag)
													<a href="">{{ $tag }}</a><span>,</span>
													@endforeach
												</td>
											</tr>
										</table>
									</div>
									<div class="tab-panel">
										<div class="reviews">
											<div class="hidden">
												<p class="hint hintMargin">This item has no reviews yet.</p>
												<p>Be the first one and review it now:<br><br><a class="btn main-bg btn-medium">Write a Review</a></p>
											</div>
											<div class="right-rating">
												<p class="hint main-color hintMargin">This item has avarage rating <span class="bold">3</span> based on 3 reviews: </p>
												<div class="item-rating">
													<span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span>
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="comments">
												<h3 class="block-head">Bình luận</h3>
											    <ul class="comment-list">
											        <li>
											            <article class="comment">
											                <div class="comment-content">
											                    <h5 class="comment-author skew-25">
											                        <span class="author-name skew25">John Martin</span>
											                        <span class="item-rating">
																		<span class="fa fa-star skew25"></span><span class="fa fa-star skew25"></span><span class="fa fa-star skew25"></span><span class="fa fa-star-o skew25"></span><span class="fa fa-star-o skew25"></span>
																	</span>
											                        <span class="comment-date skew25">Jan 15, 2014</span>
											                    </h5>
											                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis accusamus alias doloribus aliquam voluptas cupiditate animi 	officia temporibus dicta iure.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis accusamus alias doloribus aliquam voluptas cupiditate animi 	officia temporibus dicta iure.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis accusamus alias doloribus aliquam voluptas cupiditate animi 	officia temporibus dicta iure.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis accusamus alias doloribus aliquam voluptas cupiditate animi 	officia temporibus dicta iure.</p>
											                </div>
											            </article>
											        </li>
											        <li>
											            <article class="comment">
											                <div class="comment-content">
											                    <h5 class="comment-author skew-25">
											                        <span class="author-name skew25">John Martin</span>
											                        <span class="item-rating">
																		<span class="fa fa-star skew25"></span><span class="fa fa-star skew25"></span><span class="fa fa-star skew25"></span><span class="fa fa-star-o skew25"></span><span class="fa fa-star-o skew25"></span>
																	</span>
											                        <span class="comment-date skew25">Jan 15, 2014</span>
											                    </h5>
											                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis accusamus alias doloribus aliquam voluptas cupiditate animi 	officia temporibus dicta iure.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis accusamus alias doloribus aliquam voluptas cupiditate animi 	officia temporibus dicta iure.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis accusamus alias doloribus aliquam voluptas cupiditate animi 	officia temporibus dicta iure.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis accusamus alias doloribus aliquam voluptas cupiditate animi 	officia temporibus dicta iure.</p>
											                </div>
											            </article>
											        </li>
											        <li>
											            <article class="comment">
											                <div class="comment-content">
											                    <h5 class="comment-author skew-25">
											                        <span class="author-name skew25">John Martin</span>
											                        <span class="item-rating">
																		<span class="fa fa-star skew25"></span><span class="fa fa-star skew25"></span><span class="fa fa-star skew25"></span><span class="fa fa-star-o skew25"></span><span class="fa fa-star-o skew25"></span>
																	</span>
											                        <span class="comment-date skew25">Jan 15, 2014</span>
											                    </h5>
											                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis accusamus alias doloribus aliquam voluptas cupiditate animi 	officia temporibus dicta iure.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis accusamus alias doloribus aliquam voluptas cupiditate animi 	officia temporibus dicta iure.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis accusamus alias doloribus aliquam voluptas cupiditate animi 	officia temporibus dicta iure.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis accusamus alias doloribus aliquam voluptas cupiditate animi 	officia temporibus dicta iure.</p>
											                </div>
											            </article>
											        </li>
											    </ul>
											</div>
											<div class="clearfix"></div>
											<form action="#" class="leave-comment contact-form">
											    <h3 class="block-head">Leave A Review</h3>
						    					<div class="form-input">
						    						<label>Name<span class="red">*</span></label><input type="text" required>
						    					</div>
					    						<div class="form-input">
						    						<label>Email<span class="red">*</span></label><input type="email" required>
						    					</div>
					    						<div class="form-input">
						    						<label>Rating Level<span class="red">*</span></label>
						    						<select>
						    							<option value="5 Stars" selected="selected">5 Stars</option>
						    							<option value="4 Stars">4 Stars</option>
						    							<option value="4 Stars">3 Stars</option>
						    							<option value="4 Stars">2 Stars</option>
						    							<option value="4 Stars">1 Stars</option>
						    						</select>
						    					</div>
						    					<div class="form-input">
						    						<label>Message<span class="red">*</span></label>
						    						<textarea class="txt-box textArea" name="message" cols="40" rows="7" id="messageTxt" spellcheck="true" required></textarea>
						    					</div>
						    					<div class="form-buttons">
						    						<input type="submit" class="btn btn-large main-bg" value="Submit"><input type="reset" class="btn btn-large" value="Reset">
						    					</div>
											</form>
										</div>
									</div>
									<div class="tab-panel">
										@foreach($product_type_data['images'] as $image)
											<img style="width: 100%; margin: 10px;" src="{{ asset('public/dataUpload/images/'. $image) }}" alt="">
										@endforeach
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix padd-bottom-20"></div>
				@if(isset($product_category) && $product_category)
					@php
						$title_client = 'Sản phầm cùng loại';
						$products = $product_category;
					@endphp
					@includeif('frontend.itemhtml.slide-content')
				@endif
				
			</div>
		</div>
	</div>
@endsection
@section('footer-js-bottom')
@endsection