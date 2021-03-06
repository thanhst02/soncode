@extends('backend.layouts.master')
@php
use Illuminate\Support\Facades\Request;
@endphp
@section('title')
@parent  Danh sách sản phẩm
@endsection
{{-- content --}}
@section('content')
<div class="row">
	<div class="col-lg-12 portlets">
		<div class="panel">
			<div class="panel-header md-panel-controls">
				<h3><i class="fa fa-table"></i> <strong> Danh sách sản phẩm </strong></h3>
			</div>
			<div class="panel-content pagination2 table-responsive">
				<div class="row">
					<div class="col-xs-6">
						<div class="dataTables_length">
							<label>
								<select class="form-control" title="" name="tables_length">
									<option value="10">10</option>
									<option value="25">25</option>
									<option value="50">50</option>
									<option value="100">100</option>
								</select> 
							</label>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="dataTables_filter">
							<label>
								<input placeholder="Search..." type="search" class="form-control" name="tables_search">
							</label>
							<label> </label>
							<label>
								<a class="btn" href="{{ route('backend.category.create') }}">Thêm mới</a>
							</label>
						</div>
					</div>
				</div>
				<table id="listProduct" class="table table-hover">
					<thead>
						<tr>
							<th>Tên hãng</th>
							<th>Chi tiết</th>
							<th style="width: 100px;">Thao tác</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
						<tr>
							<td>{{ $category['name'] }}</td>
							<td>{{ $category['description'] }}</td>
							<td class="text-right">
								<a class="edit btn btn-sm btn-default" href="{{ route('backend.category.edit', $category['id']) }}"><i class="icon-note"></i></a>
								<a class="delete btn btn-sm btn-danger" href="{{ route('backend.category.destroy', $category['id']) }}"><i class="icons-office-52"></i></a>
                        	</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="row">
					<div class="col-md-6">
						<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
							Showing {{ $category_paginate->count() }} to {{ $category_paginate->currentPage() }} of {{ $category_paginate->total() }} entries
						</div>
					</div>
					<div class="col-md-6">
						<div class="dataTables_paginate paging_simple_numbers">
							{{ $category_paginate->appends(Request::all())->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('bottom-js')
<!-- BEGIN TABLE SCRIPTS -->
<script src="{{ asset('libbackend//assets/global/plugins/datatables/jquery.dataTables.min.js') }}"></script> <!-- Tables Filtering, Sorting & Editing -->
<script src="{{ asset('libbackend/assets/global/js/pages/table_dynamic.js') }}"></script>
<!-- END TABLE SCRIPTS -->
<script src="{{ asset('libbackend/js/myscript.js') }}"></script>
@endsection
