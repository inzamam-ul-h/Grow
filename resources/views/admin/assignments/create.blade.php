@include('frontend.layouts.header_links')
@include('frontend.layouts.header')




<style>
    .error {
        color: red;
        font-size: 0.875em;
    }
    .success {
        color: green;
        font-size: 0.875em;
    }
    .is-invalid {
        border-color: red;
    }
    .is-valid {
        border-color: green;
    }
</style>



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
                    <h4 class="page-title">Add assignment</h4>
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
                                    <h4>Create Assignment</h4>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('topic.show', ['id' => $topic->id, 'chid' => $topic->chapter_id]) }}" class="btn btn-secondary">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="assingment_form" action="{{ route('assignment.store',['topic_id'=>$topic->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="assignment_title" style="font-weight: bold; color: #333;" >Assignment Title</label>
                                    <input type="text" class="form-control" id="assignment_title" name="assignment_title" value="{{ old('title') }}" >
                                    <span class="error" id="assignment_titleError"></span>
                                    @error('assignment_title')
                                   <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="assignment_description" style="font-weight: bold; color: #333;">Assignment Description</label>
                                    <textarea class="form-control" id="assignment_description" name="assignment_description" rows="3">{{ old('assignment_description')}}</textarea>
                                    <span class="error" id="assignment_descriptionError"></span>
                                    @error('assignment_description')
                                   <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="assignment_file" style="font-weight: bold; color: #333;">Assignment File</label>
                                        <input type="file" class="form-control-file" id="assignment_file" name="assignment_file" value="{{ old('assignment_file')}}">
                                        <small class="form-text text-muted">Accepted file types: PDF, DOC, DOCX, PPT, PPTX, ZIP, RAR</small>
                                        <span class="error" id="assignment_fileError"></span>
                                        @error('assignment_file')
                                       <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary" style="background-color: #152d7c; border-color: #3b28a7;">Create assignment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>








</div></div>


@include('frontend.layouts.footer_links')
<script src="{{ asset('frontend/assets/js/my js/asssingment.js') }}"></script>
@include('frontend.layouts.footer')
