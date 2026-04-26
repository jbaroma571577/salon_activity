<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon System</title> @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --nova-red: #f33f44;
            --nova-black: #1e293b;
            --bg-light: #f1f5f9;
            --card-white: #ffffff;
            --border-soft: #e2e8f0;
        }

        body {
            margin: 0;
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background: var(--bg-light);
            color: var(--nova-black);
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: var(--nova-red);
            color: white;
            padding: 2rem 0;
        }

        /* GIBALIN NAKO NGA SIMPLE TEXT RA */
        .sidebar .brand {
            padding: 0 1.5rem;
            margin-bottom: 2rem;
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar a {
            display: block;
            padding: 0.85rem 1.5rem;
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            transition: 0.2s;
            font-size: 0.95rem;
        }

        .sidebar a:hover {
            background: rgba(0,0,0,0.15);
            padding-left: 1.8rem;
        }

        .sidebar a.active {
            background: rgba(0,0,0,0.25);
            font-weight: bold;
            border-left: 5px solid white; /* Added para mas klaro ang active */
        }

        /* MAIN FIXED SPACING */
        .main-content {
            margin-left: 260px;
            padding: 30px;
        }

        /* HEADER */
        .header-card {
            background: var(--card-white);
            border: 1px solid var(--border-soft);
            border-radius: 12px;
            padding: 20px 25px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }

        .header-card h2 {
            margin: 0;
            font-size: 1.25rem;
            color: var(--nova-black);
        }

        /* CONTENT */
        .data-card {
            background: var(--card-white);
            border: 1px solid var(--border-soft);
            border-radius: 12px;
            padding: 25px;
            min-height: 400px; /* Para dili kaayo mubo tan-awon */
        }

        /* BUTTON */
        .btn,
        a.btn,
        button {
            background: var(--nova-red);
            color: white;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn:hover {
            opacity: 0.85;
            transform: translateY(-1px);
        }

    </style>
</head>

<body>

<div class="sidebar">
    <div class="brand">SALON</div> 

    <a href="{{ route('dashboard') }}"
       class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
        Dashboard
    </a>

    <a href="{{ route('services.index') }}"
       class="{{ request()->routeIs('services.*') ? 'active' : '' }}">
        Services
    </a>

    <a href="{{ route('appointments.index') }}"
       class="{{ request()->routeIs('appointments.*') ? 'active' : '' }}">
        Appointments
    </a>

    <a href="{{ route('payments.index') }}"
       class="{{ request()->routeIs('payments.*') ? 'active' : '' }}">
        Payments
    </a>

    <form method="POST" action="{{ route('logout') }}" style="margin-top: 2rem; padding: 0 1.5rem;">
        @csrf
        <button type="submit" style="background: rgba(0,0,0,0.2); width: 100%; text-align: left; font-size: 0.8rem;">
            Logout
        </button>
    </form>
</div>

<div class="main-content">

    <div class="header-card">
        <h2>@yield('title')</h2>
        <div style="font-weight: 600; color: #64748b;">
            {{ auth()->user()->name ?? 'Guest' }}
        </div>
    </div>

    <div class="data-card">
        @yield('content')
    </div>

</div>

</body>
</html>