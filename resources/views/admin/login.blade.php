<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700&display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admincss/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admincss/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admincss/dist/css/adminlte.min.css') }}">

    <style>
        body {
            background: linear-gradient(135deg, #3c8dbc, #1e282c);
            font-family: 'Source Sans Pro', sans-serif;
        }

        .login-box {
            margin-top: 5%;
        }

        .login-logo img {
            max-width: 120px;
        }

        .card-primary.card-outline {
            border-top: 3px solid #007bff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .toggle-password {
            cursor: pointer;
        }

        .form-control {
            font-size: 1rem;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- Logo Section -->
        <div class="login-logo ">
            <a href="#"><img src="{{ asset('assets/images/logo_proptru1.png') }}" class="bg-white p-2  rounded-pill" alt="Admin Logo"></a>
        </div>

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Admin</b> Login</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{ route('admin.authenticate') }}" method="POST">
                    @csrf

                    <!-- Email -->
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required
                            autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                    </div>
                    @error('email')
                        <span class="text-danger d-block mb-2">{{ $message }}</span>
                    @enderror

                    <!-- Password -->
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text toggle-password">
                                <span class="fas fa-eye" id="toggle-icon"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-danger d-block mb-2">{{ $message }}</span>
                    @enderror

                    <!-- Remember & Submit -->
                    <div class="row mb-2">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1 text-center">
                    <a href="#">I forgot my password</a>
                </p>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admincss/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admincss/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admincss/dist/js/adminlte.min.js') }}"></script>

    <!-- Show/Hide Password Script -->
    <script>
        const passwordInput = document.getElementById("password");
        const toggleIcon = document.getElementById("toggle-icon");

        document.querySelector(".toggle-password").addEventListener("click", function() {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);
            toggleIcon.classList.toggle("fa-eye");
            toggleIcon.classList.toggle("fa-eye-slash");
        });
    </script>
</body>

</html>
