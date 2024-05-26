@include('frontend.layouts.header_links')


@include('organization.header')
<body>
    
    
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Employee Profile Details</h4>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{ $employeeProfile->user->name }}</p>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{ $employeeProfile->user->email }}</p>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Post</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{ $employeeProfile->post }}</p>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{ $employeeProfile->experience }}</p>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Qualification</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{ $employeeProfile->qualification }}</p>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Updated By</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{ $employeeProfile->updated_by }}</p>
                        </div>
                    </div>
                    
                    <a href="{{ route('employeeProfile.edit', $employeeProfile) }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    


    
@include('organization.footer')
@include('frontend.layouts.footer_links')
</body>
