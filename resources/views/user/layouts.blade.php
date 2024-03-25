@include('user.head')

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

   @include('user.header')
   @include('user.slider')
   {{-- @include('user.latest') --}}
@yield('latest')
   {{-- @include('user.body') --}}


   @include('user.footer')