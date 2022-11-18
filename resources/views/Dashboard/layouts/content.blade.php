
@php $title =null; @endphp
<!-- content -->
<div class="app-content content">
      <!-- right content -->
      <div class="sidebar-right sidebar-sticky">
        <div class="sidebar">
         <div class="pt-2 pr-2">
          <div class="sidebar-content p-1" data-spy="affix" data-offset-top="-77">
           <div class="card">
            <div class="card-header">
                <h6 class="card-title">{{$title}}</h6>
            </div>
            <div class="card-content" aria-expanded="true">
                <div class="card-body">
                    <nav id="sidebar-page-navigation">
                        <ul id="page-navigation-list" class="nav">
                           
                          @if(!Route::has('dashboard'))
                            <li class="nav-item"><a class="btn btn-primary" href="{{route(request()->segment(2).'.create')}}">{{__('main.create')." ".__('main.'.request()->segment(2))}}</a></li>
                          @endif 
                            <li class="nav-item"><a class="btn btn-defualt" href="{{route('dashboard')}}">{{__('main.home')}}</a></li>
                        </ul>
                    </nav>
                </div>
                
            </div>
           </div>
          </div>
         </div>

        </div>
      </div>
      <!--end right content -->

      <!--left content -->
      <div class="content-left">
        <div class="content-wrapper">
          <!-- header title -->
          <div class="content-header row">
            
            <div class="content-header-left col-md-6 col-12 mb-1">
              <h2 class="content-header-title">{{$title}}</h2>
            </div>
            
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item {{Route::currentRouteName() ? 'active' : ''}}"><a href="#">{{__('main.home')}}</a>
                  </li>
                  <li class="breadcrumb-item {{Route::currentRouteName() ? 'active' : ''}}"><a href="#">{{__('main.'.request()->segment(2))}}</a>
                  </li>
                  
                </ol>
              </div>
            </div>
          
          </div>
         <!--end header title -->

         <!-- header content-->
          <div class="content-body">
            <section id="columns-2">
              <!-- CSS Classes -->
              <section id="columns-2-css" class="card">
                  <div class="card-header">
                      <h4 class="card-title">@yield('title')</h4>
                  </div>
                  <div class="card-content" aria-expanded="true">
                      <div class="card-body">
                          <div class="card-text">
                              @yield('content')
                             
                          </div>
                      </div>
                  </div>
              </section>
              <!--/ CSS Classes -->
            </section>
          </div>
         <!--end header content-->
        </div>
      </div>
      <!-- end left content-->
    </div>
<!-- end content -->
