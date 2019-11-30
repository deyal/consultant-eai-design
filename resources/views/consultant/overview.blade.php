@extends('layouts.consultant')

@section('title','Home')

@section('content')
  <div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
      <div class="min-height-200px">
        <div class="page-header">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="title">
                <h4>Tickets</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">UI List group</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-sm-12">
            <div class="blog-list">
  						<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
                <h5 class="card-title">By Client</h5>
                <canvas id="chartClientStatus" width="400" height="200"></canvas>
  						</div>
  					</div>
            <br>
            <div class="blog-list">
  						<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
                <h5 class="card-title">By Status (This Week)</h5>
                <canvas id="chartWeekStatus" width="400" height="200"></canvas>
  						</div>
  					</div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="bg-white border-radius-4 box-shadow mb-30">
              <div class="pd-20 bg-white border-radius-4 box-shadow">
                <h4 class="mb-20">Team Members</h4>
                <ul class="list-group">
                  @foreach ($members as $member)
                  <li class="list-group-item">
                    <small>
                      <b>{{$member->name}}</b>
                      <br>
                      Last Login : {{$member->lastLogin()}}
                    </small>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="bg-white border-radius-4 box-shadow mb-30">
              <div class="pd-20 bg-white border-radius-4 box-shadow">
                <h4 class="mb-20">Activity Feed</h4>
                <ul class="list-group" id="activityFeed">
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
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
    var activityFeedTimeout;

    var ctxStatus = $("#chartClientStatus");
    var ctxWeekStatus = $("#chartWeekStatus");

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

    function getData(chartArray) {
      $.get('/overview/chartdata', function(resp){
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

    function getActivityFeed() {
      $.get('/activityfeed',function (resp) {
        $("#activityFeed").html(resp);
        activityFeedTimeout = setTimeout(function() {
          getActivityFeed();
        }, 60000);
      });
    }

    $(document).ready(function(){
      //Chart stuff - START
      var chartClientStatus = new Chart(ctxStatus, {
          type: 'bar',
          data: {
              labels: [],
              datasets: [{
                  label: 'Open',
                  data: [],
                  backgroundColor: '#1c39bb',
              },{
                  label: 'Working',
                  data: [],
                  backgroundColor: '#ff8c00',
              },{
                  label: 'Closed',
                  data: [],
                  backgroundColor: '#696969',
              },
            ]
          },
          options: {
            responseive: true,
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

      var chartWeekStatus = new Chart(ctxWeekStatus, {
          type: 'bar',
          data: {
              labels: [],
              datasets: [{
                  label: '',
                  data: [],
                  backgroundColor: '#1c39bb',
              },{
                  label: '',
                  data: [],
                  backgroundColor: '#ff8c00',
              },{
                  label: '',
                  data: [],
                  backgroundColor: '#696969',
              },
            ]
          },
          options: {
            responseive: true,
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
        chartClientStatus,
        chartWeekStatus,
      ];

      getData(chartArray);
      //chart stuff - END

      //Activity Feed - START

      getActivityFeed();

      //Activity Feed - END
    });
  </script>
@endpush
