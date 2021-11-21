<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>

@if (session()->has('gagalRegistrasi'))

    <body class="active">

    @else

        <body>


@endif





<div class="container">
    <div class="blueBg">
        <div class="box signin">
            <h2>Already Have an Account ?</h2>
            <button class="signinBtn">Sign in</button>
        </div>
        <div class="box signup">
            <h2>Don't Have an Account ?</h2>
            <button class="signupBtn">Sign up</button>
        </div>
    </div>
    @if (session()->has('gagalRegistrasi'))
        <div class="formBx active">
        @else
            <div class="formBx">
    @endif
    <!-- signIn -->
    <div class="form signinForm">
        <form action="/login" method="post">
            @csrf
            <h3>Sign In</h3>
            <input type="email" placeholder="Email" id="email" autofocus class="@error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" />
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <input type="password" placeholder="Password" class="@error('password') is-invalid @enderror"
                name="password" />
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <input type="submit" value="Login" />
            <a href="#" class="forgot">Forgot Password</a>
        </form>
    </div>

    <!-- signUp -->
    <div class="form signupForm">
        <form action="/register" method="post">
            @csrf
            <h3>Sign Up</h3>
            <input type="text" placeholder="Name" name="name" class="@error('name') is-invalid @enderror"
                value="{{ old('name') }}" />
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <input type="text" placeholder="Username" name="username" class="@error('username') is-invalid @enderror"
                value="{{ old('username') }}" />
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <input type="email" placeholder="Email Address" name="email" class="@error('email') is-invalid @enderror"
                value="{{ old('email') }}" />
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <input type="password" placeholder="Password" name="password"
                class="@error('password') is-invalid @enderror" />
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            {{-- <input type="password" placeholder="Confirm Password" name="password_confirm" /> --}}
            <input type="submit" value="Register" />
        </form>
    </div>
</div>
</div>



<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script>
    const signinBtn = document.querySelector(".signinBtn");
    const signupBtn = document.querySelector(".signupBtn");
    const signinFormInput = document.querySelectorAll(".signinForm form input");
    const signupFormInput = document.querySelectorAll(".signupForm form input");
    const formBx = document.querySelector(".formBx");
    const body = document.querySelector("body");
    const formInput = document.querySelectorAll("form input");
    const invalidfeedback = document.querySelectorAll("form .invalid-feedback");

    signupBtn.addEventListener("click", function() {
        formBx.classList.add("active");
        body.classList.add("active");
        signinFormInput.forEach(input => {
            if (input.classList.contains('is-invalid') == false) {
                $('.invalid-feedback').css('display', 'none');
                $('.invalid-feedback').prev().css({
                    'margin-bottom': 20
                });
            }
        });
        $('.signupForm form input[type="text"]').val('');
        $('.signupForm form input[type="email"]').val('');
        $('.signupForm form input[type="password"]').val('');
    });

    signinBtn.addEventListener("click", function() {
        formBx.classList.remove("active");
        body.classList.remove("active");
        signupFormInput.forEach(input => {
            if (input.classList.contains('is-invalid') == false) {
                $('.invalid-feedback').css('display', 'none');
                $('.invalid-feedback').prev().css({
                    'margin-bottom': 20,
                });
            }
        });
        $('.signinForm form input[type="email"]').val('');

    });

    formInput.forEach(input => {
        if (input.classList.contains('is-invalid') == true) {
            $('.invalid-feedback').css('display', 'block');
            $('.invalid-feedback').prev().css({
                'margin-bottom': 5,
                'margin-top': 5
            });
        }

    })

    const pesan = {
        berhasil: (text) => {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: text
            })
        },
        gagal: (text) => {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: text
            })
        }
    }
</script>


@if (session()->has('berhasilRegistrasi'))
    <script>
        {!! session('berhasilRegistrasi') !!}
    </script>
@elseif(session()->has('gagalRegistrasi'))
    <script>
        {!! session('gagalRegistrasi') !!}
    </script>
@endif

@if (session()->has('gagalLogin'))
    <script>
        {!! session('gagalLogin') !!}
    </script>
@elseif(session()->has('berhasilLogin'))
    <script>
        {!! session('berhasilLogin') !!}
    </script>
@endif


</body>

</html>
