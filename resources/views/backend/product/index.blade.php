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
								<a class="btn" href="{{ route('backend.product.add') }}">Thêm mới</a>
							</label>
						</div>
					</div>
				</div>
				<table id="listProduct" class="table table-hover">
					<thead>
						<tr>
							<th>Mã</th>
							<th>Tên sản phẩm</th>
							<th>Thể loại</th>
							<th>Hãng sản xuất</th>
							<th>Quốc gia</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data_product_type as $product_type)
						<tr>
							<td>{{ $product_type['code'] }}</td>
							<td>{{ $product_type['name'] }}</td>
							<td>{{ $product_type['category'] }}</td>
							<td>{{ $product_type['maker'] }}</td>
							<td>{{ $product_type['country'] }}</td>
							<td class="text-right">
								<a class="edit btn btn-sm btn-default" href="{{ route('backend.product.edit', $product_type['id']) }}"><i class="icon-note"></i></a>
								<a class="delete btn btn-sm btn-danger" href="{{ route('backend.product.destroy', $product_type['id']) }}"><i class="icons-office-52"></i></a>
                        	</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="row">
					<div class="col-md-6">
						<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
							Showing {{ $product_types->count() }} to {{ $product_types->currentPage() }} of {{ $product_types->total() }} entries
						</div>
					</div>
					<div class="col-md-6">
						<div class="dataTables_paginate paging_simple_numbers">
							{{ $product_types->appends(Request::all())->links() }}
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
