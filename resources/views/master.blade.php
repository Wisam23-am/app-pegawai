<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Pegawai') - SHEMSTARTUP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-bg: #0a0e27;
            --card-bg: rgba(15, 23, 42, 0.8);
            --glass-bg: rgba(255, 255, 255, 0.05);
            --text-primary: #e2e8f0;
            --text-secondary: #94a3b8;
            --border-glow: rgba(102, 126, 234, 0.3);
            --shadow-glow: 0 0 20px rgba(102, 126, 234, 0.4);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--dark-bg);
            color: var(--text-primary);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 30%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(245, 87, 108, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(74, 222, 128, 0.05) 0%, transparent 50%);
            z-index: -1;
            animation: bgShift 15s ease infinite;
        }

        @keyframes bgShift {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(2deg);
            }
        }

        /* Floating particles */
        .particle {
            position: fixed;
            width: 3px;
            height: 3px;
            background: rgba(102, 126, 234, 0.6);
            border-radius: 50%;
            pointer-events: none;
            z-index: -1;
            animation: float 10s infinite ease-in-out;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-100vh) translateX(50px);
                opacity: 0;
            }
        }

        /* Header Styles */
        header {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-glow);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
            animation: slideDown 0.6s ease-out;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(102, 126, 234, 0.5);
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
            filter: brightness(1.2);
        }

        .nav-link {
            color: var(--text-secondary) !important;
            position: relative;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary-gradient);
            transform: translateX(-50%);
            transition: width 0.3s ease;
        }

        .nav-link:hover {
            color: var(--text-primary) !important;
            transform: translateY(-2px);
        }

        .nav-link:hover::before {
            width: 80%;
        }

        .nav-link.active {
            color: var(--text-primary) !important;
            background: var(--glass-bg);
            border-radius: 8px;
            box-shadow: var(--shadow-glow);
        }

        /* Main Content */
        main {
            padding: 2rem 0;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Card Styles */
        .card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-glow);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .card:hover::before {
            left: 100%;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 48px rgba(102, 126, 234, 0.4);
            border-color: rgba(102, 126, 234, 0.6);
        }

        .card-header {
            background: var(--primary-gradient) !important;
            border: none !important;
            padding: 1.2rem 1.5rem !important;
            position: relative;
            overflow: hidden;
        }

        .card-header::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transform: skewX(-20deg) translateX(100%);
            transition: transform 0.6s ease;
        }

        .card:hover .card-header::after {
            transform: skewX(-20deg) translateX(-200%);
        }

        /* Button Styles */
        .btn {
            position: relative;
            overflow: hidden;
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            z-index: 1;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
            z-index: -1;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary {
            background: var(--primary-gradient);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .btn-success {
            background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.4);
        }

        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(34, 197, 94, 0.6);
        }

        .btn-danger {
            background: var(--secondary-gradient);
            box-shadow: 0 4px 15px rgba(245, 87, 108, 0.4);
        }

        .btn-info {
            background: var(--accent-gradient);
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.4);
        }

        .btn-sm {
            padding: 0.4rem 1rem;
            font-size: 0.875rem;
        }

        /* Table & Other Styles */
        .table-responsive {
            border-radius: 12px;
            overflow-x: auto;
            margin-bottom: 1rem;
            position: relative;
            padding-bottom: 0.5rem;
            border: 1px solid var(--border-glow);
            background: var(--card-bg);
        }

        .table {
            color: var(--text-primary) !important;
            margin-bottom: 0;
            min-width: 800px;
            border-collapse: collapse;
            background: transparent;
        }

        .table thead {
            background: var(--primary-gradient);
            position: relative;
        }

        .table thead th {
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            border-top: none !important;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 1rem !important;
            color: #ffffff !important;
            background: transparent !important;
        }

        .table tbody tr {
            background: rgba(15, 23, 42, 0.4) !important;
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: rgba(102, 126, 234, 0.15) !important;
            transform: scale(1.01);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .table tbody td {
            padding: 1rem !important;
            vertical-align: middle !important;
            border: 1px solid rgba(102, 126, 234, 0.2) !important;
            color: #e2e8f0 !important;
            background: transparent !important;
        }

        .badge {
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 600;
            letter-spacing: 0.5px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.8;
            }
        }

        .form-control,
        .form-select {
            background: var(--glass-bg);
            border: 1px solid var(--border-glow);
            color: var(--text-primary);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(102, 126, 234, 0.6);
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            color: var(--text-primary);
        }

        /* Dropdown Menu Customization */
        .dropdown-menu {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-glow);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .dropdown-item {
            color: var(--text-primary);
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background: rgba(102, 126, 234, 0.2);
            color: white;
        }

        .dropdown-divider {
            border-top: 1px solid var(--border-glow);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card {
                margin-bottom: 1.5rem;
            }

            .table {
                font-size: 0.875rem;
            }
        }
    </style>
</head>

<body>
    <script>
        for (let i = 0; i < 20; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 10 + 's';
            particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
            document.body.appendChild(particle);
        }
    </script>

    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        <i class="bi bi-stars"></i> SHEMSTARTUP
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto align-items-center">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                    href="{{ route('dashboard') }}">
                                    <i class="bi bi-speedometer2"></i> Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}"
                                    href="{{ route('employees.index') }}">
                                    <i class="bi bi-people-fill"></i> Employees
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}"
                                    href="{{ route('departments.index') }}">
                                    <i class="bi bi-building"></i> Departments
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('positions.*') ? 'active' : '' }}"
                                    href="{{ route('positions.index') }}">
                                    <i class="bi bi-briefcase-fill"></i> Positions
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('attendances.*') ? 'active' : '' }}"
                                    href="{{ route('attendances.index') }}">
                                    <i class="bi bi-calendar-check"></i> Attendance
                                </a>
                            </li>

                            <li class="nav-item">
                                @if(Auth::user()->role === 'admin')
                                    <a class="nav-link {{ request()->routeIs('salaries.*') ? 'active' : '' }}"
                                        href="{{ route('salaries.index') }}">
                                        <i class="bi bi-cash-coin"></i> Salary
                                    </a>
                                @else
                                    <a class="nav-link {{ request()->routeIs('salaries.*') ? 'active' : '' }}"
                                        href="{{ route('salaries.me') }}">
                                        <i class="bi bi-cash-coin"></i> Salary
                                    </a>
                                @endif
                            </li>

                            <li class="nav-item dropdown ms-lg-2">
                                <a class="nav-link dropdown-toggle btn btn-sm border-0 d-flex align-items-center"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                            <i class="bi bi-person"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="bi bi-box-arrow-right"></i> Log Out
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main class="container my-4">
        @yield('content')
    </main>

    <footer class="text-center">
        <div class="container">
            <p class="mb-0">
                <i class="bi bi-code-slash"></i>
                &copy; {{ date('Y') }} SHEMSTARTUP - Futuristic Employee Management System
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scroll animation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Add animation on scroll
        const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -100px 0px' };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.6s ease-out forwards';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.card, .table-responsive').forEach(el => { observer.observe(el); });
    </script>
</body>

</html>