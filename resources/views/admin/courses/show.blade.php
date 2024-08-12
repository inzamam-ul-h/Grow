{{--






@include('frontend.layouts.header_links')
@include('frontend.layouts.header')

<script src="{{ asset('frontend/assets/newjs/jquery.min.js') }}"></script>

<div class="wrapper">
    <div class="container-fluid">
        <!-- Buttons for adding courses and viewing trash -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('course.create') }}"> <button class="btn btn-success">Add Course</button></a>
            </div>
            <div class="col-md-6 text-right">
                <a href="#"><button class="btn btn-danger">View Trash</button></a>
            </div>
        </div>

        <!-- Page Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Courses</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Courses</h4>
                </div>
            </div>
        </div>

        <!-- Alert Messages -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Course Details Card -->
        <div class="container mt-5">
            <div class="card" style="border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                <div class="card-header text-white text-center py-3" style="background: linear-gradient(135deg, #007bff, #0056b3); border-radius: 10px 10px 0 0;">
                    <h2 style="margin: 0;">{{ $course->course_name }}</h2>
                    <p style="margin-bottom: 0;">Price: ${{ $course->price }}</p>
                    <button class="btn btn-secondary btn-sm mt-2">Active</button>
                </div>

                <div class="card-body">
                    <div class="row">
                        <!-- Course Image -->
                        <div class="col-md-6 text-center mb-4">
                            <img src="{{ asset('storage/' . $course->course_image) }}" alt="Course Image" style="max-width: 100%; height: auto; border-radius: 10px;">
                        </div>

                        <!-- Course Information -->
                        <div class="col-md-6">
                            <div class="text-center mb-3">
                                <h4>Description:</h4>
                                <p class="card-text">{{ $course->course_description }}</p>
                            </div>
                            <div class="text-center mb-3">
                                <h4>Course Type:</h4>
                                <p class="card-text">{{ $course->course_type }}</p>
                            </div>
                            <div class="text-center mb-3">
                                <h4>Introductory Video:</h4>
                                @if ($course->intro_video == null)
                                    <p>No introductory Video</p>
                                @else
                                    <div class="embed-responsive embed-responsive-16by9" style="border-radius: 10px; overflow: hidden;">
                                        <iframe class="embed-responsive-item" src="{{ asset('storage/' . $course->intro_video) }}" allowfullscreen style="border: none; width: 100%; height: 300px;"></iframe>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Category and Sub-category Information -->
                    <div class="text-center mb-3">
                        <div class="icon" style="display: flex; align-items: center; justify-content: center;">
                            @if ($category && $category->category_icon)
                                <img src="{{ asset('storage/' . $category->category_icon) }}" alt="Icon 1" style="width: 24px; height: 24px; margin-right: 10px; border-radius: 50%; border: 2px solid white;">
                            @endif
                            <span style="font-weight: bold;">Category Name: {{ $category->category_name }}</span>
                        </div>
                        <div class="icon" style="display: flex; align-items: center; justify-content: center; margin-top: 10px;">
                            <span style="font-weight: bold;">Sub-category Name: {{ $category->subCategoryName }}</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="text-center">
                        <a href="{{ route('chapter.index',['id' => $course->id]) }}" class="btn btn-outline-primary" style="width: 100%; max-width: 300px; margin: 5px auto; padding: 10px; font-size: 18px;">Chapters</a>
                        <a href="#" class="btn btn-outline-primary" style="width: 100%; max-width: 300px; margin: 5px auto; padding: 10px; font-size: 18px;">Assign Course</a>
                        <a href="#" class="btn btn-outline-primary" style="width: 100%; max-width: 300px; margin: 5px auto; padding: 10px; font-size: 18px;">Quiz</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.layouts.footer')
@include('frontend.layouts.footer_links') --}}











{{-- Include header links and header --}}
@include('frontend.layouts.header_links')
@include('frontend.layouts.header')

<script src="{{ asset('frontend/assets/newjs/jquery.min.js') }}"></script>

