@include('frontend.layouts.header_links')
@include('frontend.layouts.header')

<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('category.create') }}">Categories</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Category</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <!-- Buttons for adding employee and assigning courses -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('category.create') }}"><button class="btn btn-success">Add Category</button></a>
            </div>
            <div class="col-md-6 text-right">
                <a href="#"><button class="btn btn-danger">View Trash</button></a>
            </div>
        </div>



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



        <div class="container content-container">
            <!-- Display the added category -->
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title font-20 mt-0">

                                <div style="position: relative; display: inline-block;"
                                    onmouseover="this.querySelector('.popup').style.display = 'block';"
                                    onmouseout="this.querySelector('.popup').style.display = 'none';">
                                    <img src="{{ asset('storage/' . $category->category_icon) }}" alt="Category Icon"
                                        style="width: 50px; height: 50px; border-radius: 50%;">
                                    <div class="popup"
                                        style="position: absolute; top: -50px; left: 0; display: none; padding: 10px; background-color: white; border: 1px solid #ccc; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
                                        <img src="{{ asset('storage/' . $category->category_icon) }}"
                                            alt="Category Icon" style="max-width: 200px;">
                                    </div>
                                </div>


                                {{ $category->category_name }}

                            </h4>


                        </div>


                        <img class="img-fluid" src="{{ asset('storage/' . $category->category_image) }}"
                            alt="Category Image">
                        <div class="card-body">

                            <p class="card-text">
                                {{ $category->category_description }}
                            </p>


                            <a href="{{ route('category.edit', ['id' => $category->id]) }}"> <button
                                    class="btn btn-primary btn-sm">Edit</button></a>
                            <button class="btn btn-danger btn-sm">Delete</button>
                            @if ($category->category_status == '0')
                                <a href="#" class="mr-2 mb-2">
                                    <button class="btn btn-danger btn-sm btn-custom">Active</button>
                                </a>
                            @else
                                <a href="#" class="mr-2 mb-2">
                                    <button class="btn btn-success btn-sm btn-custom">In Active</button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.layouts.footer_links')
@include('frontend.layouts.footer')
