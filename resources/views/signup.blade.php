<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SignUp Form</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <section class="container">
        <header>SignUp Form</header>
        <form action="{{ url('signup') }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            <div class="input-box address">
                <div class="column">
                    <div>
                        <label>First Name</label>
                        <input type="text" name="first_name" placeholder="Enter First Name"
                            class="@error('first_name') is-invalid @enderror" required />
                        @error('first_name')
                            <div class="alert" role="alert">
                                <strong>required*</strong> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label>Last Name</label>
                        <input type="text" class="@error('last_name') is-invalid @enderror" name="last_name"
                            placeholder="Enter Last Name" />
                    </div>
                    @error('last_name')
                        <div class="alert alert-primary" role="alert">
                            <strong>required*</strong> {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="input-box">
                <label>Email</label>
                <input type="email" class="@error('email') is-invalid @enderror" name="email"
                    placeholder="Enter Your Email" required />
                @error('email')
                    <div class="alert alert-primary" role="alert">
                        <strong>required*</strong> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="input-box">
                <label>Password</label>
                <input type="password" class="@error('password') is-invalid @enderror" name="password"
                    placeholder="Enter Your Password" required />
                @error('password')
                    <div class="alert alert-primary" role="alert">
                        <strong>required*</strong> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="input-box">
                <label>Phone</label>
                <input type="number" class="@error('phone') is-invalid @enderror" name="phone"
                    placeholder="Enter Your Phone" required />
                @error('phone')
                    <div class="alert alert-primary" role="alert">
                        <strong>required*</strong> {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="input-box">
                <input type="file" class="@error('image') is-invalid @enderror" name="image" accept="image/*" required />
                @error('image')
                    <div class="alert alert-primary" role="alert">
                        <strong>required*</strong> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="gender-box">
                <h3>Gender</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="gender" value="male" checked />
                        <label for="check-male">male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="gender" value="female" />
                        <label for="check-female">Female</label>
                    </div>
                </div>
            </div>
            <button type="submit">Submit</button>
        </form>
        <p>Already Have An Account? <a href="{{ url('/') }}">Login now</a></p>
    </section>
</body>

</html>
