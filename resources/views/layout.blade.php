<!DOCTYPE html>
<html>
<head>
 
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

       
    <title>Auth & Product System</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
           <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    @if(Auth::check())
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout ({{ Auth::user()->name }})</button>
        </form>
    @endif

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    @yield('content')
</div>
</body>
</html>
