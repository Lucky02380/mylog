<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div>
        <h1>Dashboard</h1>
        @if(isset(Auth::user()->email))
        <div >
            <strong>Welcome {{ Auth::user()->email }}</strong>
            <br />
            <a href="{{ url('/home/logout') }}">Logout</a>
        </div>
        @else
        <script>window.location = "/";</script>
        @endif
    </div>
</body>
</html>