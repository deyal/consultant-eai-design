@extends('layouts.consultant')

@section('title','Ticket')

@section('content')

	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>DataTable</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">DataTable</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue">Ticket</h5>
						</div>
					</div>
					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">ID</th>
									<th>Client</th>
									<th>Title</th>
									<th>Priority</th>
									<th>Status</th>
                  					<th>Timestamp</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                				@foreach ($tickets as $ticket)
								<tr>
									<td class="table-plus">{{$ticket->ticketNumber()}}</td>
									<td>{{$ticket->PIC}} - {{$ticket->clients->name}}</td>
									<td>{{$ticket->title}}</td>
									<td>{!! $ticket->priority() !!}</td>
									<td>{{$ticket->status()}}</td>
                  					<td>{{$ticket->created_at}}</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-left">
												<a class="dropdown-item" href="/ticket/{{$ticket->id}}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
												<a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Edit</a>
												<a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
                			@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
			</div>
		</div>
	</div>
  
@endsection

@push('script')
	<?php include('include/script.php'); ?>
	<script src="{{asset('src/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('src/plugins/datatables/media/js/dataTables.bootstrap4.js')}}"></script>
	<script src="{{asset('src/plugins/datatables/media/js/dataTables.responsive.js')}}"></script>
	<script src="{{asset('src/plugins/datatables/media/js/responsive.bootstrap4.js')}}"></script>
	<!-- buttons for Export datatable -->
	<script src="{{asset('src/plugins/datatables/media/js/button/dataTables.buttons.js')}}"></script>
	<script src="{{asset('src/plugins/datatables/media/js/button/buttons.bootstrap4.js')}}"></script>
	<script src="{{asset('src/plugins/datatables/media/js/button/buttons.print.js')}}"></script>
	<script src="{{asset('src/plugins/datatables/media/js/button/buttons.html5.js')}}"></script>
	<script src="{{asset('src/plugins/datatables/media/js/button/buttons.flash.js')}}"></script>
	<script src="{{asset('src/plugins/datatables/media/js/button/pdfmake.min.js')}}"></script>
	<script src="{{asset('src/plugins/datatables/media/js/button/vfs_fonts.js')}}"></script>
	<script>
		$('document').ready(function(){
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
			});
			$('.data-table-export').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'pdf', 'print'
				]
			});
			var table = $('.select-row').DataTable();
			$('.select-row tbody').on('click', 'tr', function () {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			});
			var multipletable = $('.multiple-select-row').DataTable();
			$('.multiple-select-row tbody').on('click', 'tr', function () {
				$(this).toggleClass('selected');
			});
		});
	</script>
@endpush
