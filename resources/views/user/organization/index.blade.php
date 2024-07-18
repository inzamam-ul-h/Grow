@include('frontend.layouts.header_links')
@include('frontend.layouts.header')



<script src="{{ asset('frontend/assets/newjs/jquery.min.js') }}"></script>



<div class="wrapper">
    <div class="container-fluid">

        <!-- Buttons for adding employee and assigning courses -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('organization.create') }}"> <button class="btn btn-success">Add
                        Organization</button></a>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('organization.trash') }}"><button class="btn btn-danger">View Trash</button></a>
            </div>
        </div>

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item active">Organization</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Organization List</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        {{-- view pop for address here --}}
        <div id="fullAddressModal" class="modal"
            style="display: none; position: fixed; z-index: 1; padding-top: 100px; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);">
            <div class="modal-content"
                style="background-color: #fefefe; margin: auto; padding: 20px; border: 1px solid #888; width: 80%;">
                <span class="full-address"></span>
                <button onclick="closeFullAddressModal()">Close</button>
            </div>
        </div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @elseif  (session('error'))
           <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


        <!-- Recent Employee section  -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-15 header-title">Organization</h4>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" style="width: 100%;" id="organizationTable">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; white-space: nowrap;"><strong>Sr no</strong></th>
                                        <th style="text-align: center; white-space: nowrap;"><strong>Name</strong></th>
                                        <th style="text-align: center; white-space: nowrap;"><strong>Email</strong></th>
                                        <th style="text-align: center; white-space: nowrap;"><strong>Registration
                                                no</strong></th>
                                        <th style="text-align: center; white-space: nowrap;"><strong>Contact</strong>
                                        </th>
                                        <th style="text-align: center; white-space: nowrap;"><strong>Branch</strong>
                                        </th>
                                        <th style="text-align: center; white-space: nowrap;"><strong>Courses</strong>
                                        </th>

                                        <th style="text-align: center; white-space: nowrap;"><strong>Status</strong>
                                        </th>

                                        <th style="text-align: center; white-space: nowrap;"><Strong>Action</Strong>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($organizations as $index=>$organization)
                                        <tr>
                                            <td class="text-center">
                                                {{ $index+1 }}

                                            </td>
                                            <td  class="text-center"><a
                                                    href="{{ route('organization.show', [$organization->organization_id]) }}">{{ $organization->organization_name }}</a>
                                            </td>
                                            <td  class="text-center">{{ $organization->organization_email }}</td>
                                            <td  class="text-center">{{ $organization->register_no }}</td>
                                            <td  class="text-center">{{ $organization->contact }}</td>
                                            <td class="text-center">
                                                <span class="truncated-address"
                                                    style="cursor: pointer; text-decoration: underline;"
                                                    onclick="showFullAddress('{{ $organization->address }}')">
                                                    {{ Str::limit($organization->address, 5) }}
                                                </span>
                                            </td>



                                            <td class="text-center">
                                              <a href="{{ route('orgCourse.index',['id'=>$organization->organization_id]) }}">  <button class="btn btn-sm btn-secondary">
                                                   View <i class="fas fa-eye"></i>
                                                </button></a>
                                            </td>


                                            <td class="text-center">
                                                <button class="btn toggle-status {{ $organization->status == '0' ? 'btn-danger' : 'btn-success' }} btn-sm" data-id="{{ $organization->organization_id }}">
                                                    @if ($organization->status == '0')
                                                        <i class="fas fa-toggle-off"></i>
                                                    @else
                                                        <i class="fas fa-toggle-on"></i>
                                                    @endif
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('organization.edit', [$organization->organization_id]) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="{{ route('organization.destroy',[$organization->organization_id]) }}"
                                                     onclick="return confirm('Are you sure you want to move to trash this Organization?');"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->




        @include('frontend.layouts.footer')
        @include('frontend.layouts.footer_links')




        <script>
            $(document).ready(function() {
                var table = $('#organizationTable').DataTable({
                    processing: true,
                    // serverSide: true,
                    pagination: true,
                });
            });



            function showFullAddress(address) {
                const fullAddressModal = document.getElementById('fullAddressModal');
                const fullAddressSpan = fullAddressModal.querySelector('.full-address');
                fullAddressSpan.innerHTML = address;
                fullAddressModal.style.display = 'block';
            }

            function closeFullAddressModal() {
                const fullAddressModal = document.getElementById('fullAddressModal');
                fullAddressModal.style.display = 'none';
            }
        </script>


<script>
    $(document).ready(function(){
        // Function to toggle organization status
        function toggleStatus(organizationId, button) {
            $.ajax({
                url: '/organization/toggle-status/' + organizationId,
                method: 'GET',
                success: function(data) {
                    if(data.status == '0') {
                        button.html('<i class="fas fa-toggle-off"></i>');
                        button.removeClass('btn-success').addClass('btn-danger');
                    } else {
                        button.html('<i class="fas fa-toggle-on"></i>');
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
            var organizationId = $(this).data('id');
            var button = $(this);
            toggleStatus(organizationId, button);
        });
    });
</script>


