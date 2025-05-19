<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación Laravel</title>
    <!-- Puedes incluir CSS aquí -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Mi Aplicación</h1>
        <!-- Aquí puedes poner menú de navegación, por ejemplo -->
    </header>

    <main>
        {{-- Aquí se inserta el contenido de cada vista --}}
        @yield('content')
    </main>

    <footer>
        <p>Derechos reservados &copy; {{ date('Y') }}</p>
    </footer>

    <!-- Puedes incluir scripts JS aquí -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
