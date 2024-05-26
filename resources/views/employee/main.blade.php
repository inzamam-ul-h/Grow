

<!doctype html>
<html lang="en">
  <head>

   @include('frontend.layouts.header_links')

  </head>
  <body style="overflow: visible;">
         <!-- Loader -->
         <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
      @include('employee.header')
      @extends('employee.employeeDashboard')
      @include('employee.footer')
      @include('frontend.layouts.footer_links')
  </body>
 
</html>
