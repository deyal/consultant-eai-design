@extends('layouts.consultant')

@section('title','Settings')

@section('content')
  <div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Update Profile</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Update Profile</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 bg-white border-radius-4 box-shadow">
							<div class="profile-photo">
								<img src="{{asset('vendors/images/photo2.jpg')}}" alt="" class="avatar-photo">
								<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-body pd-5">
												<div class="img-container">
													<img id="image" src="{{asset('vendors/images/photo2.jpg')}}" alt="Picture">
												</div>
											</div>
											<div class="modal-footer">
												<input type="submit" value="Update" class="btn btn-primary">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<h5 class="text-center" action="/consultant/settings/{{Auth::user()->eid}}/profile"></h5>
							<p class="text-center text-muted"></p>
						</div>
					</div>
					<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="bg-white border-radius-4 box-shadow height-100-p">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Update Profile</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#password" role="tab">Update Password</a>
										</li>
									</ul>
									<div class="tab-content">
                  <!-- Setting Tab start -->
										<div class="tab-pane fade show active" id="profile" role="tabpanel">
											<div class="profile-setting">
						                        <form action="/consultant/settings/{{Auth::user()->eid}}/profile" method="post">
						                        @csrf
													<ul class="profile-edit-list row">
														<li class="weight-500 col-md-6">
															<h4 class="text-blue mb-20">Edit Your Personal Setting</h4>
															<div class="form-group">
																<label>Full Name</label>
																<input class="form-control form-control-lg" type="text" name="name" value="{{Auth::user()->name}}" required>
															</div>
															<div class="form-group mb-0">
																<input type="submit" class="btn btn-primary" value="Update Profile">
															</div>
								                          </li>
								                        </ul>
								                      </form>
								                     
																			</div>
																		</div>
								                    <div class="tab-pane fade height-100-p" id="password" role="tabpanel">
								                    <div class="profile-setting">
								                        <form action="/consultant/settings/{{Auth::user()->eid}}/password" method="post">
                        							@csrf
													<ul class="profile-edit-list row">
														<li class="weight-500 col-md-6">
												      <h4 class="text-blue mb-20">Edit Your Password</h4>
															<div class="form-group">
																<label>New Password</label>
																<input class="form-control form-control-lg" type="password" name="newpassword" placeholder="New Password" required>
															</div>
                              								<div class="form-group">
																<label>Confirm Password</label>
																<input class="form-control form-control-lg" type="password" name="confirmpassword" placeholder="Confirm Password" required>
															</div>
															<div class="form-group mb-0">
																<input type="submit" class="btn btn-primary" value="Update Password">
															</div>
														</li>
													</ul>
												</form>
											</div>
										</div>
										
										<!-- Setting Tab End -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('script')
	<script src="{{asset('vendors/scripts/script.js')}}"></script>
	<script src="{{asset('src/plugins/cropperjs/dist/cropper.js')}}"></script>
	<script>
		window.addEventListener('DOMContentLoaded', function () {
			var image = document.getElementById('image');
			var cropBoxData;
			var canvasData;
			var cropper;

			$('#modal').on('shown.bs.modal', function () {
				cropper = new Cropper(image, {
					autoCropArea: 0.5,
					dragMode: 'move',
					aspectRatio: 3 / 3,
					restore: false,
					guides: false,
					center: false,
					highlight: false,
					cropBoxMovable: false,
					cropBoxResizable: false,
					toggleDragModeOnDblclick: false,
					ready: function () {
						cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
					}
				});
			}).on('hidden.bs.modal', function () {
				cropBoxData = cropper.getCropBoxData();
				canvasData = cropper.getCanvasData();
				cropper.destroy();
			});
		});
	</script>
@endpush

