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
                    <form>
                        <div class="mb-3">
                            <input type="username" placeholder="Username" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="password" placeholder="Password" class="form-control">
                        </div>
                        <div>
                            <a href="/fgtpw" class="form-label">Forget your password?</a>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
