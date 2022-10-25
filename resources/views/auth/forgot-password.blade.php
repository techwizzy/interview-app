<x-guest-layout>
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="p-5">

                        <div class=" alert alert-info mb-4 text-small text-muted p-2">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('password.email') }}" class="user">
                            @csrf

                            <!-- Email Address -->
                            <div>

                                    <input type="email" name="email" :value="old('email')" required  class="form-control form-control-user"
                                    placeholder="Email Address">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>


                            <div class="flex text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-user ">
                                    {{ __('Email Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
