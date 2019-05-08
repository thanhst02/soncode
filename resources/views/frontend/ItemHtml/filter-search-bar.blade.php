@php
use App\Models\Country;
use App\Models\Maker;
	$route_name = Route::currentRouteName();
    $country_product = Country::country_product();
    $maker_product = Maker::maker_product();
@endphp

<div class="widget fx" data-animate="fadeInLeft">
	<h3 class="widget-head">Lọc sản phẩm</h3>
	{!! Form::open(['method' => 'GET' ,'class'=> 'leave-comment contact-form', 'id' => 'filter-product', 'route' => 'frontend.go-filter']) !!}
	<div class="widget-content">
		<ul id="accordion" class="accordion">
			<li>
				<h3><a href="#">Tìm kiếm cơ bản</a></h3>
				<div class="accordion-panel active">
					@if(isset($categories) && $categories)
						<div class="control-group">
							<label class="control-label">Loại sản phẩm:</label>
							<div class="controls">
								<div class="form-group">
									@foreach($categories as $category)
									<div class="col-md-12">
										<label class="checkbox">
											<input type="checkbox" name="category[{{ $category['id'] }}]" value="{{ $category['id'] }}" 
											{{ Request::has('category.'.$category['id']) ? 'checked': '' }}>{{ $category['name'] }}
										</label>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					@endif
					<div class="control-group">
						<label class="control-label">Quốc gia:</label>
						<div class="controls">
							<div class="form-group">
								@foreach($country_product as $country)
								<div class="col-md-12">
							        <label class="checkbox">
										<input type="checkbox" name="country[{{ $country['id'] }}]" value="{{ $country['id'] }}" 
										{{ Request::has('country.'.$country['id']) ? 'checked': '' }}>{{ $country['name'] }}
									</label>
						        </div>
						        @endforeach
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Hãng sản xuất:</label>
						<div class="controls">
							<div class="form-group">
								@foreach($maker_product as $maker)
								<div class="col-md-12">
							        <label class="checkbox">
										<input type="checkbox" name="maker[{{ $maker['id'] }}]" value="{{ $maker['id'] }}" 
										{{ Request::has('maker.'.$maker['id']) ? 'checked': '' }}>{{ $maker['name'] }}
									</label>
						        </div>
						        @endforeach
							</div>
					</div>
					<div class="control-group">
						<label class="control-label">Trong khoảng giá:</label>
						<div class="cell-6">
							<label class="control-label">Từ:</label>
							<div class="controls">
								{!! Form::text('min-price', Request::get('min-price'), ['class' => 'form-control']) !!}
							</div>
						</div>
						<div class="cell-6">
							<label class="control-label">Đến:</label>
							<div class="controls">
								{!! Form::text('max-price', Request::get('max-price'), ['class' => 'form-control']) !!}
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<input type="submit" class="btn btn-medium main-bg" value="Search"/>
	</div>
	{!! Form::close() !!}
</div>