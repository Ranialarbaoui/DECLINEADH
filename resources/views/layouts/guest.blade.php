<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Ajoute ici tes liens CSS (tailwind, bootstrap, etc.) -->
</head>
<body>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
        {{ $slot }}
    </div>
</body>
</html>
