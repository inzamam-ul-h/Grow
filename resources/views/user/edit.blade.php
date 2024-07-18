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
                    <h4 class="page-title">Update Employee Details </h4>
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


                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif


                    <form method="POST" action="{{ route('user.update',['id' => $userid->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="address">{{ __('Address') }}</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address ?? '' }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="qualification">{{ __('Qualification') }}</label>
                                <input type="text" class="form-control" id="qualification" name="qualification" value="{{ $user->qualification ?? '' }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="experience">{{ __('Experience') }}</label>
                                <input type="text" class="form-control" id="experence" name="experence" value="{{ $user->experence ?? '' }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="post">{{ __('Post') }}</label>
                                <input type="text" class="form-control" id="post" name="post" value="{{ $user->post ?? '' }}" required>
                            </div>

                            @if(Auth::user()->usertype == 'admin')
                            <div class="form-group col-md-6">
                                <label for="organization">{{ __('Organization') }}</label>
                                <select class="form-control" name="organization_id"  id="organization" required>
                                    @foreach($organizations as $organization)
                                    <option  value="{{ $organization->id }}" {{ old('organization_id',  $user->organization_id) == $organization->id ? 'selected' : '' }}>
                                        {{ $organization->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                        </div>
                        <div>
                            <div class="form-row justify-content-end">
                                <div class="col-auto">
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        <a href="{{ route('user.index') }}" class="btn btn-secondary waves-effect m-l-5">Cancel</a>
                    </div>
                </div>
            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>







@include('frontend.layouts.footer')
@include('frontend.layouts.footer_links')



<script>
    $(document).ready(function() {
      $('#organization').select2({
        placeholder: 'Select an option',
        allowClear: true
      });



      $('.select2-selection--single').css('height', '35px'); // Adjust the height as needed
        $('.select2-selection__rendered').css({
            'line-height': '35px', // Adjust to match the height
            'padding-top': '0px',
            'padding-bottom': '0px'
        });
        $('.select2-selection__arrow').css('height', '35px'); // Adjust to match the height

    });
  </script>
