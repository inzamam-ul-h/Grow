@include('frontend.layouts.header_links')
@include('frontend.layouts.header')






{{-- modal for assignment submission --}}


<!-- The Modal -->
<div class="modal fade" id="assignmentModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Assignment Activity</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <p>Write a short note about University of Ibadan Distance Learning Centre.</p>
                <h5>File submissions</h5>
                <form action="{{ route('assignment.submit', ['assignment_id' => $assignment->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                    <div class="file-upload" id="file-upload" style="border: 2px dashed #ccc; padding: 30px; text-align: center; position: relative;">
                        <div class="d-flex justify-content-center mb-2"></div>
                        <div class="mt-3">
                            <p>You can drag and drop files here or click to open file dialog.</p>
                            <i class="fas fa-arrow-down"></i>
                            <input type="file" id="file-input" name="file"
                                style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; opacity: 0; cursor: pointer;">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-save" style="background-color: #6c757d; color: white; border: none;">Save changes</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>



{{-- modal end here --}}




<script src="{{ asset('frontend/assets/newjs/jquery.min.js') }}"></script>

<div class="wrapper">
    <div class="container-fluid">
        @if (auth()->user()->usertype == 'admin')
            <!-- Buttons for adding courses and viewing trash -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <a href="{{ route('topic.create', ['id' => $chapter->id]) }}">
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
                            @if (auth()->user()->usertype == 'admin')
                                <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Courses</a></li>
                            @endif
                        </ol>
                    </div>
                    <h4 class="page-title">Assignment Details</h4>
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
                            <div>
                                <h3 style="margin: 0;"> <img src="{{ asset('storage/' . $topic->topic_icon) }}"
                                        alt="topic Icon"
                                        style="width: 35px; height: 35px; margin-right: 7px; border-radius: 50%;">
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
                        @if (auth()->user()->usertype == 'admin')
                            <a href="{{ route('assignment.create', ['topic_id' => $topic->id]) }}"
                                class="btn btn-primary btn-sm ml-3"
                                style="background-color: #05284e; border-color: #0a1b2e; color: #fff;">
                                <i class="fas fa-plus-circle"></i> Add assignment
                            </a>
                        @endif
                    </div>

                    <div class="card-body">
                        <!-- Assignment Details -->
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Assignment Details:</h4>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $assignment->title }}</h5>
                                        <p class="card-text">{{ $assignment->description }}</p>


                                        <!-- Display assignment file if available -->
                                        @if ($assignment->file)
                                            <p class="card-text"><strong>assignment File:</strong> <a
                                                    href="{{ asset('storage/' . $assignment->file) }}"
                                                    target="_blank">{{ $assignment->file }}</a></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Buttons -->
                    @if (auth()->user()->usertype == 'admin'||auth()->user()->usertype == 'organization')
                        <div class="card-footer d-flex justify-content-center" style="border-top: none;">
                            <a href="{{ route('assignment.view',['assignment_id'=>$assignment->id]) }}"><button class="btn btn-sm mx-2"
                                style="width: 200px; background-color: #070e16; border-color: #5e6a77; color: #fff;">
                                <i class="fas fa-eye"></i> View Submissions
                            </button></a>
                            @if (auth()->user()->usertype == 'admin')
                            <a class="btn btn-primary btn-sm mx-2" style="width: 100px;"
                                href="{{ route('assignment.edit', ['assignment_id' => $assignment->id, 'topic_id' => $assignment->topic_id]) }}">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            @endif

                        </div>
                        @elseif (auth()->user()->usertype == 'employee')
                        <div class="card-footer d-flex justify-content-center" style="border-top: none;">

                            <button type="button" class="btn btn-sm mx-2 "
                                style="width: 200px; background-color: #070e16; border-color: #5e6a77; color: #fff;"
                                data-toggle="modal" data-target="#assignmentModal">
                                Submit Assignment
                            </button>
                    @endif
                    <!-- Button to Open the Modal -->
                </div>

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
