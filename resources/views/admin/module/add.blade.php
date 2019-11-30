@extends('layouts.admin')

@section('title','Add Module')

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
                <a href="/module" class="btn btn-sm btn-outline-secondary">
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
							<h4 class="text-blue">Add Module</h4>
						</div>
					</div>
          <br>
          <form action="/module/add" method="post">
            @csrf
						<div class="form-group row">
							<label for="eid" class="col-sm-12 col-md-2 col-form-label">ID</label>
							<div class="col-sm-12 col-md-10">
								<input type="text" class="form-control" placeholder="ID" name="id">
							</div>
						</div>
            <div class="form-group row">
							<label for="eid" class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input type="text" class="form-control" placeholder="Name" name="name">
							</div>
						</div>
            <div class="form-group">
							<label>Submodule(s)</label>
              <div class="col-sm-12" id="submodule">
                <div class="row justify-content-center">
                  <div class="col-md-3">
                    <input type="text" class="form-control" name="submodule_id[]" placeholder="Submodule ID">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="submodule[]" placeholder="Submodule Name">
                  </div>
                  <div class="col-md-3">
                    <button type="button" class="btn btn-primary" name="button" id="add_submodule">Add</button>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-success">Add Module</button>
					</form>
				</div>
				<!-- Default Basic Forms End -->
			</div>
		</div>
	</div>

  <script id="hidden-template" type="text/x-custom-template">
    <div class="row justify-content-center mt-2">
      <div class="col-md-3">
        <input type="text" class="form-control" name="submodule_id[]" placeholder="Submodule ID">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="submodule[]" placeholder="Submodule Name">
      </div>
      <div class="col-md-3">
        <button type="button" class="btn btn-danger remove_field" name="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
      </div>
    </div>
  </script>
@endsection

@push('script')
  <!-- js -->
  <script src="{{asset('vendors/scripts/script.js')}}"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#add_submodule').on('click', function() {
        $('#submodule').append($('#hidden-template').html());
      });
      $('#submodule').on('click','.remove_field', function() {
        $(this).parent('div').parent('div').remove();
      });
    });
  </script>
@endpush
