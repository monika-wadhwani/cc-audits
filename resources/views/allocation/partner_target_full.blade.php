@extends('layouts.app')

@section('sh-title')
Upload Report
@endsection

@section('sh-detail')
with call id
@endsection

@section('main')

<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-line-chart"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				List
			</h3>
		</div>
		<!-- <div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					<a href="{{url('skill/create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						New Record
					</a>
				</div>
			</div>
		</div> -->
	</div>
	<div class="kt-portlet__body">

		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
			<thead>
				<tr>
						<th >#</th>
						<th >Zone</th>
                        <th >Location</th>
                        <th >Brand</th>
                        <th >Circle</th>
                        <th >week_1_target</th>
                        <th >week_2_target</th>
                        <th >week_3_target</th>
                        <th >week_4_target</th>
                        <th >MTD</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $row)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{$row->zone}}</td>
                    <td>{{$row->location}}</td>
                    <td>{{$row->brand_name}}</td>
                    <td>{{$row->circle}}</td>
                    <td>{{$row->eq_audit_target_w1}}</td>
                    <td>{{$row->eq_audit_target_w2}}</td>
                    <td>{{$row->eq_audit_target_w3}}</td>
                    <td>{{$row->eq_audit_target_w4}}</td>
                    <td>{{$row->eq_audit_target_mtd}}</td>
            	</tr>
            @endforeach

        </tbody>
    </table>

    <!--end: Datatable -->
</div>
</div>
@endsection
@section('css')
@include('shared.table_css');
@endsection
@section('js')
<script src="/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

<script>


"use strict";
var KTDatatablesExtensionButtons = function() {

	var initTable1 = function() {

		// begin first table
		var table = $('#kt_table_1').DataTable({
			responsive: true,
			scrollY: true,
			scrollX: true,
			scrollCollapse: true,
			// Pagination settings
			dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
			<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

			buttons: [
				{
					extend: 'excelHtml5',
					title: 'Targets'
				},
				{
					extend: 'pdfHtml5',
					title: 'Targets'
				},
				{
					extend: 'print',
					title: 'Targets'
				},
				{
					extend: 'copyHtml5',
					title: 'Targets'
				},
				{
					extend: 'pdfHtml5',
					title: 'Targets'
				}
			]

			
			
		});

	};

	var initTable2 = function() {

		// begin first table
		var table = $('#kt_table_2').DataTable({
			responsive: true,
			scrollY: '50vh',
			scrollX: true,
			scrollCollapse: true,
			buttons: [
				{
					extend: 'excelHtml5',
					title: 'Targets'
				},
				{
					extend: 'pdfHtml5',
					title: 'Targets'
				},
				{
					extend: 'print',
					title: 'Targets'
				},
				{
					extend: 'copyHtml5',
					title: 'Targets'
				},
				{
					extend: 'pdfHtml5',
					title: 'Targets'
				}
			],
			"order": [],
			"pageLength":100,
		});

		$('#export_print').on('click', function(e) {
			e.preventDefault();
			table.button(0).trigger();
		});

		$('#export_copy').on('click', function(e) {
			e.preventDefault();
			table.button(1).trigger();
		});

		$('#export_excel').on('click', function(e) {
			e.preventDefault();
			table.button(2).trigger();
		});

		$('#export_csv').on('click', function(e) {
			e.preventDefault();
			table.button(3).trigger();
		});

		$('#export_pdf').on('click', function(e) {
			e.preventDefault();
			table.button(4).trigger();
		});

	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
			initTable2();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesExtensionButtons.init();
});

</script>
@endsection