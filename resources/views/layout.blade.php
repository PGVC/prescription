<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    
    <style>
        .sidebar a {
            color: black;
            text-decoration: none;
            padding: 10px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: start;
        }
        .sidebar a.active, .sidebar a:hover {
            background-color: rgba(138, 4, 4, 0.568);
            color: white;
        }
        .sidebar-icon {
            margin-right: 10px;
            height: 24px;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100" style="background-color: #b4afaf;"> 

<!-- Sidebar -->
<div class="sidebar d-flex flex-column align-items-center">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="sidebar-logo mb-3">
    
    <a href="{{ route('dashboard') }}" class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
        <img src="{{ asset('images/Home.png') }}" alt="Dashboard Icon" class="sidebar-icon">
        Dashboard
    </a>
    <a href="{{ route('bookings') }}" class="{{ Route::currentRouteName() == 'bookings' ? 'active' : '' }}">
        <img src="{{ asset('images/calendar.png') }}" alt="Bookings Icon" class="sidebar-icon">
        Bookings
    </a>
    <a href="{{ route('patients') }}" class="{{ Route::currentRouteName() == 'patients' ? 'active' : '' }}">
        <img src="{{ asset('images/guest.png') }}" alt="Patients Icon" class="sidebar-icon">
        Patients
    </a>
    <a href="#" class="{{ Route::currentRouteName() == 'diseases' ? 'active' : '' }}">
        <img src="{{ asset('images/Germ.png') }}" alt="Diseases Icon" class="sidebar-icon">
        Diseases
    </a>
    <a href="#" class="{{ Route::currentRouteName() == 'drugs' ? 'active' : '' }}">
        <img src="{{ asset('images/Drug.png') }}" alt="Drugs Icon" class="sidebar-icon">
        Drugs
    </a>
</div>

<!-- Header -->
<div class="header d-flex justify-content-between align-items-center p-2" style="background-color: #c82333;">
    <div class="ms-3">
        <h1 class="text-white">PRESCRIBING SYSTEM</h1>
    </div>
    <div class="text-center">
        <a href="{{ route('prescription') }}" class="btn btn-outline-light d-flex align-items-center">
            <img src="{{ asset('images/notebook.png') }}" alt="Prescribe Icon" class="me-2" style="height: 24px;">
            <b>Prescribe</b>
        </a>
    </div>
    <div class="me-3">
        <button class="btn btn-outline-light d-flex align-items-center" onclick="confirmLogout()">
            <img src="{{ asset('images/sign.png') }}" alt="User Icon" class="me-2" style="height: 24px;">
            <b>Sign Out</b>
        </button>
    </div>
    
    <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to sign out?")) {
                window.location.href = "/login";
            }
        }
    </script>
</div>

<!-- Main Content -->
<div class="container-content" style="background-color: transparent;">
    <div class="background-overlay">
        @yield('content')
    </div>
</div>

<!-- Footer -->
<footer class="footer text-center py-3 w-100" style="background-color: #f8f9fa; position: fixed; bottom: 0; left: 0;">
    <p>Copyright © 2022 PrescribeSystem. All Rights Reserved. Designed and by EzoneIT</p>
</footer>

<!-- Bootstrap JS and jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
