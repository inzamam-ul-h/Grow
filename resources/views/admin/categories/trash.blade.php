@include('frontend.layouts.header_links')
@include('frontend.layouts.header')

<div class="wrapper">
    <div class="container-fluid">
        <!-- Buttons for adding employee and assigning courses -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('category.create') }}"> <button class="btn btn-success">Add Category</button></a>
            </div>
            <div class="col-md-6 text-right">
                <a href="#"><button class="btn btn-primary">View Category</button></a>
            </div>
        </div>
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('category.trash') }}">TrashCategories</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Category</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->


        <div class="container">
            <h1 class="mb-4">Trash Categories</h1>

            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4 mb-4">
                        <div class="card">


                            <img class="img-fluid" src="{{ asset('storage/' . $category->category_image) }}"
                                class="card-img-top" alt="Category Image">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-utensils icon"></i>
                                    <div style="position: relative; display: inline-block;"
                                        onmouseover="this.querySelector('.popup').style.display = 'block';"
                                        onmouseout="this.querySelector('.popup').style.display = 'none';">
                                        <img src="{{ asset('storage/' . $category->category_icon) }}"
                                            alt="Category Icon" style="width: 50px; height: 50px; border-radius: 50%;">
                                        <div class="popup"
                                            style="position: absolute; top: -50px; left: 0; display: none; padding: 10px; background-color: white; border: 1px solid #ccc; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
                                            <img src="{{ asset('storage/' . $category->category_icon) }}"
                                                alt="Category Icon" style="max-width: 200px;">
                                        </div>
                                    </div>
                                    {{ $category->category_name }}


                                </h5>
                                @if($category->parent_category_id==!NULL)
                                <div> <strong>Parent Category:</strong>
                                    {{ $category->parent_category_name }}</div>
                                @endif


                                @if (strlen($category->category_description) > 20)
                                    <p class="card-text">
                                        {{ substr($category->category_description, 0, 20) }} <span
                                            id="category-description-more-{{ $category->id }}"
                                            style="display: none;">{{ substr($category->category_description, 20) }}</span>
                                        <a href="#"
                                            onclick="showMoreDescription({{ $category->id }}); return false;">See
                                            More</a>
                                    </p>
                                @else

                                    <p class="card-text">{{ $category->category_description }}</p>
                                @endif

                                <div class="action-buttons d-flex flex-wrap">
                                    <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="mr-2 mb-2">
                                        <button class="btn btn-primary btn-sm btn-custom">Restore</button>
                                    </a>
                                    <button class="btn btn-danger btn-sm btn-custom mr-2 mb-2">Delete</button>
                                </div>


                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        </div>





    </div> <!-- end container -->
</div>

@include('frontend.layouts.footer')
@include('frontend.layouts.footer_links')



<script>
    function showMoreDescription(categoryId) {
        document.getElementById('category-description-more-' + categoryId).style.display = 'inline';
        // Optionally, you can hide the "See More" link after it's clicked
        // document.getElementById('see-more-link-' + categoryId).style.display = 'none';
    }
</script>
