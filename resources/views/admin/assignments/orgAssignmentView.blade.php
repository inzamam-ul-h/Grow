@include('frontend.layouts.header_links')
@include('frontend.layouts.header')







<div class="wrapper">
    <div class="container-fluid">

        <!-- Buttons for adding employee and assigning courses -->

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item active">Assignments</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Assignment Submited</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        {{-- view pop for address here --}}
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

<div class="col-lg-12">
    <div class="card m-b-30">
        <div class="card-body">
            <h4 class="mt-0 header-title">Assignment submission</h4>
            <p class="text-muted m-b-30 font-14">Assignment submitted by Employee.</p>

            {{-- <div id="accordion" role="tablist" aria-multiselectable="true">
                @foreach ($submissionsByOrganization as $organizationName => $submissions)
                <div class="card">
                    <div class="card-header" role="tab" id="heading{{ $loop->index }}">
                        <h5 class="mb-0 mt-0 font-16">
                            <a class="collapsed text-dark" data-toggle="collapse"
                               data-parent="#accordion" href="#collapse{{ $loop->index }}"
                               aria-expanded="false" aria-controls="collapse{{ $loop->index }}">
                               {{ $loop->iteration }} : {{ $organizationName }}
                            </a>
                        </h5>
                    </div>

                    <div id="collapse{{ $loop->index }}" class="collapse" role="tabpanel"
                         aria-labelledby="heading{{ $loop->index }}"> --}}
                        <div class="card-body">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 m-b-15 header-title">Employee Assignments</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0 dataTable" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center; white-space: nowrap;"><strong>Sr no</strong></th>
                                                    <th style="text-align: center; white-space: nowrap;"><strong>Name</strong></th>
                                                    <th style="text-align: center; white-space: nowrap;"><strong>Assignment</strong></th>
                                                    <th style="text-align: center; white-space: nowrap;"><strong>Course</strong></th>
                                                    <th style="text-align: center; white-space: nowrap;"><strong>Date/Time</strong></th>
                                                    <th style="text-align: center; white-space: nowrap;"><strong>Action</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($submissions as $index => $submission)
                                                <tr>
                                                    <td style="text-align: center;">{{ $index + 1 }}</td>
                                                    <td style="text-align: center;">{{ $submission->submitter_name }}</td>
                                                    <td style="text-align: center;">{{ $submission->assignment_title }}</td>
                                                    <td style="text-align: center;">{{ $submission->course_title ?? 'N/A' }}</td>
                                                    <td style="text-align: center;">
                                                        {{ \Carbon\Carbon::parse($submission->created_at)->format('Y-m-d H:i:s') ?? 'N/A' }}
                                                    </td>

                                                    <td style="text-align: center;">
                                                        <a href="{{ asset('storage/' . $submission->file) }}" target="_blank">View File</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
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
                // Initialize DataTable for all tables
                function initializeDataTables() {
                    $('.dataTable').each(function() {
                        if ($.fn.DataTable.isDataTable(this)) {
                            $(this).DataTable().destroy();
                        }
                        $(this).DataTable({
                            processing: true,
                            serverSide: false, // Change to true if you're using server-side processing
                            paging: true,
                            searching: true,
                            ordering: true
                        });
                    });
                }

                // Initialize DataTable when the page loads
                initializeDataTables();

                // Reinitialize DataTable when collapsing an accordion
                $('#accordion').on('shown.bs.collapse', function () {
                    initializeDataTables();
                });
            });
        </script>




