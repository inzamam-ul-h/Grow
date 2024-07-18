@include('frontend.layouts.header')
@include('frontend.layouts.header_links')

<div class="wrapper">
    <div class="container-fluid">

        <!-- Buttons for adding employee and assigning courses -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('organization.create') }}"> <button class="btn btn-success">Add
                        Organization</button></a>
            </div>
            <div class="col-md-6 text-right">
                <button onclick="assignCourse()" class="btn btn-primary">Asbnsaf</button>
            </div>
        </div>

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item active">Organization</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <!-- Recent Employee section  -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-15 header-title">Organization Details</h4>

                        <div class="container">
                            <div class="col-md-8 offset-md-2">
                                <div class="text-center">
                                    <div class="card-body">
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                            @elseif  (session('error'))
                                            <div class="alert alert-danger">
                                             {{ session('error') }}
                                         </div>>
                                        @endif


                                        <div class="card shadow-lg">
                                            <div class=" card-header bg-dark  text-white">
                                                <h4 class="mb-0  text-center">Organization Information</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="text-center mb-4">
                                                    <h4>{{ strtoupper($organization->name) }}</h4>

                                                </div>
                                                <table class="table table-hover table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <th>Email</th>
                                                            <td>{{ $organization->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Address</th>
                                                            <td>{{ $organization->address ?? 'N/A' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> Registration Number:</th>
                                                            <td>{{ $organization->register_no ?? 'N/A' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Contact</th>
                                                            <td>{{ $organization->contact }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Creation Date and Time</th>
                                                            <td>{{ \Carbon\Carbon::parse($organization->created_at)->format('Y-m-d H:i:s') }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>Update Date and Time</th>
                                                            <td>{{ \Carbon\Carbon::parse($organization->updated_at)->format('Y-m-d H:i:s') }}
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end row -->

                @include('frontend.layouts.footer')
                @include('frontend.layouts.footer_links')
