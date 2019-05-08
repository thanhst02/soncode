<!-- our clients block start -->
<div class="sectionWrapper gry-bg">
	<div class="container">
		<h3 class="block-head">{{ $title_client }}</h3>
		<div class="clients">
			@foreach($products as $product)
			<div style="min-height: 150px">
				<a class="white-bg" href="{{ route('frontend.single', $product['product_type_id']) }}">
					<img alt="" src="{{ asset( 'public/dataUpload/images/'.$product['image']['image_name'] ) }}">
					<h4><b>{{ $product['product_name'] }}</b></h4>
				</a>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!-- our clients block end