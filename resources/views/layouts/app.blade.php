<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href=" {!! URL::asset('/node_modules/font-awesome/css/font-awesome.min.css')!!}" />
    <link rel="stylesheet" href=" {!! URL::asset('/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')  !!}"/>
    <link rel="stylesheet" href=" {!! URL::asset('/css/style.css')!!}" />
    <link rel="shortcut icon" href="{!! URL::asset('images/favicon.png') !!}" />

    <title>{{ config('app.name', 'SIMIK') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

        @yield('content')


    <!-- Scripts -->
    <script src="{!! URL::asset('node_modules/jquery/dist/jquery.min.js') !!}"></script>
    <script src="{!! URL::asset('node_modules/popper.js/dist/umd/popper.min.js') !!}"></script>
    <script src="{!! URL::asset('node_modules/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <script src="{!! URL::asset('node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') !!}"></script>
    <script src="{!! URL::asset('js/misc.js') !!}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
