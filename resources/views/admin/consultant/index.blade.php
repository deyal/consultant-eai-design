@extends('layouts.admin')

@section('title','Consultants')

@section('content')
<div class="main-container">
    @if (session('status'))
      	<div class="alert alert-success alert-dismissible fade show" role="alert">
        	{{session('status')}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
      	</div>
    @endif
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Consultant</h4>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a href="/consultant/add" class="btn btn-primary btn-sm" href="#">
            						<i class="fa fa-plus-circle" aria-hidden="true"> Add Consultant</i> 
								</a>
							</div>
						</div>
					</div>
				</div>
        		<br>
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
          			<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue">Consultant</h5>
						</div>
					</div>
					<div class="row">
						<table class="data-table stripe hover nowrap" id="consultant_table">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">EID</th>
									<th>Name</th>
									<th>Module</th>
									<th>Submodule</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($consultant as $value)
								<tr>
									<td>{{$value->eid}}</td>
									<td>{{$value->name}}</td>
									<td>{{$value->assignments->moduls->name}}</td>
									<td>{{$value->assignments->submoduls->name}}</td>
									<td>
									<a href="/consultant/{{$value->eid}}/edit" class="btn btn-sm btn-info">
										<i class="fa fa-cogs" aria-hidden="true"></i>
										Options
									</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
				<!-- Simple Datatable start -->
						<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<div class="clearfix mb-20">
					<div class="pull-left">
						<h5 class="text-blue">Deactivated Consultant</h5>
					</div>
				</div>
				<div class="row">
					<table class="data-table stripe hover nowrap" id="consultant_table">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">EID</th>
								<th>Name</th>
								<th>Module</th>
								<th>Submodule</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($deactivated as $value)
							<tr>
								<td>{{$value->eid}}</td>
								<td>{{$value->name}}</td>
								<td>{{$value->assignments->moduls->name}}</td>
								<td>{{$value->assignments->submoduls->name}}</td>
								<td>
								<a href="/consultant/{{$value->eid}}/edit" class="btn btn-sm btn-info">
									<i class="fa fa-cogs" aria-hidden="true"></i>
									Reactivate
								</a>
								<br><br>
								<a href="/consultant/{{$value->eid}}/edit" class="btn btn-sm btn-info">
									<i class="fa fa-cogs" aria-hidden="true"></i>
									Delete
								</a>
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
	<script src="{{asset('vendors/scripts/script.js')}}"></script>
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
