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
    --primary-gradient: linear-gradient(135deg, #4c6ef5 0%, #5f3dc4 100%);
    --secondary-gradient: linear-gradient(135deg, #1e293b 0%, #334155 100%);
    --success-gradient: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
    --danger-gradient: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
    --accent-gradient: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
    --neon-blue: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);
    --dark-bg: #0a0e27;
    --card-bg: rgba(15, 23, 42, 0.85);
    --glass-bg: rgba(255, 255, 255, 0.05);
    --text-primary: #ffffff;
    --text-secondary: #cbd5e1;
    --border-color: rgba(71, 85, 105, 0.5);
    --border-glow: rgba(99, 102, 241, 0.3);
    --shadow-glow: 0 0 30px rgba(99, 102, 241, 0.4);
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

/* PERBAIKAN FONT */
.text-secondary,
.text-muted {
    color: var(--text-secondary) !important;
}

h1, h2, h3, h4, h5, h6 {
    color: var(--text-primary) !important;
}

/* Animated Background dengan efek subtle */
body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background:
        radial-gradient(circle at 20% 30%, rgba(99, 102, 241, 0.08) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(59, 130, 246, 0.08) 0%, transparent 50%),
        radial-gradient(circle at 50% 50%, rgba(139, 92, 246, 0.06) 0%, transparent 50%);
    z-index: -1;
    animation: bgShift 20s ease infinite;
}

@keyframes bgShift {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    33% {
        transform: translateY(-30px) rotate(2deg);
    }
    66% {
        transform: translateY(-15px) rotate(-1deg);
    }
}

/* Floating particles dengan warna blue subtle */
.particle {
    position: fixed;
    width: 3px;
    height: 3px;
    background: linear-gradient(135deg, #60a5fa, #818cf8);
    border-radius: 50%;
    pointer-events: none;
    z-index: -1;
    animation: float 15s infinite ease-in-out;
    box-shadow: 0 0 8px rgba(96, 165, 250, 0.5);
}

@keyframes float {
    0%, 100% {
        transform: translateY(0) translateX(0) scale(1);
        opacity: 0;
    }
    10% {
        opacity: 1;
    }
    50% {
        transform: translateY(-50vh) translateX(30px) scale(1.5);
        opacity: 0.8;
    }
    90% {
        opacity: 0.3;
    }
    100% {
        transform: translateY(-100vh) translateX(80px) scale(0.5);
        opacity: 0;
    }
}

/* Header Styles dengan glassmorphism */
header {
    background: rgba(15, 23, 42, 0.8);
    backdrop-filter: blur(30px) saturate(180%);
    border-bottom: 1px solid var(--border-color);
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 8px 40px rgba(0, 0, 0, 0.4);
    animation: slideDown 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
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
    font-weight: 800;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
}

.navbar-brand::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 0;
    height: 3px;
    background: var(--primary-gradient);
    transition: width 0.4s ease;
    box-shadow: 0 0 10px rgba(99, 102, 241, 0.5);
}

.navbar-brand:hover {
    transform: scale(1.05) translateY(-2px);
    filter: brightness(1.2);
}

.navbar-brand:hover::after {
    width: 100%;
}

.nav-link {
    color: var(--text-secondary) !important;
    position: relative;
    padding: 0.5rem 1rem !important;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
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
    transition: width 0.4s ease;
    box-shadow: 0 0 10px rgba(99, 102, 241, 0.6);
}

.nav-link::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.1), transparent);
    transition: left 0.6s ease;
}

.nav-link:hover {
    color: #818cf8 !important;
    transform: translateY(-2px);
}

.nav-link:hover::before {
    width: 80%;
}

.nav-link:hover::after {
    left: 100%;
}

.nav-link.active {
    color: #a5b4fc !important;
    background: rgba(99, 102, 241, 0.15);
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(99, 102, 241, 0.2);
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

/* Card Styles dengan dark theme */
.card {
    background: rgba(15, 23, 42, 0.9);
    backdrop-filter: blur(25px) saturate(180%);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    overflow: hidden;
    position: relative;
}

.card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -150%;
    width: 150%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.1), transparent);
    transition: left 0.8s ease;
}

.card:hover::before {
    left: 150%;
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6), 
                0 0 0 1px rgba(99, 102, 241, 0.3);
    border-color: rgba(99, 102, 241, 0.5);
}

.card-header {
    background: var(--secondary-gradient) !important;
    border: none !important;
    padding: 1.5rem !important;
    position: relative;
    overflow: hidden;
}

.card-header::after {
    content: '';
    position: absolute;
    top: 0;
    right: -50%;
    width: 50%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.05), transparent);
    transform: skewX(-25deg);
    transition: right 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.card:hover .card-header::after {
    right: 150%;
}

/* Button Styles dengan dark theme */
.btn {
    position: relative;
    overflow: hidden;
    border: none;
    border-radius: 10px;
    padding: 0.7rem 1.6rem;
    font-weight: 600;
    letter-spacing: 0.3px;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    z-index: 1;
    font-size: 0.9rem;
}

.btn::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
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
    box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
    color: #ffffff;
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(99, 102, 241, 0.5);
}

.btn-success {
    background: var(--success-gradient);
    box-shadow: 0 4px 15px rgba(14, 165, 233, 0.3);
    color: #ffffff;
}

.btn-success:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(14, 165, 233, 0.5);
}

.btn-danger {
    background: var(--danger-gradient);
    box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
    color: #ffffff;
}

