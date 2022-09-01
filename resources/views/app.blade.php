<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Table</title>
    @vite([
        'resources/sass/app.scss', 
        'resources/js/app.js', 
        'resources/js/pusher.min.js', 
        'resources/js/jquery-3.6.1.min.js'
        ])
</head>

<body>
    @yield('content')


    @yield('script')
</body>

</html>