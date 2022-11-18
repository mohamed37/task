@php
    $languages = ['en','ar'];
    $locale = session()->get('locale');
@endphp

<html class="loading" lang="{{$locale}}" data-textdirection="{{$locale =='en' ? 'ltr' : 'rtl'}}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    
    <title>{{__('main.'.config('app.name'))}}</title>

    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('app-assets/images/ico/apple-icon-60.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('app-assets/images/ico/apple-icon-76.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('app-assets/images/ico/apple-icon-152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('app-assets/images/ico/favicon-32.png')}}">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/ui/prism.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/documentation.css')}}">
     <!-- END Page Level CSS-->
   
  @if($locale == 'ar')
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/vendors.css')}}">
    <!-- END VENDOR CSS-->
    
    <!-- BEGIN MODERN CSS-->
    
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/app.css')}}">
    <!-- END MODERN CSS-->

    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-overlay-menu.css')}}">
    <!-- END Page Level CSS-->
    
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/style.css')}}">
    <!-- END Custom CSS-->
  @else

  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/vendors.css')}}">
    <!-- END VENDOR CSS-->
    
    <!-- BEGIN MODERN CSS-->
    
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/app.css')}}">
    <!-- END MODERN CSS-->

    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-overlay-menu.css')}}">
    <!-- END Page Level CSS-->
    
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/style-rtl.css')}}">
    <!-- END Custom CSS-->
  @endif
</head>
  <body class="vertical-layout vertical-menu content-right-sidebar  fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="content-right-sidebar">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu d-md-none float-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1">
                  <div class="bs-callout-info callout-border-left mt-1 p-1"><strong>Great Job!</strong>
                    <p>Biscuit macaroon tootsie roll croissant. Dessert candy canes halvah cookie liquorice. Candy canes muffin gummies jujubes brownie. Pie cake pie pastry sugar plum jelly apple pie cotton candy.</p>
                  </div></i></a></li>
            <li class="nav-item"><a class="navbar-brand" href="#"><img class="brand-logo" alt="modern admin logo" src="{{asset('app-assets/images/logo/logo.png')}}">
                <h3 class="brand-text">{{__('main.'.config('app.name'))}}</h3></a></li>
            <li class="nav-item d-md-none float-right"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-ellipsis pe-2x fa-rotate-90"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            
           <ul class="nav navbar-nav mr-auto">

              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs">{{auth()->user()->name}}<i class="icon-menu5"></i></a></li>
              
              <li class="nav-item d-none d-md-block"><img style="width: 100px;
                                                                height: 45px;
                                                                margin: 10px;
                                                                border-radius: 25%;" 
                                                                src="{{auth()->user()->image_path}}"></li>
              

              @if(auth('admin')->check())
              <a href="{{ route('logout','admin') }}">
                  {{__('main.logout')}}
              </a>
              @else
              <a href="{{ route('logout','web') }}">
                  {{__('main.logout')}}
              </a>
              
              @endif
            </ul>

            <!-- Languages -->
            <ul class="nav navbar-nav float-right">
             

             @foreach($languages as $lang)
              @if($lang != $locale)
               <li class="nav-item">
                 <a class="btn btn-default btn-doc-header" href="{{url('lang',$lang)}}" >
                   <img style="width: 30px;margin: 0px 3px;border-radius: 38%;" 
                     src="{{asset($lang == 'ar' ? 'app-assets/images/flags/egypt.svg' : 'app-assets/images/flags/united-states.svg')}}">
                      {{$lang}}
                 </a>
               </li>
               @endif
             @endforeach
            </ul>
            <!-- End Languages -->
        

          </div>
        </div>
      </div>
    </nav>
