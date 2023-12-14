<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Crud Laravel | @yield('title')</title>
    <meta name="description" content="@yield('description')" />
</head>

<body>
    @include('includes.header')

    <main>
        @yield('content')
    </main>

    <script src="{{ asset('js/main.js') }}" type="module"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
</body>

</html>
