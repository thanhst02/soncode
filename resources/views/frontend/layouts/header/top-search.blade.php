<div class="top-search">
	<a href="#"><span class="fa fa-search"></span></a>
	<div class="search-box">
		{!! Form::open(['method' => 'GET', 'route' => 'frontend.search', 'class' => 'form-horizontal']) !!}
			<div class="input-box left">
		        {!! Form::text('keywork', null, ['class' => 'txt-box', 'id' => 't-search', 'required' => 'required', 'placeHolder' => 'Nhập từ khóa tìm kiếm...']) !!}
		    </div>
		    <div class="left">
		        {!! Form::submit("GO", ['class' => 'btn main-bg', 'id' => 'b-search']) !!}
		    </div>
		
		{!! Form::close() !!}
	</div>
</div>