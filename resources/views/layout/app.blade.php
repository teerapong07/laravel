<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Name - @yield('title')</title>
</head>
<body>
    @section('sidebar')
        Master Sidebar
    @show

    <div class="container">
        @yield('content')
    </div>
</body>
</html>

