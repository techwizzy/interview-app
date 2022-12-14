<x-guest-layout>


    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="user">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user"
                                 type="email" name="email" :value="old('email')" required autofocus aria-describedby="emailHelp"
                                    placeholder="Enter Email Address...">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user"
                                type="password"
                                name="password"
                                required autocomplete="current-password" placeholder="Password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" name="remember" for="customCheck">Remember
                                        Me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>

                        </form>
                        <hr>
                        <div class="text-center">

                            @if (Route::has('password.request'))
                            <a class="small" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                          @endif
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('register') }}">Create an Account!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
