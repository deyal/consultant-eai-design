<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Basic Page Info -->
        <meta charset="utf-8">

        <!-- Site favicon -->
        <!-- <link rel="shortcut icon" href="images/favicon.ico"> -->

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('vendors/styles/style.min.css')}}">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
        
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-119386393-1');
        </script>

        <title>Admin | @yield('title')</title>

        <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}">
              
        <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/datatables/media/css/jquery.dataTables.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/datatables/media/css/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/datatables/media/css/responsive.dataTables.css')}}">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" integrity="sha256-aa0xaJgmK/X74WM224KMQeNQC2xYKwlAt08oZqjeF0E=" crossorigin="anonymous" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" integrity="sha256-aa0xaJgmK/X74WM224KMQeNQC2xYKwlAt08oZqjeF0E=" crossorigin="anonymous" />
        
      	<link rel="stylesheet" type="text/css" href="{{asset('src/plugins/cropperjs/dist/cropper.css')}}"> 
      
        <!-- fancybox Popup css -->
        <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/fancybox/dist/jquery.fancybox.css')}}">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.6/dist/sweetalert2.all.min.js" integrity="sha256-cPAjH3qcCfJYMWZtmUXU13lT9v4SqTdjk+N7KamTlOc=" crossorigin="anonymous"></script>

    </head>
    <body>
      @include('sweetalert::alert')
      <div class="pre-loader"></div>
    	<div class="header clearfix">
    		<div class="header-right">
    			<div class="brand-logo">
    				<a href="index.php">
    					<img src="{{asset('vendors/images/logo.png')}}" alt="" class="mobile-logo">
    				</a>
    			</div>
    			<div class="menu-icon">
    				<span></span>
    				<span></span>
    				<span></span>
    				<span></span>
    			</div>
    			<div class="user-info-dropdown">
    				<div class="dropdown">
    					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
    						<span class="user-icon"><i class="fa fa-user-o"></i></span>
    						<span class="user-name">
                  {{Auth::user()->name}}
                  </span>
    					</a>
    					<div class="dropdown-menu dropdown-menu-right">
    						<a class="dropdown-item" href="admin/settings"><i class="fa fa-cog" aria-hidden="true"></i> Setting</a>
    						<a class="dropdown-item" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
      <div class="left-side-bar">
        <div class="brand-logo">
          <a href="index.php">
            <img src="{{asset('vendors/images/deskapp-logo.png')}}" alt="">
          </a>
        </div>
        <div class="menu-block customscroll">
          <div class="sidebar-menu">
            <ul id="accordion-menu">
              <li>
                <a href="/dashboard" class="dropdown-toggle no-arrow">
                  <span class="fa fa-tachometer"></span><span class="mtext">Dashboard</span>
                </a>
              </li>
              <li>
                <a href="/consultant" class="dropdown-toggle no-arrow">
                  <span class="fa fa-users"></span><span class="mtext">Consultants</span>
                </a>
              </li>
              <li>
                <a href="/client" class="dropdown-toggle no-arrow">
                  <span class="fa fa-building-o"></span><span class="mtext">Clients</span>
                </a>
              </li>
              <li>
                <a href="/module" class="dropdown-toggle no-arrow">
                  <span class="fa fa-folder"></span><span class="mtext">Modules</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      @yield('content')


      @stack('script')
</html>
