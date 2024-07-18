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
                            <li class="breadcrumb-item">Employe</li>
                        </ol>
                    </div>
                    <h4 class="page-title"> Add Employe </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
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
                        <h4 class="mt-0 header-title">Add Employee Details</h4>
                        <form action="{{ route('user.store') }}" method="POST" id="userForm" onsubmit="return validateForm()">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" placeholder="Enter UserName"
                                        id="name" name="name" value="{{ old('name') }}">
                                        <span class="error" id="nameError"></span>

                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>

                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="email" placeholder="Enter email" id="email"
                                        name="email" value="{{ old('email') }}">
                                        <span class="error" id="emailError"></span>
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="password" name="password"
                                        autocomplete="new-password" placeholder="Enter Password here" id="password">
                                        <span class="error" id="passwordError"></span>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm
                                    Password</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="password_confirmation" type="password"
                                         placeholder="Confirm Password" name="password_confirmation"
                                     autocomplete="new-password">
                                        <span class="error" id="password_confirmationError"></span>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="post" class="col-sm-2 col-form-label">Post</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" placeholder="Laravel Developer"
                                        id="post" name="post" value="{{ old('post') }}">
                                        <span class="error" id="postError"></span>
                                    @if ($errors->has('post'))
                                        <div class="alert alert-danger">{{ $errors->first('post') }}</div>
                                    @endif
                                </div>
                                <label for="experence" class="col-sm-2 col-form-label">Experience</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" placeholder="2 years / month"
                                        id="experience" name="experence" value="{{ old('experence') }}">
                                        <span class="error" id="experienceError"></span>
                                    @if ($errors->has('experence'))
                                        <div class="alert alert-danger">{{ $errors->first('experence') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="qulification" class="col-sm-2 col-form-label">Qualification</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" placeholder="Ms Software Engineering"
                                        id="qualification" name="qulification" value="{{ old('qulification') }}">
                                        <span class="error" id="qualificationError"></span>
                                    @if ($errors->has('qulification'))
                                        <div class="alert alert-danger">{{ $errors->first('qulification') }}</div>
                                    @endif
                                </div>
                                <label for="address" class="col-sm-2 col-form-label">Branch</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text"
                                        placeholder="Streeet 3 rawalpindi awan town" id="address" name="address"
                                        value="{{ old('address') }}">
                                    @if ($errors->has('address'))
                                        <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>

                            </div>
                            @if (Auth::user()->usertype == 'admin')
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Organization</label>
                                <div class="col-sm-10" >
                                    <select  class="form-control" name="organization_id" id="organization">
                                        @foreach ($organizations as $organization)
                                        <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="error" id="organizationError"></span>
                                </div>
                            </div>

                            @endif
                            <div>
                                <div class="form-row justify-content-end">
                                    <div class="col-auto">
                                <button type="submit"
                                    class="btn btn-primary waves-effect waves-light">Submit</button>
                                <a href="{{ route('user.index') }}"
                                    class="btn btn-secondary waves-effect m-l-5">Cancel</a>
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


@if (Auth::user()->usertype == 'admin')
<script src="{{ asset('frontend/assets/js/my js/adminEmploye.js') }}"></script>
@else
<script src="{{ asset('frontend/assets/js/my js/user.js') }}"></script>

@endif




<script>
    $(document).ready(function() {
        $('#organization').select2({
            placeholder: 'Select an option',
            allowClear: true
        });

        $('.select2-selection--single').css('height', '38px'); // Adjust the height as needed
        $('.select2-selection__rendered').css({
            'line-height': '38px', // Adjust to match the height
            'padding-top': '0px',
            'padding-bottom': '0px'
        });
        $('.select2-selection__arrow').css('height', '38px'); // Adjust to match the height

    });
</script>



