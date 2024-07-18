

@include('frontend.layouts.header_links')
@include('frontend.layouts.header')


<div class="wrapper">
    <div class="container-fluid">


          <!-- Buttons for adding employee and assigning courses -->
          <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('category.index') }}"> <button class="btn btn-success">View Category</button></a>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('category.trash') }}"><button class="btn btn-danger">View Trash</button></a>
            </div>
        </div>

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Category</h4>
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
    <div class="container mt-5">
        <h2 class="mb-4">Add Category</h2>
        <form id="categoryForm"  action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf

            <!-- Name and Parent Category Dropdown in One Row -->
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="category_name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" value="{{ old('category_name') }}" >
                    <span class="error" id="category_nameError"></span>
                    @error('category_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="parent_category" class="form-label">Parent Category (Optional)</label>
                    <select class="form-control" id="parent_category" name="parent_category">
                        <option value="{{ $category==NUll }}">Select a category</option>
                        @foreach($category as $category)
                        @if($category->parent_category_id==NULL)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endif

                        @endforeach

                    </select>
                    @error('parent_category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Category Description in Two Rows -->
            <div class="form-group">
                <label for="category_description" class="form-label">Category Description</label>
                <textarea class="form-control" id="category_description" name="category_description" rows="2">{{ old('category_description') }}</textarea>
                <span class="error" id="category_descriptionError"></span>

                @error('category_description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Category Image and Icon in One Row -->
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="category_image" class="form-label">Category Image</label>
                    <input type="file" class="form-control-file" id="category_image" name="category_image" >
                    <span class="text-danger" id="category_image_error"></span>
                    @error('category_image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="category_icon" class="form-label">Category Icon</label>
                    <input type="file" class="form-control-file" id="category_icon" name="category_icon">
                    <span class="text-danger" id="category_icon_error"></span>
                    @error('category_icon')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-row justify-content-end">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </div>
            </div>

        </form>
    </div>
    </div>
</div>


@include('frontend.layouts.footer_links')
@include('frontend.layouts.footer')

<script src="{{ asset('frontend/assets/js/my js/categoryForm.js') }}"></script>

<script>

$(document).ready(function() {
        $('#parent_category').select2({
            placeholder: 'Select an option',
            allowClear: true
        });

        $('.select2-selection--single').css('height', '38px'); // Adjust the height as needed
        $('.select2-selection__rendered').css({
            'line-height': '38px', // Adjust to match the height
            'padding-top': '0px',
            'padding-bottom': '0px'
        });
        $('.select2-selection__arrow').css('height', '38px'); // Adjust to match the height

    });
</script>
