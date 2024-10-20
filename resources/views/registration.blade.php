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


    <title>Registration Page</title>
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

            <!-- Right Container-->
            <div class="col-lg-6 right-container">
                <div class="w-75">
                    <form method="POST" action="{{route('register')}}">
                        @csrf 
                        <div class="mb-3">
                            <label for="doctor_name">Doctor name:</label>
                            <input type="text" name="d_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="dispensary_name">Dispensary Name:</label>
                            <input type="text" name="dis_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="did">DID:</label>
                            <input type="text" placeholder="Leave empty to autogenerate" name="did" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="location">Location:</label>
                            <input type="text" placeholder="Address" name="location" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="username">Username:</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <p>Alrady have accound?<a href="{{ route ('login') }}" class="text-light m-2"> Login</a></p>
                        <button type="submit" class="btn btn-danger w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


