
@include('frontend.layouts.header_links')
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
                    <h4 class="page-title">Edit Chapters</h4>
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

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h4>Edit Chapter</h4>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('course.index',['id'=>$course->id]) }}" class="btn btn-secondary">Back</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('chapter.update', ['id' => $chapter->id, 'cid' => $course->id]) }}" method="POST" enctype="multipart/form-data" id="chapterForm">
                                @csrf
                                @method('PUT')

                                <!-- Chapter Name Row -->
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="chapter_name">Chapter Name</label>
                                            <input type="text" class="form-control" id="chapter_name" name="chapter_name" placeholder="Enter chapter name" value="{{ old('chapter_name', $chapter->chapter_name) }}">
                                            <span class="error" id="chapter_nameError"></span>
                                            @error('chapter_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Chapter Description Row -->
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="chapter_description">Chapter Description</label>
                                            <textarea class="form-control" id="chapter_description" name="chapter_description" rows="3" placeholder="Enter chapter description">{{ old('chapter_description', $chapter->chapter_description) }}</textarea>
                                            <span class="error" id="chapter_descriptionError"></span>
                                            @error('chapter_description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Chapter Icon and Image Row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="chapter_icon">Chapter Icon (Image)</label>
                                            <input type="file" class="form-control-file" id="chapter_icon" name="chapter_icon" accept="image/*">
                                            <small class="form-text text-muted">Upload an image for the chapter icon.</small>
                                            <span class="error" id="chapter_iconError"></span>
                                            @error('chapter_icon')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="chapter_image">Chapter Image</label>
                                            <input type="file" class="form-control-file" id="chapter_image" name="chapter_image" accept="image/*">
                                            <small class="form-text text-muted">Upload an image for the chapter.</small>
                                            <span class="error" id="chapter_imageError"></span>
                                            @error('chapter_image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button Row -->
                                <div class="row">
                                    <div class="col">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>






</div>
</div>


@include('frontend.layouts.footer')
@include('frontend.layouts.footer_links')
<script src=" {{ asset('frontend/assets/js/my js/chapter.js') }}"></script>
