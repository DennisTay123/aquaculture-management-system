<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .dark-mode .navbar,
        .dark-mode .main-panel {
            background: #292828;
        }

        .dark-mode .hr {
            background: #ffffff50;
        }

        .dark-mode .card {
            background: #353433;
            color: #ffffff;
        }

        .dark-mode .navbar-brand,
        .dark-mode .nav-link,
        .dark-mode .tbody {
            color: #ffffff;
        }

        .dark-mode .form-control {
            background-color: #605d5c;
            color: #292828;
            border: 1px solid;
        }

        .dark-mode .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <!-- <a class="navbar-brand" href="#pablo">{{ __('Paper Dashboard') }}</a> -->
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <form>
                    <div class="input-group no-border">
                        <input type="text" value="" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="nc-icon nc-zoom-split"></i>
                            </div>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav">
                    <!-- Dark Mode -->
                    <!-- <li class="nav-item">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="darkModeSwitch">
                            <label class="custom-control-label" for="darkModeSwitch"></label>
                        </div>
                    </li> -->



                    <!-- <li class="nav-item">
                        <a class="nav-link btn-magnify" href="#pablo">
                            <i class="nc-icon nc-layout-11"></i>
                            <p>
                                <span class="d-lg-none d-md-block">{{ __('Stats') }}</span>
                            </p>
                        </a>
                    </li> -->
                    <!-- <li class="nav-item btn-rotate dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>
                                <span class="d-lg-none d-md-block">{{ __('Some Actions') }}</span>
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">{{ __('Action') }}</a>
                            <a class="dropdown-item" href="#">{{ __('Another action') }}</a>
                            <a class="dropdown-item" href="#">{{ __('Something else here') }}</a>
                        </div>
                    </li> -->
                    <li class="nav-item btn-rotate dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="nc-icon nc-settings-gear-65"></i>
                            <p>
                                <span class="d-lg-none d-md-block">{{ __('Account') }}</span>
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                            <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item"
                                    onclick="document.getElementById('formLogOut').submit();">{{ __('Log out') }}</a>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('My profile') }}</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <script>
        $(document).ready(function () {
            // Check localStorage for dark mode preference
            if (localStorage.getItem('darkMode') === 'enabled') {
                $('body').addClass('dark-mode');
                $('#darkModeSwitch').prop('checked', true);
            }

            $('#darkModeSwitch').on('change', function () {
                if ($(this).is(':checked')) {
                    $('body').addClass('dark-mode');
                    localStorage.setItem('darkMode', 'enabled'); // Save preference to localStorage
                } else {
                    $('body').removeClass('dark-mode');
                    localStorage.setItem('darkMode', 'disabled'); // Save preference to localStorage
                }
            });
        });
    </script>

</body>

</html>