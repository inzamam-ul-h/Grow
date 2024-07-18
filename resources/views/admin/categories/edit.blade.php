@include('frontend.layouts.header_links')
@include('frontend.layouts.header')


<div class="wrapper">
    <div class="container-fluid">


        <!-- Buttons for adding employee and assigning courses -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('category.create') }}"> <button class="btn btn-success">View Category</button></a>
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
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Update Category</h4>
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
            <h2 class="mb-4">Update Category</h2>
            <form id="categoryForm" action="{{ route('category.update', [$category->id]) }}" method="POST"
                enctype="multipart/form-data">
                <!-- Category Fields -->
                @csrf
                @method('PUT')




                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name"  value="{{ $category->category_name }}">
                        <span class="error" id="category_nameError"></span>
                        @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="parent_category" class="form-label">Parent Category (Optional)</label>
                        <select class="form-control" id="parent_category" name="parent_category">
                            <option value="{{ $category==NUll }}">Select a category</option>
                            @foreach($allCategory as $category)

                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>


                            @endforeach

                        </select>
                        @error('parent_category')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label for="category_description" class="form-label">Category Description</label>
                    <textarea class="form-control" id="category_description" name="category_description" rows="2">{{ $category->category_description }}</textarea>
                    <span class="error" id="category_descriptionError"></span>
                    @error('category_description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <label for="category_image" class="form-label">Category Image</label>
                        @if (isset($category) && $category->category_image)
                            <div>
                                <img src="{{ asset('storage/' . $category->category_image) }}" alt="Current Image"
                                    style="max-width: 200px; margin-bottom: 10px;">
                                <p>Current Image</p>
                            </div>
                        @endif
                        <input type="file" class="form-control-file" id="category_image" name="category_image"
                            accept="image/*">
                            <span class="text-danger" id="category_image_error"></span>
                        @error('category_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="category_icon" class="form-label">Category Icon</label>
                        @if (isset($category) && $category->category_icon)
                            <div>
                                <img src="{{ asset('storage/' . $category->category_icon) }}" alt="Current Icon"
                                    style="max-width: 200px; margin-bottom: 10px;">
                                <p>Current Icon</p>
                            </div>
                        @endif
                        <input type="file" class="form-control-file" id="category_icon" name="category_icon"
                            accept="image/*">
                            <span class="text-danger" id="category_icon_error"></span>
                        @error('category_icon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                </div>

                <!-- Submit Button -->
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
