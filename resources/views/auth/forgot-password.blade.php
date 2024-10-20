<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Styles --}}
    <style>
        body {
            background: linear-gradient(to right, #ac3c29, #727171);
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

        .custom-input {
            background-color: transparent;
            color: white;
            border-color: white;
        }

        .custom-input::placeholder {
            color: white;
        }

        .custom-btn {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .download-app {
            margin-top: 2rem;
        }

        .footer-icons img {
            width: 24px;
            margin: 0 5px;
        }

        @media (max-width: 768px) {
            .left-container, .right-container {
                flex: 100%;
                text-align: center;
            }

            .left-container {
                padding: 20px;
            }
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

    <div class="container-fluid">
        <div class="language-switcher">
            <select class="form-select w-auto">
                <option selected>English</option>
                <option value="1">Sinhala</option>
                <option value="2">Tamil</option>
            </select>
        </div>

        <div class="row h-100">
            <!-- Left Container -->
            <div class="col-lg-6 left-container">
                <div>
                    <div class="mb-4"><img src="images/logo.png"><br>
                        <span class="custom-logo">PRESCRIBING SYSTEM</span>
                    </div>
                </div>
            </div>

            <!-- Right Container-->
            <div class="col-lg-6 right-container">
                <div class="w-75">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Password Reset Form -->
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group mb-3">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" class="form-control custom-input" type="email" placeholder="E-Mail Address" :value="old('email')" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-danger w-100">{{ __('Send Password Reset Link') }}</button>
                    </form>

                    <!-- Sign In Link -->
                    <div class="mt-3 text-end">
                        <a href="{{ route('login') }}" class="text-light">{{ __('Already registered? Sign In') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
