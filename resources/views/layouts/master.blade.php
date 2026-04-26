<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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

        .container {
            padding: 2rem;
        }

        .card {
            background: var(--card-white);
            border: 1px solid var(--border-soft);
            border-radius: 12px;
            padding: 20px;
        }

        .btn {
            background: var(--nova-red);
            color: white;
            padding: 10px 14px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>

<body>

<div class="container">
    @yield('content')
</div>

</body>
</html>