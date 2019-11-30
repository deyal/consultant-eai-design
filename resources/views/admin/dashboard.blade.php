@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
  <div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="row clearfix">
				<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<h4 class="mb-30">By Module</h4>
						<div class="device-manage-progress-chart">
							<ul>
								<li class="clearfix">
                  <canvas id="chartTicketModule" width="300" height="300"></canvas>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<h4 class="mb-30">By Priority</h4>
						<div class="clearfix device-usage-chart">
            <canvas id="chartTicketPriority" width="300" height="300"></canvas>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<h4 class="mb-30">By Status</h4>
						<div class="clearfix device-usage-chart">
            <canvas id="chartTicketStatus" width="300" height="300"></canvas>
						</div>
					</div>
				</div>
			</div>
      <div class="bg-white pd-20 box-shadow border-radius-5 mb-30">
				<h4 class="mb-30">By Modules per Client</h4>
				<div class="row">
					<div class="col-sm-12 col-md-8 col-lg-9 xs-mb-20">
            <canvas id="chartClientModule" width="600" height="300"></canvas>
					</div>
				</div>
			</div>
      <div class="bg-white pd-20 box-shadow border-radius-5 mb-30">
				<h4 class="mb-30">By Priorities per Client</h4>
				<div class="row">
					<div class="col-sm-12 col-md-8 col-lg-9 xs-mb-20">
            <canvas id="chartClientPriority" width="600" height="300"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection

@push('script')
	<script src="{{asset('vendors/scripts/script.js')}}"></script>
  <script src="{{asset('src/plugins/highcharts-6.0.7/code/highcharts.js')}}"></script>
	<script src="https://code.highcharts.com/highcharts-3d.js"></script>
	<script src="{{asset('src/plugins/highcharts-6.0.7/code/highcharts-more.js')}}"></script>
  <script type="text/javascript">
  var chartTimeout;

  var ctxModule = $('#chartTicketModule');
  var ctxPriority = $('#chartTicketPriority');
  var ctxStatus = $('#chartTicketStatus');
  var ctxClientModule = $('#chartClientModule');
  var ctxClientPriority = $('#chartClientPriority');

  function addData(chart, labels, data, label) {
      chart.data.labels = labels;
      var i = 0;
      chart.data.datasets.forEach((dataset) => {
        if(label != null) {
          dataset.data = data[i+1];
          dataset.label = label[i];
          i++;
        } else {
          dataset.data = data;
        }
      });
      chart.update();
  }

  // function removeData(chart) {
  //     chart.data.labels.pop();
  //     chart.data.datasets.forEach((dataset) => {
  //         dataset.data.pop();
  //     });
  //     chart.update();
  // }

  function getData(chartArray) {
    $.get('/dashboard/chartdata', function(resp){
      $.each(chartArray, function(i,v){
        addData(
          v,
          resp[i]['labels'],
          resp[i]['data'],
          resp[i]['label']
        );
      });
      chartTimeout = setTimeout(function(){
        getData(chartArray);
      }, 300000);
    });
  }

  $(document).ready(function () {

    var chartTicketModule = new Chart(ctxModule, {
      type: 'pie',
      data: {
        labels : [],
        datasets: [
          {
            data : [],
            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
          }
        ]
      }
    });

    var chartTicketPriority = new Chart(ctxPriority, {
      type: 'pie',
      data: {
        labels : [],
        datasets: [
          {
            data : [],
            backgroundColor: ["#32cd32", "#f4c430","#b22222"],
          }
        ]
      }
    });

    var chartTicketStatus = new Chart(ctxStatus, {
      type: 'pie',
      data: {
        labels : [],
        datasets: [
          {
            data : [],
            backgroundColor: ["#1c39bb", "#ff8c00","#696969"],
          }
        ]
      }
    });

    var chartClientModule = new Chart(ctxClientModule, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: '',
                data: [],
                backgroundColor: '#3e95cd',
            },{
                label: '',
                data: [],
                backgroundColor: '#8e5ea2',
            },{
                label: '',
                data: [],
                backgroundColor: '#3cba9f',
            },
          ]
        },
        options: {
          responsive: true,
          scales: {
  					xAxes: [{
  						stacked: true,
  					}],
  					yAxes: [{
  						stacked: true,
              ticks: {
                  beginAtZero: true
              }
  					}],
  				}
        }
    });

    var chartClientPriority = new Chart(ctxClientPriority, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Low',
                data: [],
                backgroundColor: '#32cd32',
            },{
                label: 'Medium',
                data: [],
                backgroundColor: '#f4c430',
            },{
                label: 'High',
                data: [],
                backgroundColor: '#b22222',
            },
          ]
        },
        options: {
          responsive: true,
          scales: {
  					xAxes: [{
  						stacked: true,
  					}],
  					yAxes: [{
  						stacked: true,
              ticks: {
                  beginAtZero: true
              }
  					}],
  				}
        }
    });

    var chartArray = [
      chartTicketModule,
      chartTicketPriority,
      chartTicketStatus,
      chartClientModule,
      chartClientPriority,
    ];

    getData(chartArray);

  });
  </script>
@endpush
