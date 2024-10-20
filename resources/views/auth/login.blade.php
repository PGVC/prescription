<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title>Login Page</title>
    <style>
        body {
            background: linear-gradient(90deg, #ac3c29, #727171);
            height: 100vh;
            display: flex;
            align-items: center;
            color: white;
        }

        .container-fluid {
            height: 100vh;
        }

        .left-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left: 50px;
        }

        .right-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .custom-logo {
            font-size: 2.5rem;
            font-weight: bold;
            color: #11375E;
        }

        .language-switcher {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 10;
        }
    </style>
</head>

<body>
    <div class="language-switcher">
        <select class="form-select w-auto">
            <option selected>English</option>
            <option value="1">Sinhala</option>
            <option value="2">Tamil</option>
        </select>
    </div>

    <div class="container-fluid">
        <div class="row h-100">
            <!-- Left Container -->
            <div class="col-lg-6 left-container">
                <div>
                    <div class="mb-4"><img src="images/logo.png"><br>
                        <span class="custom-logo">PRESCRIBING SYSTEM</span> 
                    </div>
                </div>
            </div>

            <!-- Right Container -->
            <div class="col-lg-6 right-container">
                <div class="w-75">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Username (Email Address) -->
                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Username')" />
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Forgot Password -->
                        <div>
                            @if (Route::has('password.request'))
                                <a class="form-label text-light" href="{{ route('password.request') }}">
                                    {{ __('Forget your password?') }}
                                </a>
                            @endif
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-3 form-check">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                        </div>

                        <!-- Register Link -->
                        <p>New user?<a href="{{ route('register') }}" class="text-light m-2">{{ __('Register') }}</a></p>

                        <!-- Login Button -->
                        <button type="submit" class="btn btn-danger w-100">{{ __('Login') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
