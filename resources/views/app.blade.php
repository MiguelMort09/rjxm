<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Miguel Mort - Desarrollo Web y Soluciones TI') }}</title>
    <meta name="description" content="{{ 'Contenido técnico y soluciones personalizadas en desarrollo web' }}">
    <meta property="og:image" content="{{ asset('images/default-og-image.jpg') }}">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.ts', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>
<body class="font-sans antialiased w-full">
@inertia
</body>
</html>
