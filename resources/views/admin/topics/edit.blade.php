
@include('frontend.layouts.header_links')
@include('frontend.layouts.header')


<div class="wrapper">
    <div class="container-fluid">
        <!-- Buttons for adding chapter and viewing trash -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('chapter.index',['id'=>$course->id]) }}">
                    <button class="btn btn-success">View Chapters</button>
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
                            <li class="breadcrumb-item"><a href="{{ route('topic.show',['id' => $topic->id,'chid'=>$topic->chapter_id]) }}">Topics</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Topics</h4>
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
                                    <h4>Edit Topic</h4>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('topic.show',['id' => $topic->id,'chid'=>$topic->chapter_id]) }}" class="btn btn-secondary">Back</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('topic.update', ['id' => $topic->id,'chid'=>$topic->chapter_id]) }}" method="POST" enctype="multipart/form-data" id="topicForm">
                                @method('PUT')
                                @csrf
                                {{-- <input type="hidden" name="chapter_id" value="{{ $chapter->id }}"> --}}
                                <!-- Chapter Name Row -->
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="topic_name">Topic Name</label>
                                            <input type="text" class="form-control" id="topic_name" name="topic_name" placeholder="Enter topic name" value="{{ $topic->topic_name }}" >
                                            <span class="error" id="topic_nameError"></span>

                                            @error('topic_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Chapter Description Row -->
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="topic_description">Topic Description</label>
                                            <textarea class="form-control" id="topic_description" name="topic_description" rows="3" placeholder="Enter topic description" >{{ $topic->topic_description }}</textarea>

                                            <span class="error" id="topic_descriptionError"></span>

                                            @error('topic_description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Chapter Icon and Image Row -->
                                <div class="row">
                                    <!-- Chapter Icon Column -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="topic_icon">Topic Icon (Image)</label>
                                            <input type="file" class="form-control-file" id="topic_icon" name="topic_icon" accept="image/*" >
                                            <small class="form-text text-muted">Upload an image for the Topic icon.</small>



                                            <span class="error" id="topic_iconError"></span>

                                            @error('topic_icon')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            @if (isset($topic) && $topic->topic_icon)
                                            <div>
                                                <img src="{{ asset('storage/' . $topic->topic_icon) }}" alt="Current Icon"
                                                    style="max-width: 200px; margin-bottom: 10px;">
                                                <p>Current Icon</p>
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                    <!-- Topic Image Column -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="topic_image">Topic Image</label>
                                            <input type="file" class="form-control-file" id="topic_image" name="topic_image" accept="image/*" >
                                            <small class="form-text text-muted">Upload an image for the Topic.</small>
                                            <span class="error" id="topic_imageError"></span>

                                            @error('topic_image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            @if (isset($topic) && $topic->topic_image)
                                            <div>
                                                <img src="{{ asset('storage/' . $topic->topic_image) }}" alt="Current image"
                                                    style="max-width: 200px; margin-bottom: 10px;">
                                                <p>Current image</p>
                                            </div>
                                        @endif

                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button Row -->
                                <div class="row">
                                    <div class="col">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
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



<script src=" {{ asset('frontend/assets/js/my js/topic.js') }}"></script>
