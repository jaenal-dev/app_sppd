<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <meta charset="UTF-8"> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('') }}vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('') }}vendor/perfect-scrollbar/css/perfect-scrollbar.css">
    {{-- <link rel="stylesheet" href="{{ asset('') }}assets/css/bootstrap-override.min.css"> --}}
</head>

<body>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>

    <div id="app">
        <div class="content-wrapper">
            @include('layouts.kopsurat')
            <div class="container p-4">
                @include('layouts.judul')
                @yield('surat')
            </div>
        </div>
    </div>
    <script src="{{ asset('') }}vendor/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="{{ asset('') }}vendor/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
</body>

</html>
