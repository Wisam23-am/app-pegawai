<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Pegawai')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

    <header class="bg-primary text-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}"><b>SHEMSTARTUP</b></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('employees*') ? 'active' : '' }}"
                                    href="{{ route('employees.index') }}">Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('departments*') ? 'active' : '' }}"
                                    href="{{ route('departments.index') }}">Department</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('positions*') ? 'active' : '' }}"
                                    href="{{ route('positions.index') }}">Jabatan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('attendances*') ? 'active' : '' }}"
                                    href="{{ route('attendances.index') }}">Attendance</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('salaries*') ? 'active' : '' }}"
                                    href="{{ route('salaries.index') }}">Salary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Settings</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main class="container my-4 flex-grow-1">
        @yield('content')
    </main>

    <footer class="bg-light text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Aplikasi Pegawai</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>