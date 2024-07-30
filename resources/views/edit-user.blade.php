<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Edit User</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <section class="container">
        <header>Edit User Form</header>
        <form action="{{ url('user/update' . '/' . $user->id) }}" method="POST" class="form" enctype="multipart/form-data">
            @csrf
            <div class="input-box address">
                <div class="column">
                    <div>
                        <label>First Name</label>
                        <input type="text" name="first_name" placeholder="Enter First Name"
                            value="{{ $user->first_name }}" required />
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
                <input type="email" name="email" placeholder="Enter Your Email" value="{{ $user->email }}"
                    required />
            </div>

            <div class="input-box">
                <label>Phone</label>
                <input type="number" name="phone" placeholder="Enter Your Phone" value="{{ $user->phone }}"
                    required />
            </div>

            <div class="input-box">
                <label>Image</label>
                <div class="d-flex align-items-center gap-1">
                    <input type="file" class="@error('image') is-invalid @enderror" name="image" accept="image/*"
                        value="{{ old('image') }}" required />
                    {!! $user->getImage(50, 50) !!}
                </div>
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
            <button type="submit">Update</button>
        </form>
    </section>
</body>

</html>
