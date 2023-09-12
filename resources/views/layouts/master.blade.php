<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css"
          integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap"
          rel="stylesheet">

</head>

<style>
    body {
        font-family: 'Cairo', sans-serif;
    }
</style>
<body>

<!-- Sign up form -->
<section class="signup bg-light">
    <div class="container  vh-100 d-flex align-items-center justify-content-center p-4">
        <div class="bg-white py-5  shadow-lg rounded row ">
            <h3 class="text-center p-2 mb-2">Login Page</h3>
            <h4 class="text-center p-1 mb-b2 text-primary">@yield('title')</h4>
            <form class=" col ps-md-5" method="POST" action="@yield('route_name')" autocomplete="off">
                @csrf
                <div class="mb-4">
                    <label for="credit" class="form-label ">Email, Username, PhoneNumber</label>
                    <input type="text" class="rounded-0 form-control @error('credit') is-invalid @enderror"
                           name="credit" id="credit"
                           required autofocus>
                    @error('credit')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="rounded-0 form-control @error('password') is-invalid @enderror"
                           name="password" id="password">
                    @error('password')
                    <span class="invalid-feedback alert-danger" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input rounded-0" name="remember"
                           id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember-me">Remember Me</label>
                </div>
                <button type="submit" class="rounded-0 btn btn-primary w-100">Login</button>

                <div class="d-flex justify-content-between mt-3">
                    @if(request()->routeIs('user.*'))
                        <a href="{{ route('admin.login') }}" class="text-decoration-none">Login as Admin</a>
                        <a href="{{ route('employee.login') }}" class="text-decoration-none">Login as Employee</a>

                    @elseif(request()->routeIs('admin.*'))
                        <a href="{{ route('user.login') }}" class="text-decoration-none">Login as User</a>
                        <a href="{{ route('employee.login') }}" class="text-decoration-none">Login as Employee</a>
                        @elseif(request()->routeIs('employee.*'))
                        <a href="{{ route('user.login') }}" class="text-decoration-none">Login as User</a>
                        <a href="{{ route('admin.login') }}" class="text-decoration-none">Login as Admin</a>
                    @endif
                </div>
            </form>
            <div class="col d-flex justify-content-center d-lg-flex d-none">
                <figure><img class="w-100" src="{{ asset('assets/login-form/images/signup-image.jpg') }}"
                             alt="sing up image"></figure>
            </div>
        </div>
    </div>
</section>

</body>
</html>
