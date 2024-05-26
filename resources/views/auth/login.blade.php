
{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



@include('frontend.layouts.header_links')
<body>

    

 <!-- Begin page -->
 <div class="accountbg"></div>
 <div class="wrapper-page">

     <div class="card">
         <div class="card-body">

             <h3 class="text-center mt-0 m-b-15">
                 <a href="{{ route('home') }}" class="logo logo-admin"><img src="{{ asset('frontend/assets/images/Navy Brand Logo (1).png') }}" height="150"  alt="logo"></a>
             </h3>

             <h4 class="text-muted text-center font-18"><b>Sign In</b></h4>

             <div class="p-3">


                 <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf


                     <div class="form-group row">
                         <div class="col-12">
                             <input class="form-control" id="email" type="email" required="" placeholder="Email" 
                             name="email" :value="old('email')" required autofocus autocomplete="username" >
                             <x-input-error :messages="$errors->get('email')" class="mt-2" />
                         </div>
                     </div>

                     <div class="form-group row">
                         <div class="col-12">
                             <input class="form-control" id="password"  placeholder="Password"
                             type="password"
                             name="password"
                             required autocomplete="current-password" >
                             <x-input-error :messages="$errors->get('password')" class="mt-2" />
                         </div>
                     </div>

                     <div class="form-group row">
                         <div class="col-12">
                             <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" name="remember" id="remember_me">
                                 <label class="custom-control-label" for="customCheck1">Remember me</label>
                             </div>
                         </div>
                     </div>

                     <div class="form-group text-center row m-t-20">
                         <div class="col-12">
                             <button class="btn btn-info btn-block waves-effect waves-light" type="submit">Log In</button>
                         </div>
                     </div>

                     <div class="form-group m-t-10 mb-0 row">
                         <div class="col-sm-7 m-t-20">
                            @if (Route::has('password.request'))
                             <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock    "></i> Forgot your password?</a>
                             @endif
                            </div>

                         <div class="col-sm-5 m-t-20">
                             <a href="{{ route('register') }}" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                         </div>
                     </div>
                 </form>
             </div>

         </div>
     </div>
 </div>
 @include('frontend.layouts.footer_links')
 </body>



