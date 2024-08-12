@include('frontend.layouts.header_links')
@include('frontend.layouts.header')

<script src="{{ asset('frontend/assets/newjs/jquery.min.js') }}"></script>



<div class="wrapper">
    <div class="container-fluid">
        <!-- Buttons for adding employee and assigning courses -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('category.create') }}"> <button class="btn btn-success">Add Category</button></a>
            </div>
            {{-- <div class="col-md-6 text-right">
                <a href="{{ route('category.trash') }}"><button class="btn btn-danger">View Trash</button></a>
            </div> --}}
        </div>
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Category</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

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



        <div class="container">
            <h1 class="mb-4">All Categories</h1>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4 mb-4  category-item">
                        <div class="card">
                            <img class="img-fluid" src="{{ asset('storage/' . $category->category_image) }}"
                                 class="card-img-top" alt="Category Image"
                                 style="height: 200px; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title" style="display: flex; align-items: center;">

                                    <div style="position: relative; display: inline-block; margin-left: 10px;"
                                         onmouseover="this.querySelector('.popup').style.display = 'block';"
                                         onmouseout="this.querySelector('.popup').style.display = 'none';">
                                        <img src="{{ asset('storage/' . $category->category_icon) }}"
                                             alt="Category Icon"
                                             style="width: 50px; height: 50px; border-radius: 50%;">
                                        <div class="popup"
                                             style="position: absolute; top: -50px; left: 0; display: none; padding: 10px; background-color: white; border: 1px solid #ccc; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
                                            <img src="{{ asset('storage/' . $category->category_icon) }}"
                                                 alt="Category Icon" style="max-width: 200px;">
                                        </div>
                                    </div>
                                    {{ $category->category_name }}
                                </h5>
                                @if ($category->parent_category_id != null)
                                    <div>
                                        <strong>Parent Category:</strong>
                                        {{ $category->parent_category_name }}
                                    </div>
                                @endif

                                @if (strlen($category->category_description) > 20)
                                    <p class="card-text">
                                        {{ substr($category->category_description, 0, 20) }} <span
                                            id="category-description-more-{{ $category->id }}"
                                            style="display: none;">{{ substr($category->category_description, 20) }}</span>
                                        <a href="{{ route('category.show',[$category->id] )}}"
                                           onclick="showMoreDescription({{ $category->id }}); return true;">See More</a>
                                    </p>
                                @else
                                    <p class="card-text">{{ $category->category_description }}</p>
                                @endif
                                <div class="action-buttons d-flex justify-content-between" style="margin-top: 20px;">
                                    <a href="{{ route('category.edit', ['id' => $category->id]) }}" style="flex: 1;">
                                        <button class="btn btn-primary btn-sm btn-block">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                    </a>
                                    {{-- <a href="{{ route('category.moveToTrash', ['id' => $category->id]) }}" style="flex: 1; margin-left: 5px;">
                                        <button class="btn btn-danger btn-sm btn-block">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </a> --}}
                                    <button class="btn toggle-status {{ $category->category_status == '0' ? 'btn-danger' : 'btn-success' }} btn-sm btn-block"
                                            data-id="{{ $category->id }}" style="flex: 1; margin-left: 5px;">
                                        @if ($category->category_status == '0')
                                            <i class="fas fa-toggle-off"></i> Inactive
                                        @else
                                            <i class="fas fa-toggle-on"></i> Active
                                        @endif
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="d-flex justify-content-center mt-4" style="font-family: Arial, sans-serif;">
            {{ $categories->links('vendor.pagination.bootstrap-4') }}

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


<script>
    $(document).ready(function(){
        // Function to toggle category status
        function toggleStatus(categoryId, button) {
            $.ajax({
                url: '/category/toggle-status/' + categoryId,
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
            var categoryId = $(this).data('id');
            var button = $(this);
            toggleStatus(categoryId, button);
        });
    });
</script>




<script>
    $(document).ready(function() {
     $('#searchInput').on('keyup', function() {
         var searchText = $(this).val().toLowerCase();
         $('.category-item').each(function() {
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
