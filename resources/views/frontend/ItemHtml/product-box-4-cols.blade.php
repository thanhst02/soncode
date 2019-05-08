<div class="sectionWrapper gry-bg">
	<div class="container">
		<h3 class="block-head">{{ $title_client }}</h3>
		<div class="portfolio-filterable">
			<div class="row">
				<div class="portfolio-items">
					@foreach($products as $product)
					<div class="cell-3 develop">
						<div class="portfolio-item" style="min-height: 230px">
							<div class="img-holder">
								<div class="img-over">
									{{$product['product_type_id']}}
									<a href="{{ route('frontend.single', $product['product_type_id']) }}" class="fx link"><b class="fa fa-search-plus"></b></a>
									<a href="{{ asset( 'public/dataUpload/images/'.$product['image']['image_name'] ) }}" class="fx zoom" title="Project Title"><b class="fa fa-picture-o"></b></a>
								</div>
								<img alt="{{ $product['product_name'] }}" src="{{ asset( 'public/dataUpload/images/'.$product['image']['image_name'] ) }}">
							</div>
							<div class="name-holder">
								<a href="{{ route('frontend.single', $product['product_type_id']) }}" class="project-name">{{ $product['product_name'] }}</a>
								<span class="project-options">{{ $product['category'] }}</span>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>