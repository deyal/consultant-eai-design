@extends('layouts.admin')

@section('title','Settings')

@section('content')
  <div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<!-- Buat Button Back -->
							<div class="col-md-4 text-left">
								<a href="/dashboard" class="btn btn-sm btn-outline-secondary">
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
							<h4 class="text-blue">Change Password</h4>
						</div>
					</div>
					<form action="/admin/settings/{{Auth::user()->eid}}" method="post">
						@csrf
						<div class="form-group row">
							<label for="eid" class="col-sm-12 col-md-2 col-form-label">New Password</label>
							<div class="col-sm-12 col-md-10">
								<input type="password" class="form-control" name="newpassword" placeholder="New Password" required>
							</div>
						</div>
            <div class="form-group row">
							<label for="eid" class="col-sm-12 col-md-2 col-form-label">Confirm Password</label>
							<div class="col-sm-12 col-md-10">
								<input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required>
							</div>
						</div>
            <button type="submit" class="btn btn-success">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Change
            </button>
					</form>
				</div>
				<!-- Default Basic Forms End -->
        <!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">API Setting</h4>
						</div>
					</div>
					<form action="#" method="post">
						@csrf
						<div class="form-group row">
							<label for="eid" class="col-sm-12 col-md-2 col-form-label">New Password</label>
							<div class="col-sm-12 col-md-10">
								<input type="password" class="form-control" name="newpassword" placeholder="New Password" required>
							</div>
						</div>
            <div class="form-group row">
							<label for="eid" class="col-sm-12 col-md-2 col-form-label">Confirm Password</label>
							<div class="col-sm-12 col-md-10">
								<input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required>
							</div>
						</div>
            <button type="submit" class="btn btn-success">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Change
            </button>
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

