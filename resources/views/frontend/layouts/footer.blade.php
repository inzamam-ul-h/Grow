



 <!-- Footer -->
 <footer class="footer">
    @if(Auth::user()->usertype == 'employee')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                © 2024 Grow employee<i class="mdi mdi-heart text-danger"></i>
            </div>
        </div>
    </div>


    @elseif(Auth::user()->usertype == 'organization')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                © 2024 Grow Organization <i class="mdi mdi-heart text-danger"></i>
            </div>
        </div>
    </div>

    @else

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                © 2024 Grow Admin <i class="mdi mdi-heart text-danger"></i>
            </div>
        </div>
    </div>

@endif

</footer>
<!-- End Footer -->