.btn-danger:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(220, 38, 38, 0.5);
}

.btn-info {
    background: var(--accent-gradient);
    box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
    color: #ffffff;
}

.btn-info:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(99, 102, 241, 0.5);
}

.btn-secondary {
    background: var(--secondary-gradient);
    box-shadow: 0 4px 15px rgba(51, 65, 85, 0.3);
    color: #cbd5e1;
}

.btn-secondary:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(51, 65, 85, 0.5);
}

.btn-sm {
    padding: 0.5rem 1rem;
    font-size: 0.85rem;
}

/* Table dengan dark theme */
.table-responsive {
    border-radius: 12px;
    overflow-x: auto;
    margin-bottom: 1rem;
    position: relative;
    padding-bottom: 0.5rem;
    border: 1px solid var(--border-color);
    background: rgba(15, 23, 42, 0.7);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

.table {
    color: var(--text-primary) !important;
    margin-bottom: 0;
    min-width: 800px;
    border-collapse: separate;
    border-spacing: 0 6px;
    background: transparent;
}

.table thead {
    background: var(--secondary-gradient);
    position: relative;
}

.table thead th {
    border: none !important;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 1rem !important;
    color: #e2e8f0 !important;
    background: transparent !important;
    font-size: 0.85rem;
}

.table tbody tr {
    background: rgba(30, 41, 59, 0.4) !important;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border-radius: 8px;
}

.table tbody tr:hover {
    background: rgba(51, 65, 85, 0.5) !important;
    transform: translateX(5px);
    box-shadow: -3px 0 0 0 rgba(99, 102, 241, 0.8), 0 4px 15px rgba(0, 0, 0, 0.3);
}

.table tbody td {
    padding: 1rem !important;
    vertical-align: middle !important;
    border: none !important;
    color: var(--text-secondary) !important;
    background: transparent !important;
}

.badge {
    padding: 0.4rem 0.9rem;
    border-radius: 20px;
    font-weight: 600;
    letter-spacing: 0.5px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    font-size: 0.8rem;
}

.form-control,
.form-select {
    background: rgba(30, 41, 59, 0.6);
    backdrop-filter: blur(10px);
    border: 1px solid var(--border-color);
    color: var(--text-primary);
    border-radius: 10px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.form-control:focus,
.form-select:focus {
    background: rgba(30, 41, 59, 0.8);
    border-color: rgba(99, 102, 241, 0.6);
    box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.15);
    color: var(--text-primary);
}

/* Dropdown Menu dark theme */
.dropdown-menu {
    background: rgba(30, 41, 59, 0.95);
    backdrop-filter: blur(30px) saturate(180%);
    border: 1px solid var(--border-color);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
    border-radius: 12px;
    animation: dropdownSlide 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

@keyframes dropdownSlide {
    from {
        opacity: 0;
        transform: translateY(-15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.dropdown-item {
    color: var(--text-secondary);
    transition: all 0.2s ease;
    border-radius: 6px;
    margin: 4px 6px;
    padding: 0.6rem 1rem;
}

.dropdown-item:hover {
    background: rgba(99, 102, 241, 0.15);
    color: #a5b4fc;
    transform: translateX(5px);
}

.dropdown-divider {
    border-top: 1px solid var(--border-color);
}

/* Alert dengan dark theme */
.alert {
    border-radius: 12px;
    border: 1px solid;
    backdrop-filter: blur(20px);
    animation: alertSlide 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
}

@keyframes alertSlide {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.alert::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: currentColor;
}

.alert-success {
    background: rgba(14, 165, 233, 0.1);
    border-color: rgba(14, 165, 233, 0.4);
    color: #7dd3fc;
}

.alert-danger {
    background: rgba(220, 38, 38, 0.1);
    border-color: rgba(220, 38, 38, 0.4);
    color: #fca5a5;
}

/* Pagination dengan dark theme */
.pagination .page-link {
    background: rgba(30, 41, 59, 0.6);
    border: 1px solid var(--border-color);
    color: var(--text-secondary);
    transition: all 0.3s ease;
    margin: 0 4px;
    border-radius: 8px;
}

.pagination .page-link:hover {
    background: rgba(99, 102, 241, 0.2);
    border-color: rgba(99, 102, 241, 0.5);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
}

.pagination .page-item.active .page-link {
    background: var(--primary-gradient);
    border-color: rgba(99, 102, 241, 0.8);
    box-shadow: 0 0 20px rgba(99, 102, 241, 0.4);
}

/* Loading animation */
@keyframes shimmer {
    0% {
        background-position: -1000px 0;
    }
    100% {
        background-position: 1000px 0;
    }
}

/* Scrollbar dark theme */
::-webkit-scrollbar {
    width: 10px;
    height: 10px;
}

::-webkit-scrollbar-track {
    background: rgba(30, 41, 59, 0.5);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: var(--primary-gradient);
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(99, 102, 241, 0.4);
}

::-webkit-scrollbar-thumb:hover {
    background: var(--accent-gradient);
    box-shadow: 0 0 15px rgba(99, 102, 241, 0.6);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card {
        margin-bottom: 1.5rem;
    }

    .table {
        font-size: 0.875rem;
    }

    .navbar-brand {
        font-size: 1.2rem;
    }

    .btn {
        padding: 0.6rem 1.2rem;
        font-size: 0.75rem;
    }
}

/* Action buttons layout */
.action-buttons {
    display: flex;
    gap: 8px;
    justify-content: center;
    align-items: center;
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