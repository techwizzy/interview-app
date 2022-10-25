<x-guest-layout>

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form method="POST" action="{{ route('register') }}" class="user">
                            @csrf

                            <div class="form-group ">

                                    <input type="text" class="form-control form-control-user"   name="name" :value="old('name')" required autofocus
                                        placeholder=" Name">

                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" :value="old('email')" required  class="form-control form-control-user"
                                    placeholder="Email Address">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input   class="form-control form-control-user"
                                    name="password"
                                    required
                                    placeholder="Password"
                                    autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                    name="password_confirmation" required  placeholder="Repeat Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                            <hr>

                        </form>


                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
