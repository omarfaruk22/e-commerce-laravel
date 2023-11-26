<!DOCTYPE html>
<html lang="en">
 @include('backend.includes.head')
    <!--  css -->
    @include('backend.includes.css')
   @yield('styles')
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('backend.includes.sidebar')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
   @include('backend.includes.topbar')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    @include('backend.includes.rightbar')
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      @yield('content')


      
    <!-- ########## END: MAIN PANEL ########## -->
    @include('backend.includes.footer')
  </div><!-- br-mainpanel -->
    @include('backend.includes.js')
    @yield('scripts')
  </body>
</html>
