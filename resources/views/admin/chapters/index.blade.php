@include('frontend.layouts.header_links')
@include('frontend.layouts.header')

<div class="wrapper">
    <div class="container-fluid">
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
                    <h4 class="page-title">Chapters</h4>
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

        {{-- <div class="container mt-4">
            <div class="row">
                @foreach($chapters as $index => $chapter)
                <!-- Chapter Cards -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card chapter-card shadow-sm" style="border: 1px solid #dee2e6; border-radius: 0.25rem;">
                        <img class="card-img-top chapter-img" src="{{ asset('storage/' . $chapter->chapter_image) }}" alt="Chapter Image" style="width: 100%; height: 200px; object-fit: cover; border-bottom: 1px solid #dee2e6;">
                        <div class="card-body chapter-content" style="padding: 1rem;">
                            <h5 class="card-title chapter-title" style="margin-bottom: 0.75rem;">
                                <i>
                                    <img src="{{ asset('storage/'.$chapter->chapter_icon) }}" alt="Chapter Icon" style="width: 24px; height: 24px; margin-right: 10px; border-radius: 50%;">
                                </i>{{ strtoupper($chapter->chapter_name) }}
                            </h5>
                            <p class="card-text chapter-description" style="margin-bottom: 1rem;">{{substr( $chapter->chapter_description,0,35) }}....</p>
                            <div class="chapter-details" style="margin-bottom: 1rem;">
                                <div class="course-info" style="margin-bottom: 0.5rem;">
                                    <span><strong>Course:</strong> {{ $chapter->course_name }}</span>
                                </div>
                                <div class="chapter-info">
                                    <span><strong>Chapter No:</strong> {{ $index + 1 }}</span>
                                    <span style="margin-left: 1rem;">
                                        <strong>Status:</strong>
                                        <button class=" btn btn-sm badge toggle-status {{ $chapter->chapter_status == '0' ? 'btn-danger' : 'btn-success' }} btn-sm "
                                            data-id="{{ $chapter->id }}" >
                                        @if ($chapter->chapter_status == '0')
                                            <i class="fas fa-toggle-off"></i> Inactive
                                        @else
                                            <i class="fas fa-toggle-on"></i> Active
                                        @endif
                                    </button>

                                    </span>
                                </div>
                            </div>
                            <div class="btn-group mt-3">
                                <a href="{{ route('chapter.show',['id'=>$chapter->id,'cid'=>$course->id]) }}" class="btn btn-primary btn-sm" style="margin-right: 0.5rem;"><i class="fas fa-eye"></i> View</a>
                                <a href="{{ route('chapter.edit',['id'=>$chapter->id,'cid'=>$course->id]) }}" class="btn btn-info btn-sm" style="margin-right: 0.5rem;"><i class="fas fa-edit"></i> Edit</a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div> --}}


        <div class="container mt-4">
            {{-- <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search..."> --}}
            <div class="row" id="chapterList">
                @foreach($chapters as $index => $chapter)
                <!-- Chapter Cards -->
                <div class="col-lg-4 col-md-6 mb-4 chapter-item" style="display: inline-block;">
                    <div class="card chapter-card shadow-sm" style="border: 1px solid #dee2e6; border-radius: 0.25rem;">
                        <img class="card-img-top chapter-img" src="{{ asset('storage/' . $chapter->chapter_image) }}" alt="Chapter Image" style="width: 100%; height: 200px; object-fit: cover; border-bottom: 1px solid #dee2e6;">
                        <div class="card-body chapter-content" style="padding: 1rem;">
                            <h5 class="card-title chapter-title" style="margin-bottom: 0.75rem;">
                                <i>
                                    <img src="{{ asset('storage/'.$chapter->chapter_icon) }}" alt="Chapter Icon" style="width: 24px; height: 24px; margin-right: 10px; border-radius: 50%;">
                                </i>{{ strtoupper($chapter->chapter_name) }}
                            </h5>
                            <p class="card-text chapter-description" style="margin-bottom: 1rem;">{{ substr($chapter->chapter_description, 0, 35) }}....</p>
                            <div class="chapter-details" style="margin-bottom: 1rem;">
                                <div class="course-info" style="margin-bottom: 0.5rem;">
                                    <span><strong>Course:</strong> {{ $chapter->course_name }}</span>
                                </div>
                                <div class="chapter-info">
                                    <span><strong>Chapter No:</strong> {{ $index + 1 }}</span>
                                    <span style="margin-left: 1rem;">
                                        <strong>Status:</strong>
                                        <button class=" btn btn-sm badge toggle-status {{ $chapter->chapter_status == '0' ? 'btn-danger' : 'btn-success' }} btn-sm "
                                            data-id="{{ $chapter->id }}" >
                                        @if ($chapter->chapter_status == '0')
                                            <i class="fas fa-toggle-off"></i> Inactive
                                        @else
                                            <i class="fas fa-toggle-on"></i> Active
                                        @endif
                                    </button>

                                    </span>
                                </div>
                            </div>
                            <div class="btn-group mt-3">
                                <a href="{{ route('chapter.show',['id'=>$chapter->id,'cid'=>$course->id]) }}" class="btn btn-primary btn-sm" style="margin-right: 0.5rem;"><i class="fas fa-eye"></i> View</a>
                                <a href="{{ route('chapter.edit',['id'=>$chapter->id,'cid'=>$course->id]) }}" class="btn btn-info btn-sm" style="margin-right: 0.5rem;"><i class="fas fa-edit"></i> Edit</a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>




        <div class="d-flex justify-content-center mt-4" style="font-family: Arial, sans-serif;">
            {{ $chapters->links('vendor.pagination.bootstrap-4') }}
        </div>





    </div>
</div>



@include('frontend.layouts.footer')
@include('frontend.layouts.footer_links')


<script>
    $(document).ready(function(){
        // Function to toggle category status
        function toggleStatus(chapterId, button) {
            $.ajax({
                url: '/chapter/toggle-status/' + chapterId,
                method: 'GET',
                success: function(data) {
                    if(data.status == '0') {
                        button.html('<i class="fas fa-toggle-off"></i> Inactive');
                        button.removeClass('btn-success').addClass('btn-danger');
                    } else {
                        button.html('<i class="fas fa-toggle-on"></i> Active');
                        button.removeClass('btn-danger').addClass('btn-success');
                    }
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }

        // Handle click event on status button
        $('.toggle-status').on('click', function(){
            var chapterId = $(this).data('id');
            var button = $(this);
            toggleStatus(chapterId, button);
        });
    });</script>



<script>
       $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            var searchText = $(this).val().toLowerCase();
            $('.chapter-item').each(function() {
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