<div class="wrapper">
    <div class="container-fluid">
        <!-- Buttons for adding courses and viewing trash -->
        @if (auth()->user()->usertype == 'admin')
            <div class="row mb-3">
                <div class="col-md-6">
                    <a href="{{ route('chapter.create', ['id' => $course->id]) }}">
                        <button class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Chapter</button>
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="#"><button class="btn btn-danger">View Trash</button></a>
                </div>
            </div>
        @endif
        <!-- Page Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            @if (auth()->user()->usertype == 'admin')
                                <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Courses</a></li>
                            @endif
                        </ol>
                    </div>
                    <h4 class="page-title">Course Details</h4>
                </div>
            </div>
        </div>

        <!-- Alert Messages -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row mt-5">
            <!-- Sidebar for Chapters -->
            @include('admin.courseSideBar')
            <!-- Main Content for Course Details -->
            <div class="col-md-9">
                <div class="card" style="border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    <div class="card-header text-white text-center py-3"
                        style="background: linear-gradient(135deg, #007bff, #0056b3); border-radius: 10px 10px 0 0;">
                        <div class="d-flex align-items-center justify-content-center">
                            @if ($category && $category->category_icon)
                                <img src="{{ asset('storage/' . $category->category_icon) }}" alt="Icon"
                                    style="width: 40px; height: 40px; margin-right: 10px; border-radius: 50%; border: 2px solid white;">
                            @endif
                            <div>
                                <h2 style="margin: 0;">{{ $course->course_name }}</h2>
                                <p style="margin-bottom: 10px;">Price: ${{ $course->price }}</p>
                            </div>
                        </div>
                        @if (auth()->user()->usertype == 'admin')
                            <div class="btn-group">
                                <button
                                    class="btn toggle-status {{ $course->status == '0' ? 'btn-danger' : 'btn-secondary btn-sm' }}"
                                    data-id="{{ $course->id }}">
                                    @if ($course->status == '0')
                                        <i class="fas fa-toggle-off"></i> Inactive
                                    @else
                                        <i class="fas fa-toggle-on"></i> Active
                                    @endif
                                </button>
                                <button class="btn btn-success ml-3 btn-sm" id="viewUsersBtn" data-toggle="modal"
                                    data-target="#UserModal">
                                    <i class="fas fa-user"></i> View Users
                                </button>
                            </div>

                        @endif
                    </div>




                    {{-- modal for view user details --}}

                    <div class="modal" id="UserModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="userModalLabel">Users in Course</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- User details will be loaded here -->
                                    <div id="userDetails">
                                        <h1>{{ $course->name }}</h1>
                                        <p>{{ $course->description }}</p>

                                        <h2>Organizations Enrolled</h2>
                                        @if ($organizations->isEmpty())
                                            <p>No organizations are enrolled in this course.</p>
                                        @else
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>

                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($organizations as $organization)
                                                        <tr>
                                                            <td>{{ $organization->name }}</td>
                                                            <td>{{ $organization->email }}</td>
                                                            <td>
                                                                @if (auth()->user()->usertype == 'admin')
                                                                <div class="btn-group">
                                                                    <button
                                                                        class="btn toggle-status {{ $organization->orgStatus == '0' ? 'btn-danger' : 'btn-secondary btn-sm' }}"
                                                                        data-id="{{ $organization->orgCid }}">
                                                                        @if ($organization->orgStatus == '0')
                                                                            <i class="fas fa-toggle-off"></i> Inactive
                                                                        @else
                                                                            <i class="fas fa-toggle-on"></i> Active
                                                                        @endif
                                                                    </button>
                                                                </div>


                                                            @endif



                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif

                                        <h2>Employees Enrolled</h2>
                                        @if ($employees->isEmpty())
                                            <p>No employees are enrolled in this course.</p>
                                        @else
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Status</th>
                                                        <th>Organization Name</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($employees as $employee)
                                                        <tr>
                                                            <td>{{ $employee->name }}</td>
                                                            <td>{{ $employee->email }}</td>

                                                            <td>{{ $employee->organization_name }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif





                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <!-- Course Image -->
                            <div class="col-md-6 text-center mb-4">
                                <img src="{{ asset('storage/' . $course->course_image) }}" alt="Course Image"
                                    style="max-width: 100%; height: auto; border-radius: 10px;">
                            </div>

                            <!-- Course Information -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h4>Description:</h4>
                                    <p class="card-text">{{ $course->course_description }}</p>
                                </div>
                                <div class="mb-3">
                                    <h4>Course Type:</h4>
                                    <p class="card-text">{{ $course->course_type }}</p>
                                </div>
                                <div class="mb-3">
                                    <h4>Introductory Video:</h4>
                                    @if ($course->intro_video == null)
                                        <p>No introductory Video</p>
                                    @else
                                        <div class="embed-responsive embed-responsive-16by9"
                                            style="border-radius: 10px; overflow: hidden;">
                                            <iframe class="embed-responsive-item"
                                                src="{{ asset('storage/' . $course->intro_video) }}" allowfullscreen
                                                style="border: none; width: 100%; height: 300px;"></iframe>
                                        </div>
                                    @endif
                                </div>

                                <!-- Category and Sub-category Information -->
                                <div class="mb-3">
                                    <div class="icon"
                                        style="display: flex; align-items: center; justify-content: center;">
                                        @if ($category && $category->category_icon)
                                            <img src="{{ asset('storage/' . $category->category_icon) }}"
                                                alt="Icon 1"
                                                style="width: 24px; height: 24px; margin-right: 10px; border-radius: 50%; border: 2px solid white;">
                                        @endif
                                        <span style="font-weight: bold;">Category Name:
                                            {{ $category->category_name }}</span>
                                    </div>
                                    <div class="icon"
                                        style="display: flex; align-items: center; justify-content: center; margin-top: 10px;">
                                        @if ($category->subCategoryName == null)
                                            <span style="font-weight: bold;"></span>
                                        @else
                                            <span style="font-weight: bold;">Sub-category Name:
                                                {{ $category->subCategoryName }}</span>
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->usertype == 'admin')
                        <!-- Footer Buttons -->
                        <div class="card-footer d-flex justify-content-center" style="border-top: none;">
                            <button class="btn btn-danger btn-sm mx-2" style="width: 100px;">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                            <a class="btn btn-primary btn-sm mx-2" style="width: 100px;"
                                href="{{ route('course.edit', ['id' => $course->id]) }}">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@include('frontend.layouts.footer')
