<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('css-view')

</head>
<body>
    
    @include('templates.header')
    @include('templates.menu-lateral')
    <article id="content-view">
        @yield('content-view')
    </article>

    @yield('js-view')
    <script src="{{asset('js/jquery.js') }}"></script>
    <script src="{{asset('js/main.js') }}"></script>
</body>
</html>