
@include('frontend.layouts.header')
@include('frontend.layouts.header_links')

@if(Auth::user()->usertype == 'admin')
<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Grow</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

<!-- Start Admin section -->
        <div class="row">
            <div class="col-md-6 col-xl-3">


                    <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-light"><i class="mdi mdi-cart-outline text-danger"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                       <a style="color: rgb(110, 110, 110)" href="{{ route('user.index') }}"> <span class="counter text-danger">{{ $totalEmployee }}</span>
                        Total Employee</a>
                    </div>


                  <a style="color: rgb(110, 110, 110)"  href="{{ route('course.index') }}">  <p class="mb-0 m-t-20 text-muted">Total Courses: {{ $totalCourses }}  </a><span class="pull-right">

                                <a style="color: rgb(110, 110, 110)" class="ml-4" href="{{ route('organization.index') }}">Organizations {{ $totalOrganizations }}</a></span></p>
                 </div>

            </div>

        </div>
        <!-- end  row -->

<!-- end  section orginzation -->






 {{-- <!-- section-Title For courses -->
 <div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">

            <h4 class="page-title">Courses</h4>
        </div>
    </div>
</div>
<!-- end section title  -->

 <!-- Strat section courses -->
        <div class="row">







            <div class="col-md-6 col-lg-6 col-xl-3">

                <!-- Simple card -->
                <div class="card m-b-30">
                    <img class="card-img-top img-fluid" src="{{ asset('frontend/assets/images/small/img-1.jpg')}}" alt="Card image cap" >
                    <div class="card-body">
                        <h4 class="card-title font-20 mt-0">Book 1 </h4>
                        <p class="card-text">Some quick example text to build on the card title and make
                            up the bulk of the card's content.Some quick example text to build on the card title and make
                            up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary waves-effect waves-light">View</a>
                    </div>
                </div>

            </div><!-- end col -->




        </div> --}}

 <!-- end section Courses -->






<!-- Recent Courses  section  -->



        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-15 header-title">Courses</h4>
                        <div class="table-responsive">
                            <table id="courseTable" class="table table-hover mb-0" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th><strong>Sr No</strong></th>
                                        <th><strong>Name</strong></th>
                                        <th><strong>Type</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Category</strong></th>
                                        <th><strong>Sub Category</strong></th>
                                        <th><strong>Price</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $index => $course)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $course->course_name }}</td>
                                            <td>{{ $course->course_type }}</td>
                                            <td>
                                                @if($course->status == 1)
                                                    <span class="badge badge-info">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $course->category->category_name }}</td>
                                            <td>
                                                @if ($course->subcategory && $course->subcategory->category_name == NULL)

                                                @elseif ($course->subcategory)
                                                    {{ substr($course->subcategory->category_name, 0, 8) }}
                                                @else

                                                @endif
                                            </td>
                                            <td>${{ $course->price }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-primary" href="{{ route('course.show', ['id' => $course->id]) }}">
                                                    <i class="fas fa-eye"></i> View
                                                </a>

                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->





<!--admin dashboard end here -->


<!--Organization dashboard start here -->
@elseif(Auth::user()->usertype == 'organization')
<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->


 <!-- Strat section courses -->
        <div class="row">

            <div class="col-md-6 col-lg-6 col-xl-3">

                <!-- Simple card -->
                <div class="card m-b-30">
                    <img class="card-img-top img-fluid" src="{{ asset('frontend/assets/images/small/img-3.jpg')}}" alt="Card image cap" >
                    <div class="card-body">
                        <h4 class="card-title font-20 mt-0">Book 1 </h4>
                        <p class="card-text">.</p>
                        <a href="#" class="btn btn-primary waves-effect waves-light">View</a>
                    </div>
                </div>

            </div><!-- end col -->




        </div>

 <!-- end section Courses -->



  {{-- view popup of address --}}
  <div id="fullAddressModal" class="modal"
  style="display: none; position: fixed; z-index: 1; padding-top: 100px; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);">
  <div class="modal-content"
      style="background-color: #fefefe; margin: auto; padding: 20px; border: 1px solid #888; width: 80%;">
      <span class="full-address"></span>
      <button onclick="closeFullAddressModal()">Close</button>
  </div>
</div>


<!-- Recent Employee section  -->

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 m-b-15 header-title">Latest Employee</h4>
                <div class="table-responsive">
                    <table class="table table-hover mb-0" style="width: 100%;" id="EmployeeTable">
                        <thead>
                            <tr>
                                <th style="text-align: center; white-space: nowrap;"><strong>Name</strong>
                                </th>
                                <th style="text-align: center; white-space: nowrap;"><strong>Email</strong>
                                </th>
                                <th style="text-align: center; white-space: nowrap;">
                                    <strong>Branch</strong>
                                </th>
                                <th style="text-align: center; white-space: nowrap;"><strong>Post</strong>
                                </th>
                                <th style="text-align: center; white-space: nowrap;">
                                    <strong>Experience</strong>
                                </th>

                                <th style="text-align: center; white-space: nowrap;">
                                    <strong>Qualification</strong>
                                </th>
                                <th style="text-align: center; white-space: nowrap;"><strong>Organization
                                    </strong></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td><a href="{{ route('user.show',[$employee->employee_id]) }}">{{ $employee->employee_name }}</td></a>
                                    <td>{{ $employee->employee_email }}</td>
                                    <td>
                                        <span class="truncated-address"
                                            style="cursor: pointer; text-decoration: underline;"
                                            onclick="showFullAddress('{{ $employee->address }}')">
                                            {{ Str::limit($employee->address, 5) }}
                                        </span>
                                    </td>
                                    <td>{{ $employee->post ?? 'N/A' }}</td>
                                    <td>{{ $employee->experence ?? 'N/A' }}</td>


                                    <td>{{ $employee->qualification ?? 'N/A' }}</td>
                                    <td>{{ $employee->organization_name ?? 'N/A' }}</td>









                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- end row -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->



<!-- Organization dashboard end  here  -->


<!-- employe dashboard start here  -->

@else





<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Grow</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->








 <!-- section-Title For courses -->
 <div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">

            <h4 class="page-title">Courses</h4>
        </div>
    </div>
</div>
<!-- end section title  -->

 <!-- Strat section courses -->
        <div class="row">

            <div class="col-md-6 col-lg-6 col-xl-3">

                <!-- Simple card -->
                <div class="card m-b-30">
                    <img class="card-img-top img-fluid" src="{{ asset('frontend/assets/images/small/img-2.jpg')}}" alt="Card image cap" >
                    <div class="card-body">
                        <h4 class="card-title font-20 mt-0">Book 1 </h4>
                        <p class="card-text">Some quick example text to build on the card title and make
                            up the bulk of the card's content.Some quick example text to build on the card title and make
                            up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary waves-effect waves-light">View</a>
                    </div>
                </div>

            </div><!-- end col -->
        </div>

 <!-- end section Courses -->


<!-- end wrapper -->



@endif

@include('frontend.layouts.footer_links')

@include('frontend.layouts.footer')



<script>
    $(document).ready(function() {
        $('#courseTable').DataTable();
    });
</script>


<script>




    function showFullAddress(address) {
        const fullAddressModal = document.getElementById('fullAddressModal');
        const fullAddressSpan = fullAddressModal.querySelector('.full-address');
        fullAddressSpan.innerHTML = address;
        fullAddressModal.style.display = 'block';
    }

    function closeFullAddressModal() {
        const fullAddressModal = document.getElementById('fullAddressModal');
        fullAddressModal.style.display = 'none';
    }
</script>
