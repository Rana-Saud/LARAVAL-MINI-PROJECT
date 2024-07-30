<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>View User Form</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <section class="container">
        <header>View User Form</header>
        <form class="form">
            <div class="input-box address">
                <div class="column">
                    <div>
                        <label>First Name</label>
                        <input type="text" name="first_name" placeholder="Enter First Name"
                            value="{{ $user->first_name }}" />
                    </div>
                    <div>
                        <label>Last Name</label>
                        <input type="text" name="last_name" placeholder="Enter Last Name"
                            value="{{ $user->last_name }}" />
                    </div>
                </div>
            </div>

            <div class="input-box">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter Your Email" value="{{ $user->email }}" />
            </div>

            <div class="input-box">
                <label>Phone</label>
                <input type="number" name="phone" placeholder="Enter Your Phone" value="{{ $user->phone }}" />
            </div>

            <div class="input-box d-flex align-items-start gap-2">
                <label>image</label>
                {!! $user->getImage(100, 100) !!}
            </div>

            <div class="gender-box">
                <h3>Gender</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="gender" value="male"
                            @if ($user->gender == 'male') ? checked : null @endif />
                        <label for="check-male">male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="gender" value="female"
                            @if ($user->gender == 'female') ? checked : null @endif />
                        <label for="check-female">Female</label>
                    </div>
                </div>
            </div>
            <button type="button" onclick="window.history.back()">close</button>
        </form>
    </section>
</body>

</html>
