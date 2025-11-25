<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

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

        body {
            font-family: 'Figtree', 'Segoe UI', sans-serif;
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

        /* Card Styles */
        .auth-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-glow);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            padding: 2rem;
            width: 100%;
            max-width: 450px;
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

        /* Form Controls */
        .form-control {
            background: var(--glass-bg);
            border: 1px solid var(--border-glow);
            color: var(--text-primary);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(102, 126, 234, 0.6);
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            color: white;
        }

        .form-control::placeholder {
            color: var(--text-secondary);
            opacity: 0.7;
        }

        .form-label {
            color: var(--text-secondary);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        /* Input Group Customization (untuk ikon amplop menyatu) */
        .input-group-text {
            border: 1px solid var(--border-glow);
            background: var(--glass-bg);
            color: var(--text-secondary);
            border-right: none;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .input-group .form-control {
            border-left: none;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .input-group .form-control:focus {
            box-shadow: none;
            border-color: rgba(102, 126, 234, 0.6);
        }

        .input-group:focus-within .input-group-text,
        .input-group:focus-within .form-control {
            border-color: rgba(102, 126, 234, 0.6);
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            color: white;
        }

        /* Buttons */
        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .brand-logo {
            font-size: 2rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
            margin-bottom: 2rem;
            display: block;
            text-decoration: none;
        }

        .auth-links a {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .auth-links a:hover {
            color: #fff;
            text-decoration: underline;
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

    <div class="min-vh-100 d-flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            {{ $slot }}
        </div>
    </div>
</body>

</html>