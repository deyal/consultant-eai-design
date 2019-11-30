@extends('layouts.admin')

@section('title','Clients')

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
								<h4>Client</h4>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a href="/client/add" class="btn btn-primary btn-sm" href="#">
                  					<i class="fa fa-plus-circle" aria-hidden="true">Add Client</i> 
								</a>
							</div>
						</div>
					</div>
				</div>
        		<br>
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="row">
						<table class="data-table stripe hover nowrap" id="consultant_table">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">ID</th>
									<th>Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($client as $value)
									<tr>
										<td class="table-plus">{{$value->id}}</td>
										<td>{{$value->name}}</td>
										<td>
											<a href="/client/{{$value->id}}/edit" class="btn btn-sm btn-info">
											<i class="fa fa-cogs" aria-hidden="true"></i>
											Options
											</a>
											<a href="/client/{{$value->id}}/delete" class="btn btn-sm btn-danger">
											<i class="fa fa-trash" aria-hidden="true"></i>
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
