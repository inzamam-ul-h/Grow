@include('frontend.layouts.header_links')
@include('frontend.layouts.header')


<div class="wrapper">
    <div class="container-fluid">
        {{-- <!-- Buttons for adding employee and assigning courses -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('orgCourse.create',['id'=>$user_id]) }}"> <button class="btn btn-success">Assign Course</button></a>
            </div>
            <div class="col-md-6 text-right">
                <a href="#"><button class="btn btn-danger">View Trash</button></a>
            </div>
        </div> --}}
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('organization.index') }}">Organizations</a>
                            </li>
                        </ol>
                    </div>
                    <h4 class="page-title">
                        @if ($username !== 'User not found')
                            <p> {{ $username }} Courses</p>
                        @else
                            <p>{{ $username }}</p>
                        @endif
                    </h4>
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

        @if(auth()->user()->usertype=='admin')
            <form action="{{ route('orgCourse.store',['id'=>$user_id]) }}" method="POST" class="form-inline">
                @csrf
                <div class="form-group mr-4">
                    <label for="course_id" class="mr-4">Course:</label>
                    <select name="course_id" id="course_id" class="form-control">
                        <option value="">Select Course</option>
                        @foreach ($totalCourses as $id => $course_name)
                            <option value="{{ $id }}">{{ $course_name }}</option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-primary btn-sm">Assign Course</button>
            </form>
           @endif
        <div class="container mt-5">
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-4 mb-4  course-item">


                        <div class="card" style="transition: transform 0.3s; border: none; border-radius: 10px;">

                            @if (isset($course) && $course->intro_video)
                                <div>
                                    <video class="embed-responsive-item card-img-top"
                                        style="height: 200px; object-fit: cover;"
                                        src="{{ asset('storage/' . $course->intro_video) }}" muted controls></video>

                                </div>
                            @else
                                <div>
                                    <img src="{{ asset('storage/' . $course->course_image) }}" class="card-img-top"
                                        alt="Course 1" style="height: 200px; object-fit: cover;">
                                </div>
                            @endif

                            <div class="card-body" style="padding: 20px;">
                                <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                    <img src="{{ asset('storage/' . $course->course_icon) }}" alt="Course Icon"
                                        style="width: 24px; height: 24px; margin-right: 10px;">
                                    <h5 class="card-title" style="margin: 0;">${{ $course->price }} -
                                        {{ substr($course->course_name, 0, 15) }}</h5>
                                </div>

                                @if (strlen($course->course_description) > 20)
                                    <p class="card-text">
                                        {{ substr($course->course_description, 0, 20) }} <span
                                            id="course-description-more-{{ $course->course_id }}"
                                            style="display: none;">{{ substr($course->course_description, 20) }}</span>
                                        <a href="{{ route('course.show', [$course->course_id]) }}"
                                            onclick="showMoreDescription({{ $course->course_id }}); return true;">See
                                            More</a>
                                    </p>
                                @else
                                    <p class="card-text">{{ $course->course_description }}</p>
                                @endif

                                <div class="icon" style="display: flex; align-items: center; margin-top: 10px;">

                                    @if ($course->category_icon)
                                        <img src="{{ asset('storage/' . $course->category_icon) }}" alt="Icon 1"
                                            style="width: 24px; height: 24px; margin-right: 10px;">

                                        <div>
                                            <span><strong>Category Name:</strong>{{ $course->category_name }}</span>
                                            <br>
                                            {{-- @if ($course->subCategory)
                                <small><strong>Sub Category Name:</strong>{{ $course->subcategory->category_name }}</small>
                                @endif --}}
                                        </div>
                                    @endif
                                </div>

                                <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                                    @if(auth()->user()->usertype=='admin')
                                    <button class="btn btn-danger btn-sm" style="flex: 1; margin-right: 5px;">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                    <a class="btn btn-primary btn-sm" style="flex: 1; margin-right: 5px;"
                                        href="{{ route('course.edit', ['id' => $course->course_id]) }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>


                                    <button style="flex: 1; margin-right: 5px";
                                        class="btn toggle-status {{ $course->status == '0' ? 'btn-danger' : 'btn-primary btn-sm' }} btn-block"
                                        data-id="{{ $course->course_id }}" style="flex: 1;">
                                        @if ($course->status == '0')
                                            <i class="fas fa-toggle-off"></i>
                                        @else
                                            <i class="fas fa-toggle-on"></i>
                                        @endif
                                    </button>

                                @endif

                                    <a class="btn btn-success btn-sm" style="flex: 1; margin-right: 5px;"
                                    href="{{ route('course.show', ['id' => $course->course_id]) }}">
                                    <i class="fas fa-info-circle"></i> Details
                                </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
                <!-- Repeat for more cards -->
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4" style="font-family: Arial, sans-serif;">
            {{ $courses->links('vendor.pagination.bootstrap-4') }}
        </div>

    </div> <!-- end container -->
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
                        button.removeClass('btn-primary btn-sm').addClass('btn-danger');
                    } else {
                        button.html('<i class="fas fa-toggle-on"></i> Active');
                        button.removeClass('btn-danger').addClass('btn-primary btn-sm');
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
</script>



<script>
    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            var searchText = $(this).val().toLowerCase();
            $('.course-item').each(function() {
                var itemText = $(this).text().toLowerCase();
                if (itemText.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>



<script>
    $(document).ready(function() {
        $('#course_id').select2();
    });
</script>
