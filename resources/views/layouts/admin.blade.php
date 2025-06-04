<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parkew's Bank - @yield('title')</title>
</head>
<body>
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        @yield('footer')
        <footer>
            <center>
                <p>&copy; 2025 Parkew's Bank. Todos os direitos reservados.</p>
                <p>Desenvolvido por Parkew.</p
        <   /center>
        </footer>
    </div>
</body>
</html>