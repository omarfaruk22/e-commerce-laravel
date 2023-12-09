<!DOCTYPE html>
<html class="no-js" lang="en">
@include('frontend.includes.head')

@include('frontend.includes.style')
</head>

<body>
    <!-- Modal -->
   @include('frontend.includes.model')
    <!-- Quick view -->
   @include('frontend.includes.quickview')
   {{-- this is header section  --}}

    @include('frontend.includes.header')

    {{-- this mobile header section  --}}
    @include('frontend.includes.mobileheader')
    <!--End header-->
    @yield('content')

   @include('frontend.includes.footer')
    <!-- Preloader Start -->
    @include('frontend.includes.preloader')
    <!-- Vendor JS-->
    @include('frontend.includes.script')
</body>

</html>