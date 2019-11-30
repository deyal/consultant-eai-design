@extends('layouts.consultant')

@section('title','View Ticket')

@section('content')

  <div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Form Basic</li>
								</ol>
							</nav>
						</div>
            <div class="col-md-6 col-sm-12 text-right">
              {!! $ticket->changeStatusButton() !!}
						</div>
				</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Ticket</h4>
							<p class="mb-30 font-14"> #{{$ticket->ticketNumber()}}</p>
						</div>
					</div>
					<form>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">ID</label>
							<div class="col-sm-12 col-md-10">
								<p>{{$ticket->ticketNumber()}}</p>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Sender</label>
							<div class="col-sm-12 col-md-10">
								<p>{{$ticket->PIC}} ({{$ticket->clients->name}})</p>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Title</label>
							<div class="col-sm-12 col-md-10">
								<p>{{$ticket->title}}</p>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Message</label>
							<div class="col-sm-12 col-md-10">
								<p>{{$ticket->message}}</p>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Attached Image(s)</label>
							<div class="col-sm-12 col-md-10">
                <div class="gallery-wrap">
                  <ul class="row">
                    @foreach ($ticket->img_links as $key => $img_link)
                      <li class="col-lg-4 col-md-6 col-sm-12">
                        <div class="da-card box-shadow">
                          <div class="da-card-photo">
                            <img src="{{$img_link}}" alt="">
                              <div class="da-overlay">
                                <div class="da-social">
                                <h5 class="mb-10 color-white pd-20">Lorem ipsum dolor sit amet, consectetur adipisicing.</h5>
                                  <ul class="clearfix">
                                    <li><a href="{{$img_link}}" data-fancybox="images"><i class="fa fa-picture-o"></i></a></li>
                                  </ul>
                                </div>
                              </div>
                          </div>
                        </div>
                      </li>
                    @endforeach 
                  </ul>
                </div>                   
							</div>
						</div>
					</form>
        </div>
			</div>
		</div>
	</div>
@endsection

@push('script')	
  <!-- js -->
	<script src="{{asset('vendors/scripts/script.js')}}"></script>
  
	<!-- fancybox Popup Js -->
	<script src="{{asset('src/plugins/fancybox/dist/jquery.fancybox.js')}}"></script>
@endpush

