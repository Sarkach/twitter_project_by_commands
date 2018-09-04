<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="HandheldFriendly" content="true">
    <meta name="MobileOptimized" content="width">
    <meta name="viewport"
                content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('access')</title>

    {{-- Подключаем partials/bootstrap.blade.php --}}
    @include('partials.bootstrap')

    {{-- Выводим стек со стилями CSS --}}
    @stack('styles')

    {{-- Выводим стек со сценариями JavaScript --}}
    @stack('scripts')
</head>
<body>
    @yield('main')

    @if (Session::has('message'))
        {{-- Всплывающие сообщения. --}}
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif

    @if ($errors->count())
        {{-- Перечень ошибок. --}}
        <div class="alert alert-danger">
            {{ Html::ul($errors->all()) }}
        </div>
    @endif
</body>
</html>