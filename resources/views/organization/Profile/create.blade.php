
@include('frontend.layouts.header_links')
@include('organization.header')
<div class="wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-success">
                            {{ session('error') }}
                        </div>
                        @endif


                        <h4 class="mt-0 header-title">Organization Profile Details</h4>
                                   
   <form action="{{ route('organizationProfile.store') }}" method="POST">
    @csrf
    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Address" name="address" id="address" value="{{ old('address') }}">
            @if ($errors->has('address'))
            <div class="alert alert-danger">{{ $errors->first('address') }}</div>
        @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="contact" class="col-sm-2 col-form-label">Contact No</label>
        <div class="col-sm-10">
            <input class="form-control" type="tel" placeholder="Enter Contact number" id="contact" name="contact" value="{{ old('contact') }}">
            @if ($errors->has('contact'))
            <div class="alert alert-danger">{{ $errors->first('contact') }}</div>
        @endif
        </div>
        
       
        
    </div>
    <div class="form-group row">
        <label for="register_no" class="col-sm-2 col-form-label">Registration Number</label>
        <div class="col-sm-10">
            <input class="form-control" type="number" placeholder="27124177" id="register_no" name="register_no" value="{{ old('register_no') }}">
            @if ($errors->has('register_no'))
            <div class="alert alert-danger">{{ $errors->first('register_no') }}</div>
        @endif
        </div>

    </div>
    <div>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
        <button type="reset" class="btn btn-secondary waves-effect m-l-5">Cancel</button>
    </div>
</form>

                        
</div>
<!-- end wrapper -->

@include('frontend.layouts.footer_links')
    
</body>