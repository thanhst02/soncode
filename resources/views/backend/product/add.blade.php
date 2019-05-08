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
				<h3><i class="fa fa-table"></i> <strong> Thêm sản phẩm mới </strong></h3>
			</div>
			<div class="panel-content pagination2 table-responsive">
				<div class="row">
					<div class="col-lg-12">
						{!! Form::open(['method' => 'POST', 'route' => 'backend.product.insert', 'enctype' => 'multipart/form-data', 'id' => 'add-product']) !!}
							<div class="col-md-6">
								<div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
									{!! Form::label('code', 'Mã loại sản phẩm', ['class' => 'required']) !!}
									{!! Form::text('code', old('code'), ['class' => 'form-control form-control-success', 'placeholder' => 'Mã sản phẩm', 'required' => 'required']) !!}
									<small class="text-danger">{{ $errors->first('code') }}</small>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
									{!! Form::label('name', 'Tên sản phẩm', ['class' => 'required']) !!}
									{!! Form::text('name', old('name'), ['class' => 'form-control form-control-success', 'placeholder' => 'Tên sản phẩm']) !!}
									<small class="text-danger">{{ $errors->first('name') }}</small>
								</div>	
							</div>

							<div class="col-md-6">
								<div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
									<label class="required">Thể loại chính</label>
									<select class="form-control " data-search="true" name="category" required="required">
										<option value="">Chọn thể loại..</option>
										@foreach($categories as $category)
										<option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
										@endforeach
									</select>
									<small class="text-danger">{{ $errors->first('category') }}</small>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group  {{ $errors->has('country') ? ' has-error' : '' }}">
									<label class="required">Quốc gia</label>
									<select class="form-control" data-search="true" name="country" required="required">
										<option value="">Chọn quốc gia..</option>
										@foreach($countries as $country)
											<option value="{{ $country->id }}" {{ old('country') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
										@endforeach
									</select>
									<small class="text-danger">{{ $errors->first('country') }}</small>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="required">Hãng sản xuất</label>
									<select class="form-control {{ $errors->has('maker') ? ' has-error' : '' }}" data-search="true" name="maker" required="required">
										<option value="">Chọn hãng sản xuất..</option>
										@foreach($makers as $maker)
											<option value="{{ $maker->id }}" {{ old('maker') == $maker->id ? 'selected' : '' }}>{{ $maker->name }}</option>
										@endforeach
									</select>
									<small class="text-danger">{{ $errors->first('maker') }}</small>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
									{!! Form::label('price', 'Giá bán', ['class' => 'required']) !!}
									{!! Form::number('price', old('price'), ['class' => 'form-control form-control-success', 'placeholder' => 'Giá bán', 'required' => 'required']) !!}
									<small class="text-danger">{{ $errors->first('price') }}</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
									{!! Form::label('tag', 'Tag:') !!}
									{!! Form::text('tag', old('tag'), ['class' => 'form-control select-tags form-control-success', 'placeholder' => 'brown,red,green']) !!}
									<small class="text-danger">{{ $errors->first('tag') }}</small>
								</div>
							</div>

							<div class="col-md-12">
								<h3><label class="required">Nội dung chi tiết về sản phẩm</label></h3>
								<br>
								<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
									{!! Form::textarea('description', old('description'), ['class' => 'form-control cke-editor required', 'cols' => '80', 'rows' => '10']) !!}
									<small class="text-danger">{{ $errors->first('description') }}</small>
								</div>
							</div>
							<div class="col-lg-12">
								<small class="text-danger">{{ $errors->first('image') }}</small>
								<p><strong>Upload Ảnh (Tỉ lệ tốt nhất: 640 x 426)</strong></p>
								<a type="button" class="btn btn-rounded btn-success" id="addimage">Thêm ảnh</a>
								<a type="button" class="btn btn-rounded btn-danger" id="removeimage">Bớt ảnh</a>
							</div>
							<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
								<div id="upload-image">
									<div class="col-md-3 image-1">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail">
												<img data-src="" src="{{ asset('lib/frontend/images/portfolio/1.jpg') }}" class="img-responsive" alt="gallery 3">
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail"></div>
											<div>
												<span class="btn btn-default btn-file">
													<span class="fileinput-new">Chọn hình ảnh...</span>
													<span class="fileinput-exists">Change</span>
													{!! Form::file('image[]') !!}
												</span>
												<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
											</div>
											<small class="text-danger">{{ $errors->first('image.0') }}</small>
										</div>
									</div>
									<div class="col-md-3 image-2">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail">
												<img data-src="" src="{{ asset('lib/frontend/images/portfolio/1.jpg') }}" class="img-responsive" alt="gallery 3">
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail"></div>
											<div>
												<span class="btn btn-default btn-file">
													<span class="fileinput-new">Chọn hình ảnh...</span>
													<span class="fileinput-exists">Change</span>
													{!! Form::file('image[]') !!}
												</span>
												<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
											</div>
											<small class="text-danger">{{ $errors->first('image.1') }}</small>
										</div>
									</div>
									<div class="col-md-3 image-3">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail">
												<img data-src="" src="{{ asset('lib/frontend/images/portfolio/1.jpg') }}" class="img-responsive" alt="gallery 3">
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail"></div>
											<div>
												<span class="btn btn-default btn-file">
													<span class="fileinput-new">Chọn hình ảnh...</span>
													<span class="fileinput-exists">Change</span>
													{!! Form::file('image[]') !!}
												</span>
												<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
											</div>
											<small class="text-danger">{{ $errors->first('image.2') }}</small>
										</div>
									</div>
									<div class="col-md-3 image-3">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail">
												<img data-src="" src="{{ asset('lib/frontend/images/portfolio/1.jpg') }}" class="img-responsive" alt="gallery 3">
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail"></div>
											<div>
												<span class="btn btn-default btn-file">
													<span class="fileinput-new">Chọn hình ảnh...</span>
													<span class="fileinput-exists">Change</span>
													{!! Form::file('image[]') !!}
												</span>
												<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
											</div>
											<small class="text-danger">{{ $errors->first('image.3') }}</small>
										</div>
									</div>
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