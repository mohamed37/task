  
  <!-- Sidbar -->
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="main-menu-content menu-accordion">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          
        <li class=" nav-item"><a href="#"><i class="ft-home"></i><span class="menu-title" data-i18n="">{{__('main.'.config('app.name'))}}</span></a>
        </li>

        <!-- users -->
          <li class=" nav-item"><a href="#"><i class="ft-settings"></i><span class="menu-title" data-i18n="">{{__('main.users')}}</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="{{route('users.index')}}">{{__('main.users')}}</a></li>
              <li><a class="menu-item" href="{{route('users.create')}}">{{__('main.create') ." ". __('main.users') }}</a></li>
                   
            </ul>
          </li>
        <!-- end users -->

        <!-- end users-permission -->
              <li class=" nav-item"><a href="#"><i class="ft-settings"></i><span class="menu-title" data-i18n="">{{__('main.permission_users')}}</span></a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="{{route('add_per_user')}}">{{__('main.create_permission_users')}}</a></li>
                  <li><a class="menu-item" href="{{route('peruser')}}">{{__('main.permission_users')}}</a></li>    
                  
            </ul>
          </li>
        <!-- end users-permission -->

        <!-- Admin -->
        <li class=" nav-item">
          <a href="#">
          <i class="ft-settings"></i><span class="menu-title" data-i18n="">{{__('main.admins')}}</span></a>
          <ul class="menu-content">
            
            <li><a class="menu-item" href="{{route('admins.index')}}">{{__('main.admins')}}</a></li>
            <li><a class="menu-item" href="{{route('admins.create')}}">{{__('main.create')}}</a></li>           
          </ul>
        </li>
      <!-- end Admin -->

        <!-- Roles & Permissions -->
        <li class=" nav-item"><a href="#"><i class="ft-settings"></i><span class="menu-title" data-i18n="">{{__('main.roles')}}</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="{{route('roles.index')}}">{{__('main.roles')}}</a></li>
            <li><a class="menu-item" href="{{route('roles.create')}}">{{__('main.create')." ". __('main.roles')}}</a></li>
          </ul>
        </li>
        <li class=" nav-item"><a href="#"><i class="ft-settings"></i><span class="menu-title" data-i18n="">{{__('main.permissions')}}</span></a>    
          <ul class="menu-content">
               
            <li><a class="menu-item" href="{{route('permissions.index')}}">{{__('main.permissions')}}</a></li>
            
            <li><a class="menu-item" href="{{route('permissions.create')}}">{{__('main.create')." ". __('main.permissions')}}</a></li>
          
          </ul>
          </li>
        <!-- end Roles & Permissions -->
                
        </ul>
      </div>
    </div>
<!-- end sidbar -->
