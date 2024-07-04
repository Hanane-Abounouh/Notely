<!-- resources/views/auth/login.blade.php -->

<x-guest-layout>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="form-container">
                <div class="form-icon">
                    <i class="fa fa-user-circle"></i>
                    <p>Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
                </div>
                <form method="POST" action="{{ route('login') }}" class="form-horizontal">
                    @csrf
                    <h3 class="title">Member Login</h3>

                    <!-- Email Address -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required autocomplete="current-password">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="form-group form-check text-center">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                    </div>

                    <!-- Forgot Password Link -->
                    <div class="text-center mb-4">
                        <a href="{{ route('password.request') }}">Forgot Username/Password?</a>
                    </div>

                    <!-- Login Button -->
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-block text-white">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
