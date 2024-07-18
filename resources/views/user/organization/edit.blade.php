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
                    <h4 class="page-title">Update Organization Details </h4>
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
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="card-body">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('organization.update', ['id' => $userid->id]) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $user->name }}" required>
                                    </div>
                                    <label for="address" class="col-sm-2 col-form-label">{{ __('Address') }}</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $user->address ?? '' }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="register_no"
                                        class="col-sm-2 col-form-label">{{ __('Register No') }}</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" id="register_no" name="register_no"
                                            value="{{ $user->register_no ?? '' }}" required>
                                    </div>
                                    <label for="contact" class="col-sm-2 col-form-label">{{ __('Contact') }}</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" id="contact" name="contact"
                                            value="{{ $user->contact ?? '' }}" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                <a href="{{ route('organization.index') }}"
                                    class="btn btn-secondary waves-effect m-l-5">Cancel</a>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div> <!-- end container -->
</div>

@include('frontend.layouts.footer')
@include('frontend.layouts.footer_links')
