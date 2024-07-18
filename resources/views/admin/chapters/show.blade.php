{{-- @include('frontend.layouts.header_links')
@include('frontend.layouts.header')

<div class="wrapper">
    <div class="container-fluid">
        <!-- Buttons for adding chapter and viewing trash -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('course.index') }}">
                    <button class="btn btn-success">View Courses</button>
                </a>
            </div>
            <div class="col-md-6 text-right">
                <a href="#">
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> View Trash</button>
                </a>
            </div>
        </div>
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('chapter.index',['id'=>$course->id]) }}">Chapters</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Chapter Details</h4>
                </div>
            </div>
        </div>
        <!-- end page title and breadcrumb -->

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

        <div class="container mt-4">
            @include('admin.courseSideBar')
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card shadow-sm" style="border: 1px solid #dee2e6; border-radius: 0.25rem;">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>{{ $chapter->chapter_name }}</h4>
                            <a href="{{ route('chapter.index', ['id' => $course->id]) }}" class="btn btn-secondary">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <img src="{{ asset('storage/'.$chapter->chapter_image) }}" alt="Chapter Image" class="img-fluid" style="width: 100%; height: auto; max-height: 300px; border-radius: 0.25rem;">
                            </div>
                            <h5 class="mb-3">
                                <i>
                                    <img src="{{ asset('storage/'.$chapter->chapter_icon) }}" alt="Chapter Icon" style="width: 24px; height: 24px; margin-right: 10px; border-radius: 50%;">
                                </i>
                                {{ strtoupper($chapter->chapter_name) }}
                            </h5>
                            <p>{{ $chapter->chapter_description }}</p>
                            <hr>
                            <div>
                                <p><strong>Course:</strong> {{ $course->course_name }}</p>
                                <p><strong>Status:</strong>
                                    <span class="badge badge-success">Active</span>
                                </p>
                            </div>
                            <hr>
                            <div class="btn-group d-flex justify-content-center mt-3">
                                <a href="#" class="btn btn-info btn-sm" style="margin-right: 0.5rem;"><i class="fas fa-plus"></i> Add Topic</a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>











@include('frontend.layouts.footer')
@include('frontend.layouts.footer_links')










 --}}


 @include('frontend.layouts.header_links')
 @include('frontend.layouts.header')

 <div class="wrapper">
     <div class="container-fluid">
        @if(auth()->user()->usertype=='admin')
         <!-- Buttons for adding chapter and viewing trash -->
         <div class="row mb-3">
             <div class="col-md-6">
                <a href="{{ route('chapter.create',['id'=>$course->id]) }}">
                    <button class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Chapter</button>
                </a>
             </div>
             <div class="col-md-6 text-right">
                 <a href="#">
                     <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> View Trash</button>
                 </a>
             </div>
         </div>
         @endif
         <!-- Page-Title -->
         <div class="row">
             <div class="col-sm-12">
                 <div class="page-title-box">
                     <div class="btn-group pull-right">
                         <ol class="breadcrumb hide-phone p-0 m-0">
                             <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                             @if(auth()->user()->usertype=='admin')
                             <li class="breadcrumb-item"><a href="{{ route('chapter.index',['id'=>$chapter->course_id]) }}">Chapters</a></li>
                         @endif
                            </ol>
                     </div>
                     <h4 class="page-title">Chapter Details</h4>
                 </div>
             </div>
         </div>
         <!-- end page title and breadcrumb -->

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

         <div class="container mt-4">
             <div class="row mt-5">
                 <!-- Sidebar for Chapters -->
                 @include('admin.courseSideBar')

                 <!-- Main Content for Chapter Details -->
                 <div class="col-md-9">
                    <div class="card" style="border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                        <div class="card-header text-white text-center py-3" style="background: linear-gradient(135deg, #007bff, #0056b3); border-radius: 10px 10px 0 0;">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="text-center">
                                    <h4><p >
                                        <strong>
                                            <i>
                                                <img src="{{ asset('storage/'.$course->course_icon) }}" alt="Course Icon" style="width: 24px; height: 24px; margin-right: 10px; border-radius: 50%;">
                                            </i>{{ strtoupper($course->course_name) }}
                                        </strong>
                                    </p>
                                </h4>
                                    <h5>
                                        <i>
                                            <img src="{{ asset('storage/'.$chapter->chapter_icon) }}" alt="Chapter Icon" style="width: 24px; height: 24px; margin-right: 10px; border-radius: 50%;">
                                        </i>
                                        {{ strtoupper($chapter->chapter_name) }}
                                    </h5>
                                </div>
                                @if(auth()->user()->usertype=='admin')
                                <a href="{{ route('topic.create',['id'=>$chapter->id]) }}" class="btn btn-info btn-sm" style="margin-right: 0.5rem;"><i class="fas fa-plus"></i> Add Topic</a>
                            @endif
                            </div>
                            @if(auth()->user()->usertype=='admin')
                            <button class="btn toggle-status {{ $chapter->chapter_status == '0' ? 'btn-danger' : 'btn-secondary btn-sm' }}" data-id="{{ $chapter->id }}">
                                @if ($chapter->chapter_status == '0')
                                    <i class="fas fa-toggle-off"></i> Inactive
                                @else
                                    <i class="fas fa-toggle-on"></i> Active
                                @endif
                            </button>
                            @endif
                        </div>

                        <div class="card-body">
                            <div class="text-center mb-4">
                                <img src="{{ asset('storage/'.$chapter->chapter_image) }}" alt="Chapter Image" class="img-fluid" style="max-width: 100%; height: auto; max-height: 300px; border-radius: 10px;">
                            </div>
                            <p>{{ $chapter->chapter_description }}</p>
                            <hr>

                        </div>
                        @if(auth()->user()->usertype=='admin')
                        <!-- Footer Buttons -->
                        <div class="card-footer d-flex justify-content-center" style="border-top: none;">
                            <button class="btn btn-danger btn-sm mx-2" style="width: 100px;">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                            <a class="btn btn-primary btn-sm mx-2" style="width: 100px;" href="{{ route('chapter.edit', ['id' => $chapter->id,'cid'=>$chapter->course_id]) }}">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

             </div>
         </div>
     </div>
 </div>

 @include('frontend.layouts.footer')
 @include('frontend.layouts.footer_links')

<script>
    $(document).ready(function() {
        // Function to toggle chapter status
        function toggleStatus(chapterId, button) {
            $.ajax({
                url: '/chapter/toggle-status/' + chapterId,
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
            var chapterId = $(this).data('id');
            var button = $(this);
            toggleStatus(chapterId, button);
        });
    });
</script>
