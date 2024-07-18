




@include('frontend.layouts.header_links')
@include('frontend.layouts.header')

<script src="{{ asset('frontend/assets/newjs/jquery.min.js') }}"></script>

<div class="wrapper">
    <div class="container-fluid">
        @if(auth()->user()->usertype=='admin')
        <!-- Buttons for adding courses and viewing trash -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('topic.create',['id'=>$chapter->id]) }}">
                    <button class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Topic</button>
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
                            @if(auth()->user()->usertype=='admin')
                            <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Courses</a></li>
                            @endif
                        </ol>
                    </div>
                    <h4 class="page-title">Lecture Details</h4>
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
                    <div class="card-header text-white text-center py-3" style="background: linear-gradient(135deg, #007bff, #0056b3); border-radius: 10px 10px 0 0;">
                        <div class="d-flex align-items-center justify-content-center">
                            <div>
                                <h3 style="margin: 0;">
                                    <img src="{{ asset('storage/'.$topic->topic_icon) }}" alt="topic Icon" style="width: 35px; height: 35px; margin-right: 7px; border-radius: 50%;">
                                    {{ strtoupper($topic->topic_name) }}
                                </h3>
                            </div>
                        </div>
                        {{-- <button class="btn toggle-status {{ $topic->topic_status == '0' ? 'btn-danger btn-sm' : 'btn-secondary btn-sm' }}" data-id="{{ $topic->id }}">
                            @if ($topic->topic_status == '0')
                                <i class="fas fa-toggle-off"></i> Inactive
                            @else
                                <i class="fas fa-toggle-on"></i> Active
                            @endif
                        </button> --}}
                        @if(auth()->user()->usertype=='admin')
                        <a href="{{ route('lecture.create',['id'=>$topic->id]) }}" class="btn btn-primary btn-sm ml-3" style="background-color: #05284e; border-color: #0a1b2e; color: #fff;">
                            <i class="fas fa-plus-circle"></i> Add Lecture
                        </a>
                        @endif
                    </div>

                    <div class="card-body">
                        <!-- Lecture Details -->
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Lecture Details:</h4>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $lecture->lecture_name }}</h5>
                                        <p class="card-text">{{ $lecture->lecture_description }}</p>
                                        <p class="card-text"><strong>Video:</strong> <a href="{{ asset('storage/' . $lecture->lecture_video) }}" target="_blank">{{ $lecture->lecture_video }}</a></p>

                                        <!-- Display lecture file if available -->
                                        @if ($lecture->lecture_file)
                                            <p class="card-text"><strong>Lecture File:</strong> <a href="{{ asset('storage/' . $lecture->lecture_file) }}" target="_blank">{{ $lecture->lecture_file }}</a></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Buttons -->
                    @if(auth()->user()->usertype=='admin')
                    <div class="card-footer d-flex justify-content-center" style="border-top: none;">
                        <button class="btn btn-danger btn-sm mx-2" style="width: 100px;">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                        <a class="btn btn-primary btn-sm mx-2" style="width: 100px;" href="{{ route('lecture.edit', ['id' => $lecture->id,'tid'=>$lecture->topic_id]) }}">
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
    function toggleStatus(topicId, button) {
        $.ajax({
            url: '/topic/toggle-status/' + topicId,
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
        var topicId = $(this).data('id');
        var button = $(this);
        toggleStatus(topicId, button);
    });
});

</script>


