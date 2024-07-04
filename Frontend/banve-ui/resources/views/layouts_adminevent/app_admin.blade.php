<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EAdmin Dashboard')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    @stack('styles')
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 56px; /* Adjusted to be below the navbar */
            left: 0;
            background-color: #2e3134;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #ddd;
            display: block;
        }
        .sidebar a:hover {
            background-color: #575d63;
            color: white;
        }
        .sidebar-footer {
            margin-top: auto;
            padding: 10px 15px;
            text-align: left;
            color: #fff;
            position: fixed;
            bottom: 0;
            left: 0;
            background-color: #2e3134;
            width: 250px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1;
        }
        .main-content {
            margin-top: 56px; /* Height of the navbar */
            margin-left: 250px;
        }
        .dropdown-menu a.dropdown-item:hover {
            background-color: #575d63;
            color: white;
        }
        .dropdown-menu a.dropdown-item i {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">TFour-Ticket</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <form class="form-inline my-2 my-lg-0 ml-auto">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ml-2">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"> Hi, {{ Session::get('user.username') }}</i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('eadmin.profile') }}"><i class="fas fa-user mr-2"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-ticket-alt mr-2"></i> My Event</a>
                        <a class="dropdown-item" href="{{ route('eadmin.changepass') }}"><i class="fas fa-key mr-2"></i> Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt mr-2"></i> Log Out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="sidebar">
        <div>
            <a href="{{ route('eadmin.home') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="#"><i class="fas fa-calendar-alt"></i> Event</a>
            <a href="#"><i class="fas fa-tags"></i> Voucher</a>
            <a href="{{ route('eadmin.contract') }}"><i class="fas fa-file-contract"></i> Contract</a>
        </div>
        <div class="sidebar-footer">
            <small class="text-muted">Event admin: {{ Session::get('user.username') }}</small>
        </div>
    </div>

    <div class="main-content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
</body>
</html>
