<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Pegawai')</title>
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

        /* Table Styles */
        .table-responsive {
            border-radius: 12px;
            overflow-x: auto;
            overflow-y: visible;
            -webkit-overflow-scrolling: touch;
            margin-bottom: 1rem;
            position: relative;
            background: transparent;
            padding-bottom: 0.5rem;
        }

        /* Custom Scrollbar untuk Table - Lebih Visible */
        .table-responsive::-webkit-scrollbar {
            height: 12px;
            background: rgba(15, 23, 42, 0.5);
        }

        .table-responsive::-webkit-scrollbar-track {
            background: rgba(15, 23, 42, 0.8);
            border-radius: 10px;
            margin: 0 10px;
            border: 2px solid rgba(102, 126, 234, 0.2);
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 10px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 10px rgba(102, 126, 234, 0.5);
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            box-shadow: 0 0 15px rgba(102, 126, 234, 0.8);
        }

        .table {
            color: var(--text-primary) !important;
            margin-bottom: 0;
            min-width: 800px;
            border-collapse: separate;
            border-spacing: 0;
            background: transparent;
        }

        /* Table Header */
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
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            position: relative;
            background: transparent !important;
        }

        .table thead th:first-child {
            border-left: none !important;
            border-top-left-radius: 12px;
        }

        .table thead th:last-child {
            border-right: none !important;
            border-top-right-radius: 12px;
        }

        /* Table Body Rows */
        .table tbody tr {
            background: rgba(15, 23, 42, 0.4) !important;
            transition: all 0.3s ease;
            position: relative;
        }

        .table tbody tr::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: var(--primary-gradient);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .table tbody tr:hover {
            background: rgba(102, 126, 234, 0.15) !important;
            transform: scale(1.01);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .table tbody tr:hover::before {
            opacity: 1;
        }

        /* Zebra striping */
        .table-striped tbody tr:nth-of-type(odd) {
            background: rgba(15, 23, 42, 0.6) !important;
        }

        .table-striped tbody tr:nth-of-type(even) {
            background: rgba(15, 23, 42, 0.3) !important;
        }

        .table-striped tbody tr:hover {
            background: rgba(102, 126, 234, 0.2) !important;
        }

        /* Table Cells */
        .table tbody td {
            padding: 1rem !important;
            vertical-align: middle !important;
            border: 1px solid rgba(102, 126, 234, 0.2) !important;
            color: #e2e8f0 !important;
            position: relative;
            transition: all 0.2s ease;
            background: transparent !important;
        }

        .table tbody td:first-child {
            font-weight: 600;
            color: #a78bfa !important;
        }

        /* Hover effect pada cell */
        .table tbody tr:hover td {
            border-color: rgba(102, 126, 234, 0.4) !important;
            color: #ffffff !important;
        }

        /* Corner borders untuk last row */
        .table tbody tr:last-child td:first-child {
            border-bottom-left-radius: 12px;
        }

        .table tbody tr:last-child td:last-child {
            border-bottom-right-radius: 12px;
        }

        /* Empty table message */
        .table tbody td[colspan] {
            text-align: center !important;
            padding: 2rem !important;
            border: 2px dashed rgba(245, 87, 108, 0.5) !important;
            background: rgba(245, 87, 108, 0.1) !important;
            border-radius: 8px;
            color: #fb7185 !important;
        }

        /* Remove conflicting Bootstrap styles */
        .table-dark,
        .table-bordered thead th,
        .table-hover tbody tr:hover {
            background: transparent !important;
        }

        /* Action buttons in table */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
        }

        .action-buttons .btn {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }

        .action-buttons form {
            margin: 0;
            display: inline-block;
        }

        /* Badge Styles */
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

        /* Form Styles */
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

        .form-label {
            color: var(--text-secondary);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        /* Detail Page Styles */
        .card-body strong {
            color: var(--text-secondary);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card-body p {
            color: var(--text-primary);
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }

        .card-body .fs-5 {
            color: var(--text-primary) !important;
            font-weight: 500;
        }

        /* Row and Column text colors */
        .row .col-md-6 strong,
        .row .col-md-6 p,
        .mb-3 strong,
        .mb-3 p {
            color: var(--text-primary);
        }

        .mb-3 strong {
            color: var(--text-secondary);
        }

        /* Alert Styles */
        .alert {
            border-radius: 12px;
            border: none;
            backdrop-filter: blur(10px);
            animation: slideInRight 0.5s ease-out;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.2);
            color: #4ade80;
            border-left: 4px solid #22c55e;
        }

        .alert-danger {
            background: rgba(245, 87, 108, 0.2);
            color: #fb7185;
            border-left: 4px solid #f5576c;
        }

        /* Footer */
        footer {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-top: 1px solid var(--border-glow);
            padding: 1.5rem 0;
            margin-top: 3rem;
        }

        /* Pagination */
        .pagination {
            gap: 0.5rem;
        }

        .page-link {
            background: var(--glass-bg);
            border: 1px solid var(--border-glow);
            color: var(--text-primary);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .page-link:hover {
            background: var(--primary-gradient);
            border-color: transparent;
            color: white;
            transform: translateY(-2px);
        }

        .page-item.active .page-link {
            background: var(--primary-gradient);
            border-color: transparent;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--dark-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }

        /* Loading Animation */
        .loader {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(102, 126, 234, 0.3);
            border-top: 4px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 2rem auto;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
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
    <!-- Floating Particles -->
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <i class="bi bi-stars"></i> SHEMSTARTUP
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('employees*') ? 'active' : '' }}"
                                    href="{{ route('employees.index') }}">
                                    <i class="bi bi-people-fill"></i> Employee
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('departments*') ? 'active' : '' }}"
                                    href="{{ route('departments.index') }}">
                                    <i class="bi bi-building"></i> Department
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('positions*') ? 'active' : '' }}"
                                    href="{{ route('positions.index') }}">
                                    <i class="bi bi-briefcase-fill"></i> Jabatan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('attendances*') ? 'active' : '' }}"
                                    href="{{ route('attendances.index') }}">
                                    <i class="bi bi-calendar-check"></i> Attendance
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('salaries*') ? 'active' : '' }}"
                                    href="{{ route('salaries.index') }}">
                                    <i class="bi bi-cash-coin"></i> Salary
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="bi bi-gear-fill"></i> Settings
                                </a>
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
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.6s ease-out forwards';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.card, .table-responsive').forEach(el => {
            observer.observe(el);
        });


    </script>
</body>

</html>