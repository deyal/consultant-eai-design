@extends('layouts.admin')

@section('title','Add Consultant')

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
                <a href="/consultant" class="btn btn-sm btn-outline-secondary">
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
							<h4 class="text-blue">Add Consultant</h4>
						</div>
					</div>
          <form action="/consultant/add" method="post">
            @csrf
						<div class="form-group row">
							<label for="eid" class="col-sm-12 col-md-2 col-form-label">EID</label>
							<div class="col-sm-12 col-md-10">
								<input type="text" class="form-control" placeholder="EID" name="eid">
							</div>
						</div>
            <div class="form-group row">
							<label for="eid" class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input type="text" class="form-control" placeholder="Name" name="name">
							</div>
						</div>
            <div class="form-group">
							<label>Module</label>
							<select class="custom-select2 form-control" name="module" id="module" required style="width: 100%; height: 38px;">
                <option>Select Modul</option>
              @foreach ($modul as $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
              @endforeach
							</select>
						</div>
            <div class="form-group">
							<label>Submodule</label>
							<select class="custom-select2 form-control" name="submodule" id="submodule" disabled required style="width: 100%; height: 38px;">
							</select>
						</div>

            <button type="submit" class="btn btn-success">Add Consultant</button>
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
                text: 'Select Submodule',
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
