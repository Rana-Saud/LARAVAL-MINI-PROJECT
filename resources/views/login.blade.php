<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!---Custom CSS File--->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <section class="container">
        <header>LogIn Form</header>
        @include('layouts/messages')
        <form action="{{ url('login') }}" method="POST" class="form">
            @csrf
            <div class="input-box">
                <label>Email</label>
                <input type="email" placeholder="Enter Your Email" name="email" required />
            </div>

            <div class="input-box">
                <label>Password</label>
                <input type="password" placeholder="Enter Your Password" name="password" required />
            </div>
            <button type="submit">Submit</button>
        </form>
        <p>Not Have An Account? <a href="{{ url('/signup') }}">Signup now</a></p>
    </section>
</body>

</html>
