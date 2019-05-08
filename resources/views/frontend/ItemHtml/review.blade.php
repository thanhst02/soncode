<span class="item-rating">
@for($i = 1; $i <= 5; $i++)
	@if( ($rate/$i) < 1)
		<span class="fa fa-star-o"></span>
	@elseif( ($rate/$i) >= 1)
		<span class="fa fa-star"></span>
	@endif
@endfor
</span>