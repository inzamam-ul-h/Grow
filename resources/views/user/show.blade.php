@include('frontend.layouts.header_links')
@include('frontend.layouts.header')

<div class="wrapper">
    <div class="container-fluid">

         <!-- Buttons for adding employee and assigning courses -->
         <div class="row mb-3">
            <div class="col-md-6">
               <a href="{{ route('user.create') }}"> <button class="btn btn-success">Add Employee</button></a>
            </div>
            <div class="col-md-6 text-right">
                <button onclick="assignCourse()" class="btn btn-primary">Assign Course</button>
            </div>
        </div>

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <!-- Recent Employee section  -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card shadow-lg">
                <div class=" card-header bg-dark  text-white">
                    <h4 class="mb-0  text-center">Employee Details</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h4>{{ strtoupper($employee->name) }}</h4>

                    </div>
                    <table class="table table-hover table-striped">
                        <tbody>
                            <tr>
                                <th>Email</th>
                                <td>{{ $employee->email }}</td>
                            </tr>
                            <tr>
                                <th>Branch</th>
                                <td>{{ $employee->address ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Post</th>
                                <td>{{ $employee->post ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Experience</th>
                                <td>{{ $employee->experence ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Qualification</th>
                                <td>{{ $employee->qualification ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Creation Date and Time</th>
                                <td>{{ \Carbon\Carbon::parse($employee->created_at)->format('Y-m-d H:i:s') }}</td>
                            </tr>

                            <tr>
                                <th>Update Date and Time</th>
                                <td>{{ \Carbon\Carbon::parse($employee->updated_at)->format('Y-m-d H:i:s') }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- end row -->



@include('frontend.layouts.footer')
@include('frontend.layouts.footer_links')
