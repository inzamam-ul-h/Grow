

@include('frontend.layouts.header_links')
@include('frontend.layouts.header')


<div class="wrapper">
    <div class="container-fluid">


          <!-- Buttons for adding employee and assigning courses -->
          <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('course.index') }}"> <button class="btn btn-success">View course</button></a>
            </div>
            <div class="col-md-6 text-right">
                <a href="#"><button class="btn btn-danger">View Trash</button></a>
            </div>
        </div>

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item active">Courses</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Course</h4>
                </div>
            </div>
        </div>


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
    <div class="container mt-5" style="background-color: #b3b4b6; padding: 20px; border-radius: 10px;">
        <h2>Create New Course</h2>
        <form id="courseForm" action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()" >
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="course_name">Course Name</label>
                        <input type="text" class="form-control" id="course_name" name="course_name" value="{{ old('course_name')}}">
                        <span class="error" id="course_nameError"></span>
                     @error('course_name')
                    <span class="text-danger">{{ $message }}</span>
                     @enderror
                    </div>
                    <div class="form-group">
                        <label for="course_description">Course Description</label>
                        <textarea class="form-control" id="course_description" name="course_description" value="" rows="3" >{{ old('course_description')}}</textarea>
                        <span class="error" id="course_descriptionError"></span>
                        @error('course_description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category" >
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                @if ($category->parent_category_id === null)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endif
                            @endforeach
                        </select>
                            <span class="error" id="categoryError"></span><br>
                        @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group" id="sub_category_group" style="display: none;">
                        <label for="subCategory">Sub-category</label>
                        <select class="form-control" id="subcategory" name="subCategory">
                            <option value="">Select Sub-category</option>
                            <!-- Sub-category options will be populated dynamically via jQuery -->
                        </select>
                        @error('subCategory')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="introductory_video">Introductory Video</label>
                        <input type="file" class="form-control-file" id="introductory_video" name="intro_video">
                        @error('intro_video')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="course_image">Course Image</label>
                        <input type="file" class="form-control-file" id="course_image" name="course_image">
                        <span class="error" id="course_imageError"></span>
                        @error('course_image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="course_icon">Course Icon</label>
                        <input type="file" class="form-control-file" id="course_icon" name="course_icon">
                        <span class="error" id="course_iconError"></span>
                        @error('course_icon')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="course_type">Course Type</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="course_type" id="course_type_live" value="live_session">
                            <label class="form-check-label" for="course_type_live">Live Session</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="course_type" id="course_type_video" value="video">
                            <label class="form-check-label" for="course_type_video">Online Video</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="course_type" id="course_type_text" value="text">
                            <label class="form-check-label" for="course_type_text">Text Format</label>
                        </div>
                        <span class="error" id="course_typeError"></span><br>
                        @error('course_type')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="course_price">Course Price</label>
                        <input type="number" class="form-control" id="course_price" name="price" step="0.1" value="{{ old('price') }}" >
                        @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">

                <button type="submit" class="btn btn-primary">Create Course</button>

            </div>
        </form>
    </div>





    </div>
</div>


@include('frontend.layouts.footer_links')
@include('frontend.layouts.footer')

<script src="{{ asset('frontend/assets/js/my js/courseForm.js') }}"></script>





<script>
 $(document).ready(function() {
        $('#category').change(function() {
            var categoryId = $(this).val();
            var subcategorySelect = $('#subcategory');

            // Clear existing options except the default one
            subcategorySelect.find('option:not(:first)').remove();

            // Fetch subcategories via AJAX
            $.ajax({
                url: '/course/fetchSubcategories/' + categoryId,
                type: 'GET',
                success: function(response) {
                    if (response.length > 0) {
                        $.each(response, function(key, value) {
                            subcategorySelect.append('<option value="' + value.id + '">' + value.category_name + '</option>');
                        });
                        $('#sub_category_group').show();
                    } else {
                        $('#sub_category_group').hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching subcategories: ' + error);
                    $('#sub_category_group').hide();
                }
            });
        });
    });
  </script>
