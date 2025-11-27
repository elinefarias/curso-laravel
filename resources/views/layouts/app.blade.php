<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Meu Sistema')</title>
    <meta name="description" content="Painel do sistema">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { background-color: #f8fafc; } </style>
</head>
<body class="antialiased text-gray-800">

    <header class="bg-gradient-to-r from-emerald-600 to-teal-500 text-white shadow-sm">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center gap-3 text-lg font-semibold text-white">Meu Sistema</a>

            <nav aria-label="Principal">
                <ul class="flex items-center gap-2 text-sm">
                    <li><a href="{{ route('home')}}" class="px-3 py-2 rounded-md text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white">Home</a></li>
                    <li><a href="{{ route('products')}}" class="px-3 py-2 rounded-md text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white">Produtos</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-8">
        @yield('content')
    </main>

</body>
</html>
