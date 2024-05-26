
@include('frontend.layouts.header_links')

@include('organization.header')


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
                        <h4 class="mt-0 header-title">Add Employee Details</h4>
                        <form action="{{ route('employee.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Enter UserName" id="name" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                      @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" placeholder="Enter email" id="email" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('name'))
                                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                      @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Enter Password here" id="password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="password_confirmation" type="password" required="" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="post" class="col-sm-2 col-form-label">Post</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Laravel Developer" id="post" name="post" value="{{ old('post') }}">
                                    @if ($errors->has('post'))
                                    <div class="alert alert-danger">{{ $errors->first('post') }}</div>
                                      @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="experence" class="col-sm-2 col-form-label">Experience</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="2 years / month" id="experence" name="experence" value="{{ old('experence') }}">
                                    @if ($errors->has('experence'))
                                    <div class="alert alert-danger">{{ $errors->first('experence') }}</div>
                                      @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="qulification" class="col-sm-2 col-form-label">Qualification</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Ms Software Engineering" id="qulification" name="qulification" value="{{ old('qulification') }}">
                                    @if ($errors->has('qulification'))
                                    <div class="alert alert-danger">{{ $errors->first('qulification') }}</div>
                                      @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="qulification" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Streeet 3 rawalpindi awan town" id="address" name="address" value="{{old('address')}}">
                                    @if ($errors->has('address'))
                                    <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                                      @endif
  
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

    </div> <!-- end container -->
</div>
<!-- end wrapper -->

@include('organization.footer')
@include('frontend.layouts.footer_links')