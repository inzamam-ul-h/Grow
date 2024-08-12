@include('frontend.layouts.header_links')
@include('frontend.layouts.header')


<script src="{{ asset('frontend/assets/newjs/jquery.min.js') }}"></script>

<div class="wrapper">
    <div class="container-fluid">

        <!-- Buttons for adding employee and assigning courses -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('user.create') }}"> <button class="btn btn-success">Add Employee</button></a>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('user.trash') }}"><button class="btn btn-danger">View Trash</button></a>
            </div>
        </div>

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Employee List</h4>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        {{-- view popup of address --}}
        <div id="fullAddressModal" class="modal"
            style="display: none; position: fixed; z-index: 1; padding-top: 100px; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);">
            <div class="modal-content"
                style="background-color: #fefefe; margin: auto; padding: 20px; border: 1px solid #888; width: 80%;">
                <span class="full-address"></span>
                <button onclick="closeFullAddressModal()">Close</button>
            </div>
        </div>




        <!-- Recent Employee section  -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-15 header-title">Employee</h4>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" style="width: 100%;" id="EmployeeTable">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; white-space: nowrap;"><strong>Sr No</strong>
                                        </th>
                                        <th style="text-align: center; white-space: nowrap;"><strong>Name</strong>
                                        </th>
                                        <th style="text-align: center; white-space: nowrap;"><strong>Email</strong>
                                        </th>
                                        <th style="text-align: center; white-space: nowrap;">
                                            <strong>Branch</strong>
                                        </th>
                                        <th style="text-align: center; white-space: nowrap;"><strong>Post</strong>
                                        </th>
                                        {{-- <th style="text-align: center; white-space: nowrap;">
                                            <strong>Experience</strong>
                                        </th> --}}

                                        <th style="text-align: center; white-space: nowrap;">
                                            <strong>Qualification</strong>
                                        </th>
                                        <th style="text-align: center; white-space: nowrap;"><strong>Organization
                                            </strong></th>
                                        <th style="text-align: center; white-space: nowrap;"><strong>Courses</strong>
                                        </th>
                                        <th style="text-align: center; white-space: nowrap;"><strong>Status</strong>
                                        </th>
                                        <th style="text-align: center; white-space: nowrap;"><strong>Action</strong>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $index => $employee)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="text-center"><a style="color: black"
                                                    href="{{ route('user.show', [$employee->employee_id]) }}">{{ $employee->employee_name }}
                                            </td></a>
                                            <td class="text-center">{{ $employee->employee_email }}</td>
                                            <td class="text-center">
                                                <span class="truncated-address"
                                                    style="cursor: pointer; text-decoration: underline;"
                                                    onclick="showFullAddress('{{ $employee->address }}')">
                                                    {{ Str::limit($employee->address, 5) }}
                                                </span>
                                            </td>
                                            <td class="text-center">{{ $employee->post ?? 'N/A' }}</td>
                                            {{-- <td class="text-center">{{ $employee->experence ?? 'N/A' }}</td> --}}

                                            <td class="text-center">{{ $employee->qualification ?? 'N/A' }}</td>
                                            <td class="text-center">{{ $employee->organization_name ?? 'N/A' }}</td>

                                            <td class="text-center">
                                                <a
                                                    href="{{ route('empCourse.index', ['id' => $employee->employee_id]) }}">
                                                    <button class="btn btn-sm btn-secondary">
                                                        View <i class="fas fa-eye"></i>
                                                    </button></a>
                                            </td>

                                            <td class="text-center">
                                                <button
                                                    class="btn toggle-status {{ $employee->employee_status == '0' ? 'btn-danger' : 'btn-success' }} btn-sm btn-custom mr-2 mb-2"
                                                    data-id="{{ $employee->employee_id }}">
                                                    <i
                                                        class="fas {{ $employee->employee_status == '0' ? 'fa-times-circle' : 'fa-check-circle' }}"></i>
                                                </button>
                                            </td>


                                            <td class="text-center">
                                                <a href="{{ route('user.edit', [$employee->employee_id]) }}"
                                                    class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                </a>
                                                {{-- <a href="{{ route('user.destroy', [$employee->employee_id]) }}"
                                                class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a> --}}

                                                <a href="{{ route('user.destroy', $employee->employee_id) }}"
                                                    onclick="return confirm('Are you sure you want to move to trash this employee?');"
                                                    class="btn btn-danger">
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





        @include('frontend.layouts.footer')
        @include('frontend.layouts.footer_links')




        <script>
            $(document).ready(function() {
                var table = $('#EmployeeTable').DataTable({
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
            $(document).ready(function() {
                // Function to toggle user status
                function toggleStatus(userId, button) {
                    $.ajax({
                        url: '/user/toggle-status/' + userId,
                        method: 'GET',
                        success: function(data) {
                            if (data.status == '0') {
                                button.html('<i class="fas fa-toggle-off"></i>');
                                button.removeClass('btn-success').addClass('btn-danger');
                            } else {
                                button.html('<i class="fas fa-toggle-on"></i> ');
                                button.removeClass('btn-danger').addClass('btn-success');
                            }
                        },
                        error: function(error) {
                            console.log('Error:', error);
                        }
                    });
                }

                // Handle click event on status button
                $('.toggle-status').on('click', function() {
                    var userId = $(this).data('id');
                    var button = $(this);
                    toggleStatus(userId, button);
                });
            });
        </script>
