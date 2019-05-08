@extends('backend.layouts.master')
@section('title')
@parent  Thêm sản phẩm mới
@endsection
@section('header-link')
<link href="{{ asset('libbackend/assets/global/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet">
<link href="{{ asset('libbackend/assets/global/plugins/input-text/style.min.css') }}" rel="stylesheet">
<link href="{{ asset('libbackend/assets/global/plugins/summernote/summernote.min.css') }}" rel="stylesheet">
@endsection
{{-- content --}}
@section('content')
<div class="row">
	<div class="col-lg-12 portlets">
		<div class="panel">
			<div class="panel-header md-panel-controls">
				<h3><i class="fa fa-table"></i> <strong> Thêm hãng sản xuất mới </strong></h3>
			</div>
			<div class="panel-content pagination2 table-responsive">
				<div class="row">
					<div class="col-lg-12">
						{!! Form::open(['method' => 'POST', 'route' => ['backend.country.update', $country->id], 'enctype' => 'multipart/form-data', 'id' => 'add-country']) !!}
						{{ method_field('PATCH') }}
							<div class="col-md-12">
								<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
									{!! Form::label('name', 'Tên quốc gia', ['class' => 'required']) !!}
									{!! Form::text('name', old('name')?old('name'):$country->name, ['class' => 'form-control form-control-success', 'placeholder' => 'Tên quốc gia', 'required' => 'required']) !!}
									<small class="text-danger">{{ $errors->first('name') }}</small>
								</div>	
							</div>
							<div class="col-md-6">
								<div class="form-group{{ $errors->has('iso_code') ? ' has-error' : '' }}">
									{!! Form::label('iso_code', 'iso code', ['class' => 'required']) !!}
									{!! Form::text('iso_code', old('iso_code')?old('iso_code'):$country->iso_code, ['class' => 'form-control form-control-success', 'placeholder' => 'vd:Việt nam("VN")', 'required' => 'required']) !!}
									<small class="text-danger">{{ $errors->first('iso_code') }}</small>
								</div>	
							</div>
							<div class="col-md-6">
								<div class="form-group{{ $errors->has('country_code') ? ' has-error' : '' }}">
									{!! Form::label('country_code', 'Country code', ['class' => 'required']) !!}
									{!! Form::text('country_code',old('country_code')?old('country_code'):$country->country_code, ['class' => 'form-control form-control-success', 'placeholder' => 'vd:Việt nam("84")', 'required' => 'required']) !!}
									<small class="text-danger">{{ $errors->first('country_code') }}</small>
								</div>	
							</div>
							<div class="col-lg-12 text-center  m-t-20">
								{!! Form::reset("Làm mới", ['class' => 'cancel btn btn-embossed btn-default m-b-10 m-r-0']) !!}
								{!! Form::submit("Thêm", ['class' => 'btn btn-embossed btn-primary']) !!}
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('bottom-js')
<script src="{{ asset('libbackend/assets/global/plugins/cke-editor/ckeditor.js') }}"></script> <!-- Advanced HTML Editor -->
<script src="{{ asset('libbackend/assets/global/plugins/cke-editor/adapters/adapters.min.js') }}"></script>

<script src="{{ asset('libbackend/assets/global/plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js') }}"></script> <!-- Select Inputs -->
<script src="{{ asset('libbackend/assets/global/plugins/dropzone/dropzone.min.js') }}"></script>  <!-- Upload Image & File in dropzone -->
<script src="{{ asset('libbackend/assets/global/js/pages/form_icheck.js') }}"></script>  <!-- Change Icheck Color - DEMO PURPOSE - OPTIONAL -->
<script src="{{ asset('libbackend/js/myscript.js') }}"></script>
@endsection