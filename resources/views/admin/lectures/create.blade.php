@include('frontend.layouts.header_links')
@include('frontend.layouts.header')





@include('frontend.layouts.header_links')
@include('frontend.layouts.header')


<div class="wrapper">
    <div class="container-fluid">
        <!-- Buttons for adding chapter and viewing trash -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('topic.show',['id'=>$topic->id,'chid'=>$topic->chapter_id]) }}">
                    <button class="btn btn-success">View Topics</button>
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
                            <li class="breadcrumb-item"><a href="{{ route('topic.show',['id'=>$topic->id,'chid'=>$topic->chapter_id]) }}">Topics</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Lecture</h4>
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

            <!-- Form -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="background-color: #caccce; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                        <div class="card-header" style="background-color:  #152d7c; color: #fff; border-radius: 10px 10px 0 0; padding: 15px;">
                            <div class="row">
                                <div class="col">
                                    <h4>Create Lecture</h4>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('topic.show', ['id' => $topic->id, 'chid' => $topic->chapter_id]) }}" class="btn btn-secondary">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('lecture.store',['id'=>$topic->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="lecture_name" style="font-weight: bold; color: #333;" >Lecture Name</label>
                                    <input type="text" class="form-control" id="lecture_name" name="lecture_name" value="{{ old('lecture_name') }}" >
                                    <span class="error" id="lecture_nameError"></span>
                                    @error('lecture_name')
                                   <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="lecture_description" style="font-weight: bold; color: #333;">Lecture Description</label>
                                    <textarea class="form-control" id="lecture_description" name="lecture_description" rows="3">{{ old('lecture_description')}}</textarea>
                                    <span class="error" id="lecture_descriptionError"></span>
                                    @error('lecture_description')
                                   <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="lecture_file" style="font-weight: bold; color: #333;">Lecture File</label>
                                        <input type="file" class="form-control-file" id="lecture_file" name="lecture_file" value="{{ old('lecture_file')}}">
                                        <span class="error" id="lecture_fileError"></span>
                                        @error('lecture_file')
                                       <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lecture_video" style="font-weight: bold; color: #333;">Lecture Video</label>
                                        <input type="file" class="form-control-file" id="lecture_video" name="lecture_video">
                                        <span class="error" id="lecture_videoError"></span>
                                        @error('lecture_video')
                                       <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary" style="background-color: #152d7c; border-color: #3b28a7;">Create Lecture</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>








</div></div>


@include('frontend.layouts.footer_links')
@include('frontend.layouts.footer')
