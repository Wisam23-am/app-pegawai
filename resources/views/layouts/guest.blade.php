<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* MENGGUNAKAN CSS DARI MASTER.BLADE.PHP */
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

        /* Animated Background (Sama dengan Master) */
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

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            33% {
                transform: translateY(-30px) rotate(2deg);
            }

            66% {
                transform: translateY(-15px) rotate(-1deg);
            }
        }

        /* Particle Animation (Sama dengan Master) */
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

            0%,
            100% {
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

        /* Auth Card (Diadaptasi dari gaya .card di Master) */
        .auth-card {
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(25px) saturate(180%);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            padding: 2rem;
            width: 100%;
            max-width: 450px;
            animation: fadeInUp 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }

        /* Efek Shine pada Card (Sama dengan Master) */
        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -150%;
            width: 150%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.1), transparent);
            transition: left 0.8s ease;
        }

        .auth-card:hover::before {
            left: 150%;
        }

        .auth-card:hover {
            border-color: rgba(99, 102, 241, 0.5);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6), 0 0 0 1px rgba(99, 102, 241, 0.3);
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

        /* Form Controls (Diadaptasi dari Master) */
        .form-control {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(30, 41, 59, 0.8);
            border-color: rgba(99, 102, 241, 0.6);
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.15);
            color: var(--text-primary);
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

        /* Input Group Customization */
        .input-group-text {
            border: 1px solid var(--border-color);
            background: rgba(30, 41, 59, 0.6);
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

        .input-group:focus-within .input-group-text,
        .input-group:focus-within .form-control {
            border-color: rgba(99, 102, 241, 0.6);
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.15);
            color: var(--text-primary);
        }

        /* Buttons (Diadaptasi dari Master .btn dan .btn-primary) */
        .btn-primary {
            position: relative;
            overflow: hidden;
            background: var(--primary-gradient);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            letter-spacing: 0.3px;
            width: 100%;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
            z-index: 1;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.5);
        }

        .btn-primary::before {
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

        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }

        /* Links & Logo */
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
            color: #818cf8;
            /* Light indigo accent */
            text-decoration: underline;
        }

        /* Text colors */
        .text-secondary,
        .text-muted {
            color: var(--text-secondary) !important;
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