@extends('layouts.admin')

@section('title','Consultant Options')

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
							<h4 class="text-blue">Update Data : {{$consultant->name}}</h4>
						</div>
					</div>
          <br>
					<form action="/consultant/{{$consultant->eid}}" method="post">
						@csrf
						@method('PUT')
            <div class="form-group row">
							<label for="eid" class="col-sm-12 col-md-2 col-form-label">EID</label>
							<div class="col-sm-12 col-md-10">
								<input type="text" class="form-control" value="{{$consultant->eid}}" name="eid" required>
							</div>
						</div>
            <div class="form-group row">
							<label for="eid" class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input type="text" class="form-control" value="{{$consultant->name}}" name="name" required>
							</div>
						</div>
            <div class="form-group">
							<label>Module</label>
							<select class="custom-select2 form-control" name="module" id="module" required style="width: 100%; height: 38px;">
                <option>Select Modul</option>
              @foreach ($modul as $value)
                @if ($value->id == $consultant->assignments->modul_id)
                 <option value="{{$value->id}}" selected>{{$value->name}}</option>
               @else
                 <option value="{{$value->id}}">{{$value->name}}</option>
               @endif
              @endforeach
							</select>
						</div>
            <div class="form-group">
							<label>Submodule</label>
							<select class="custom-select2 form-control" name="submodule" id="submodule" required style="width: 100%; height: 38px;">
                <option value="">--Select Submodule--</option>
              @foreach ($submodul as $value)
                @if ($value->id == $consultant->assignments->submodul_id)
                  <option value="{{$value->id}}" selected>{{$value->name}}</option>
                @else
                  <option value="{{$value->id}}">{{$value->name}}</option>
                @endif
              @endforeach
              </select>
						</div>
						<button type="submit" class="btn btn-success">Update Client</button>
					</form>
				</div>
				<!-- Default Basic Forms End -->
        <!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Option</h4>
						</div>
					</div>
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <a href="/consultant/{{$consultant->eid}}/reset" class="btn btn-warning">
                  <i class="fa fa-undo" aria-hidden="true"></i>
                  Reset Password
                </a>
              </div>
              <div class="col-md-6">
                <a href="/consultant/{{$consultant->eid}}/deactivate" class="btn btn-danger">
                  <i class="fa fa-times" aria-hidden="true"></i>
                  Deactivate Account
                </a>
              </div>
            </div>
          </div>
				</div>
				<!-- Default Basic Forms End -->
			</div>
		</div>
	</div>
@endsection

@push('script')	
  <!-- js -->
	<script src="{{asset('vendors/scripts/script.js')}}"></script>
  <script type="text/javascript">
    var sub = $('#submodule');
    $(document).ready(function() {
      $('#module').on('change', function() {
        sub.empty();
        var id = $(this).val();
        if (id != '') {
            sub.prop('disabled',false);
            $.get('/consultant/add/'+id, function(resp) {
              sub.append($('<option>',{
                value: '',
                text: '--Select Submodule--',
              }));
              $.each(resp, function(k,v) {
                sub.append($('<option>',{
                  value: v.id,
                  text: v.name,
                }));
              });
            });
        } else {
          sub.prop('disabled',true);
        }
      });
    });
  </script>
@endpush