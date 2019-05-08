@extends('backend.layouts.master')
@section('title')
@parent  Cập nhật hãng sản xuất
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
				<h3><i class="fa fa-table"></i> <strong> Cập nhật hãng sản xuất</strong></h3>
			</div>
			<div class="panel-content pagination2 table-responsive">
				<div class="row">
					<div class="col-lg-12">
						{!! Form::open(['method' => 'POST', 'route' => ['backend.maker.update', $maker->id], 'enctype' => 'multipart/form-data', 'id' => 'add-maker']) !!}
						{{ method_field('PATCH') }}
							<div class="col-md-12">
								<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
									{!! Form::label('name', 'Tên hãng', ['class' => 'required']) !!}
									{!! Form::text('name', old('name')?old('name'):$maker->name, ['class' => 'form-control form-control-success', 'placeholder' => 'Tên hãng', 'required' => 'required']) !!}
									<small class="text-danger">{{ $errors->first('name') }}</small>
								</div>	
							</div>

							<div class="col-md-12">
								<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
									{!! Form::label('description', 'Chi tiết', ['class' => 'required']) !!}
									{!! Form::textarea('description',  old('description')?old('description'):$maker->description, ['class' => 'form-control form-control-success', 'cols' => '80', 'rows' => '10', 'placeholder' => 'Mô tả về hãng sản xuất']) !!}
									<small class="text-danger">{{ $errors->first('description') }}</small>
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