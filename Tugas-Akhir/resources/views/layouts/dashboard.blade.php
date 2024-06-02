<!doctype html>
<html lang="en">
   <head>
   @include('layouts.dasboard._head')
   </head>
   <body>
      <!-- loader Start -->
      @include('layouts.dasboard.loader')
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         @include('layouts.dasboard.sidebar')
         <!-- TOP Nav Bar -->
         @include('layouts.dasboard.header')
         <!-- TOP Nav Bar END -->
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
             @yield ('content')
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
      <!-- Footer -->
      @include('layouts.dasboard.footer')
      <!-- Footer END -->

      <!-- Optional JavaScript -->
      @include('layouts.dasboard._foot')
   </body>
</html>
