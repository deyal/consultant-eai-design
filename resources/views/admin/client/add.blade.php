@extends('layouts.admin')

@section('title','Add Client')

@section('content')
  	<div class="main-container">
		@if (session('status'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
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
							<!-- Buat Button Back -->
							<div class="col-md-4 text-left">
								<a href="/client" class="btn btn-sm btn-outline-secondary">
								<i class="fa fa-arrow-left" aria-hidden="true"></i> Back
								</a>
							</div>
						</div>
					</div>
				</div>
        		<br>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Add Client</h4>
						</div>
					</div>
					<form action="/client/add" method="post">
						@csrf
						<div class="form-group row">
							<label for="eid" class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input type="text" class="form-control" placeholder="Name" name="name">
							</div>
						</div>
            			<button type="submit" class="btn btn-success">Add Client</button>
					</form>
				</div>
				<!-- Default Basic Forms End -->
			</div>
		</div>
	</div>
@endsection

@push('script')	
  <!-- js -->
	<script src="{{asset('vendors/scripts/script.js')}}"></script>
@endpush
