<!DOCTYPE html>
<html lang="pt-BR" data-theme="chronoTrigger">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - Chirper' : 'Chirper' }}</title>
    <link rel="preconnect" href="<https://fonts.bunny.net>">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=press-start-2p|vt323" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-base-200">
    <nav class="navbar bg-base-100">
        <div class="navbar-start">
            <a href="/" class="btn btn-ghost text-xl">
                <img src="{{ asset('images/chrono-trigger/snes-removebg.png') }}"
                     alt="Controle de Super Nintendo"
                     class="h-7 w-auto inline-block align-middle">
                <span class="hidden sm:inline">Pensamentos</span>
            </a>
        </div>
        <div class="navbar-center hidden md:flex">
            <div class="navbar-party-frame">
                <img src="{{ asset('images/chrono-trigger/party-lineup.png') }}"
                     alt="Grupo de heróis de Chrono Trigger"
                     class="navbar-party">
            </div>
        </div>
        <div class="navbar-end gap-2">
            @auth
                <span class="text-sm">✦ {{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="btn btn-ghost btn-sm">Sair</button>
                </form>
            @else
                <a href="/login" class="btn btn-ghost btn-sm">Entrar</a>
                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Inscrever-se</a>
            @endauth
        </div>
    </nav>
    <!-- Success Toast -->
    @if (session('success'))
        <div class="toast toast-top toast-center">
            <div class="alert alert-success animate-fade-out">
                <svg xmlns="<http://www.w3.org/2000/svg>" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <main class="flex-1 container mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <footer class="footer footer-center p-5 bg-base-300 text-base-content text-xs">
        <div>
            <p>© 2026 Primeiro Projeto - Feito com Laravel - Daniel Moraes!</p>
        </div>
    </footer>
</body>

</html>