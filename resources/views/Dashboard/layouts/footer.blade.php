<footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix text-muted text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">{{__('main.copy')}}  &copy; {{now()->format('Y')}} <a class="text-bold-800 grey darken-2" href="#" target="_blank">{{__('main.project_name')}} </a>, {{__('main.rights')}}. </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">{{__('main.hand_made')}} <i class="icon-heart5 pink"></i></span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->

    <!-- BEGIN MODERN JS-->
    <script src="{{asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
    <!-- END MODERN JS-->
    
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('app-assets/vendors/js/ui/prism.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/ui/affix.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/documentation.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
  
</body>
</html>