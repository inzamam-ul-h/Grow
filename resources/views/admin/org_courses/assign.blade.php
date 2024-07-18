@include('frontend.layouts.header_links')
@include('frontend.layouts.header')


<div class="wrapper">
    <div class="container-fluid">
        <!-- Buttons for adding employee and assigning courses -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('orgCourse.index',['id'=>$user_id]) }}"> <button class="btn btn-success">ViewAssign Course</button></a>
            </div>
            <div class="col-md-6 text-right">
                <a href="#"><button class="btn btn-danger">View Trash</button></a>
            </div>
        </div>
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('organization.index') }}">Organizations</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">@if ($username !== 'User not found')
                        <p>Assign New Course: {{ $username }}</p>
                    @else
                        <p>{{ $username }}</p>
                    @endif</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
    @endif

</div>

</div>









@include('frontend.layouts.footer')
@include('frontend.layouts.footer_links')
