@include('frontend.layouts.header')
@include('frontend.layouts.header_links')

<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Grow</a></li>
                            <li class="breadcrumb-item">Organization</li>
                        </ol>
                    </div>
                    <h4 class="page-title"> Add Organization </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

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
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <h4 class="mt-0 header-title">Add Organization Details</h4>
                        <form id="orgForm"  action="{{ route('organization.store')}}" method="POST" onsubmit="return validateForm()">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" placeholder="Enter UserName" id="name" name="name" value="{{ old('name') }}">
                                    <span class="error" id="nameError"></span>
                                    @if ($errors->has('name'))
                                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="email" placeholder="Enter email" id="email" name="email" value="{{ old('email') }}">
                                    <span class="error" id="emailError"></span>
                                    @if ($errors->has('email'))
                                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="password" name="password"  autocomplete="new-password" placeholder="Enter Password here" id="password">
                                    <span class="error" id="passwordError"></span>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-4">

                                    <input class="form-control" id="password_confirmation" type="password" placeholder="Confirm Password" name="password_confirmation"  autocomplete="new-password">
                                    <span class="error" id="password_confirmationError"></span>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="register_no" class="col-sm-2 col-form-label">Register No</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" placeholder="12e13we7328" id="register_no" name="register_no" value="{{ old('register_no') }}">
                                    <span class="error" id="register_noError"></span>

                                    @if ($errors->has('register_no'))
                                    <div class="alert alert-danger">{{ $errors->first('register_no') }}</div>
                                    @endif
                                </div>
                                <label for="contact" class="col-sm-2 col-form-label">Contact No</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="number" placeholder="746231247" id="contact" name="contact" value="{{ old('contact') }}">
                                    <span class="error" id="contactError"></span>
                                    @if ($errors->has('contact'))
                                    <div class="alert alert-danger">{{ $errors->first('contact') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Street 3 Rawalpindi Awan Town" id="address" name="address" value="{{old('address')}}">
                                    @if ($errors->has('address'))
                                    <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <div class="form-row justify-content-end">
                                    <div class="col-auto">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                <a href="{{ route('organization.index') }}" class="btn btn-secondary waves-effect m-l-5">Cancel</a>
                                </div>
                            </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


    </div> <!-- end container -->
</div>
<!-- end wrapper -->

@include('frontend.layouts.footer')
@include('frontend.layouts.footer_links')

<script src="{{ asset('frontend/assets/js/my js/org.js') }}"></script>
