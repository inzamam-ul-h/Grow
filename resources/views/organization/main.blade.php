

<!doctype html>
<html lang="en">
  <head>

   @include('frontend.layouts.header_links')

  </head>
  <body style="overflow: visible;">
         <!-- Loader -->
         <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
      @include('organization.header')
      @extends('organization.orgDashboard')
      @include('organization.footer')
      @include('frontend.layouts.footer_links')
  </body>
 
</html>
