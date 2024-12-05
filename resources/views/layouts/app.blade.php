<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @isset($header)
            {{ Str::ucfirst($header) . ' | ' . env('APP_NAME') }}
        @else
            {{ env('APP_NAME') }}
        @endisset
    </title>
    <link rel="shortcut icon" href="{{ asset('image/logo.svg') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('style')
</head>

<body class="bg-body-tertiary">
    <section class="container my-5">
        <header class="row mb-3">
            <div class="col-sm-6">
                @isset($header)
                    <h3>
                        {{ Str::ucfirst($header) }}
                    </h3>
                @endisset
            </div>
        </header>

        <main class="row">
            <div class="col">
                {{ $slot }}
            </div>
        </main>
    </section>

    @stack('scripts')
</body>

</html>
