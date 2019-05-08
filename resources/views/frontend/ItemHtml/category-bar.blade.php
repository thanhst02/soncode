<div class="widget blog-cat-w fx" data-animate="fadeInLeft">
	<h3 class="widget-head">Thể loại</h3>
	<div class="widget-content">
		<ul class="list list-ok alt">
			@foreach($categories as $category)
			<li><a href="{{ route('frontend.category-filder', $category['id']) }}">{{ $category['name'] }}</a><span>[{{ $category['quantity'] }}]</span></li>
			@endforeach
		</ul>
	</div>
</div>