@include('frontend.layouts.footer_links')




<script>
    //status check of course
    $(document).ready(function() {
        // Function to toggle course status
        function toggleStatus(courseId, button) {
            $.ajax({
                url: '/course/toggle-status/' + courseId,
                method: 'GET',
                success: function(data) {
                    if (data.status == '0') {
                        button.html('<i class="fas fa-toggle-off"></i> Inactive');
                        button.removeClass('btn-secondary btn-sm').addClass('btn-danger');
                    } else {
                        button.html('<i class="fas fa-toggle-on"></i> Active');
                        button.removeClass('btn-danger').addClass('btn-secondary btn-sm');
                    }
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }

        // Handle click event on status button
        $(document).on('click', '.toggle-status', function() {
            var courseId = $(this).data('id');
            var button = $(this);
            toggleStatus(courseId, button);
        });
    });



    //handle user and courser status active
</script>


{{-- //Organization course status if we want to block organization to acess course --}}
<script>
    $(document).ready(function() {
        // Function to toggle course status
        function toggleStatus(orgCid, button) {
            $.ajax({
                url: '{{ route("orgCourse.toggleStatus", ":id") }}'.replace(':id', orgCid),
                method: 'GET',
                success: function(data) {
                    if (data.status == '0') {
                        button.html('<i class="fas fa-toggle-off"></i> Inactive');
                        button.removeClass('btn-secondary btn-sm').addClass('btn-danger');
                    } else {
                        button.html('<i class="fas fa-toggle-on"></i> Active');
                        button.removeClass('btn-danger').addClass('btn-secondary btn-sm');
                    }
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }

        // Handle click event on status button
        $(document).on('click', '.toggle-status', function() {
            var orgCid = $(this).data('id');
            var button = $(this);
            toggleStatus(orgCid, button);
        });
    });
</script>

