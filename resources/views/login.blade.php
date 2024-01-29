<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h2>Login</h2>

    @if(isset(Auth::user()->email))
        <script>window.location="/home";</script>
    @endif

    @if ($message = Session::get('error'))
    <div >
        <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
   @endif

    <form action="{{ url('/checklogin') }}" method="POST">
        @csrf
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Password: <input type="password" name="password" required></label><br>
        <button type="submit" name="login">Login</button>
    </form>

    <form action="{{ url('/signup') }}" method="GET">
        @csrf
        <button type="submit" name="signup">Signup</button>
    </form>


</body>
</html>