@include('frontend.layouts.header_links')
@include('frontend.layouts.header')


@if (Auth::user()->usertype == 'admin')

    <!-- admin Employee index start here  -->



    <div class="wrapper">
        <div class="container-fluid">

            <!-- Buttons for adding employee and assigning courses -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <a href="{{ route('user.create') }}"> <button class="btn btn-success">Add Employee</button></a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('user.index') }}"><button class="btn btn-primary">View Employee</button></a>
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
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @elseif  (session('error'))
                        <div class="alert alert-danger">
                         {{ session('error') }}
                     </div>
                    @endif
                        <h4 class="page-title">Employee List in Trashed</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <!-- Recent Employee section  -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 m-b-15 header-title">Employee In Trashed</h4>
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
                                            <th style="text-align: center; white-space: nowrap;">
                                                <strong>Experience</strong>
                                            </th>

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
                                        @foreach ($employees as $index=>$employee)
                                            <tr>
                                                <td  class="text-center">{{ $index+1 }}</td>
                                                <td  class="text-center" ><a style="color: black" href="{{ route('user.show',[$employee->employee_id]) }}">{{ $employee->employee_name }}</td></a>
                                                <td  class="text-center">{{ $employee->employee_email }}</td>
                                                <td  class="text-center">
                                                    <span class="truncated-address"
                                                        style="cursor: pointer; text-decoration: underline;"
                                                        onclick="showFullAddress('{{ $employee->address }}')">
                                                        {{ Str::limit($employee->address, 5) }}
                                                    </span>
                                                </td>
                                                <td  class="text-center">{{ $employee->post ?? 'N/A' }}</td>
                                                <td  class="text-center" >{{ $employee->experence ?? 'N/A' }}</td>

                                                <td  class="text-center">{{ $employee->qualification ?? 'N/A' }}</td>
                                                <td  class="text-center">{{ $employee->organization_name ?? 'N/A' }}</td>

                                                <td class="text-center">
                                                    <a href="{{ route('empCourse.index',['id'=>$employee->employee_id]) }}">  <button class="btn btn-sm btn-secondary">
                                                         View <i class="fas fa-eye"></i>
                                                      </button></a>
                                                  </td>

                                                    <td  class="text-center">
                                                        <button class="btn toggle-status {{ $employee->employee_status == '0' ? 'btn-danger' : 'btn-success' }} btn-sm btn-custom mr-2 mb-2" data-id="{{ $employee->employee_id }}">
                                                            <i class="fas {{ $employee->employee_status == '0' ? 'fa-times-circle' : 'fa-check-circle' }}"></i>
                                                        </button>
                                                    </td>


                                                <td class="text-center">
                                                    {{-- <a href="{{ route('user.edit', [$employee->employee_id]) }}"

                                                        class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                    </a> --}}
                                                    {{-- <a href="{{ route('user.destroy', [$employee->employee_id]) }}"
                                                        class="btn btn-danger"
                                                       >
                                                        <i class="fa fa-trash"></i>
                                                    </a> --}}

                                                    <a href="{{ route('user.restore', $employee->employee_id) }}"
                                                        onclick="return confirm('Are you sure you want to restore this employee?');"
                                                        class="btn btn-primary btn-sm"
                                                        >
                                                        <i class="fas fa-undo-alt"></i> Restore

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
        @elseif(Auth::user()->usertype == 'organization')
            <div class="wrapper">
                <div class="container-fluid">

                    <!-- Buttons for adding employee and assigning courses -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <a href="{{ route('user.create') }}"> <button class="btn btn-success">Add
                                    Employee</button></a>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('user.index') }}"><button class="btn btn-primary">Employee</button></a>
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
                                <h4 class="page-title">Employee List in Trashed</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->

                    <!-- Recent Employee section  -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 m-b-15 header-title">Employee In Trashed</h4>
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
                                                    <th style="text-align: center; white-space: nowrap;">
                                                        <strong>Experience</strong>
                                                    </th>

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
                                                @foreach ($employees as $index=>$employee)
                                                    <tr>
                                                        <td  class="text-center">{{ $index+1 }}</td>
                                                        <td  class="text-center" ><a style="color: black" href="{{ route('user.show',[$employee->employee_id]) }}">{{ $employee->employee_name }}</td></a>
                                                        <td  class="text-center">{{ $employee->employee_email }}</td>
                                                        <td  class="text-center">
                                                            <span class="truncated-address"
                                                                style="cursor: pointer; text-decoration: underline;"
                                                                onclick="showFullAddress('{{ $employee->address }}')">
                                                                {{ Str::limit($employee->address, 5) }}
                                                            </span>
                                                        </td>
                                                        <td  class="text-center">{{ $employee->post ?? 'N/A' }}</td>
                                                        <td  class="text-center" >{{ $employee->experence ?? 'N/A' }}</td>

                                                        <td  class="text-center">{{ $employee->qualification ?? 'N/A' }}</td>
                                                        <td  class="text-center">{{ $employee->organization_name ?? 'N/A' }}</td>

                                                        <td class="text-center">
                                                            <a href="{{ route('empCourse.index',['id'=>$employee->employee_id]) }}">  <button class="btn btn-sm btn-secondary">
                                                                 View <i class="fas fa-eye"></i>
                                                              </button></a>
                                                          </td>

                                                            <td  class="text-center">
                                                                <button class="btn toggle-status {{ $employee->employee_status == '0' ? 'btn-danger' : 'btn-success' }} btn-sm btn-custom mr-2 mb-2" data-id="{{ $employee->employee_id }}">
                                                                    <i class="fas {{ $employee->employee_status == '0' ? 'fa-times-circle' : 'fa-check-circle' }}"></i>
                                                                </button>
                                                            </td>


                                                        <td class="text-center">
                                                            {{-- <a href="{{ route('user.edit', [$employee->employee_id]) }}"

                                                                class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                            </a> --}}
                                                            {{-- <a href="{{ route('user.destroy', [$employee->employee_id]) }}"
                                                                class="btn btn-danger"
                                                               >
                                                                <i class="fa fa-trash"></i>
                                                            </a> --}}

                                                            <a href="{{ route('user.restore', $employee->employee_id) }}"
                                                                onclick="return confirm('Are you sure you want to restore this employee?');"
                                                                class="btn btn-primary btn-sm"
                                                                >
                                                                <i class="fas fa-undo-alt"></i> Restore

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
                @else
@endif




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
</script>
