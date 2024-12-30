<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGN IN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ url('backend/plugins/fontawesome-free/css/all.min.css') }}"> --}}
    <!-- Ionicons -->
    {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
    <!-- icheck bootstrap -->
    {{-- <link rel="stylesheet" href="{{ url('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
    <!-- Theme style -->

    <link rel="stylesheet" href="{{ url('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\fontawesome-free-6.2.1\css\all.css') }}">
    <!-- Google Font: Source Sans Pro -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
</head>
<style>
    .btn-primary {
        background-color: #20598f;
        font-size: 14px;
    }
</style>
{{-- <body class="hold-transition login-page"> --}}

<body>
    <div id="app">
        <!-- Section: Design Block -->
        <section class=" text-center text-lg-start">
            <style>
                .rounded-t-5 {
                    border-top-left-radius: 0.5rem;
                    border-top-right-radius: 0.5rem;
                }

                @media (min-width: 992px) {
                    .rounded-tr-lg-0 {
                        border-top-right-radius: 0;
                    }

                    .rounded-bl-lg-5 {
                        border-bottom-left-radius: 0.5rem;
                    }
                }
            </style>
            <div class="card mb-6">
                {{-- <section class="vh-100" style="background-color: #0c3468;"> --}}
                <section class="vh-100" style="background-color: #ffffff;">
                    <div class="container py-5 h-50">
                        <div class="row d-flex justify-content-center align-items-center h-100 ">
                            <div class="col-lg-6 d-none d-lg-flex h-100">
                                <img src="../assets/img/avatar/tch.jpg" alt="form login" class="img-fluid h-100"
                                    style="object-fit: cover;">
                            </div>
                            <div class="col-lg-6 p-3 mb-5 rounded" style="background-color: #ffffff;">
                                <div class="card-body py-5 px-md-5">
                                    <div class="card-body p-4 p-lg-8  text-black">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-md-6">
                                                <h3 class="text-center">
                                                    <font color="SteelBlue"><b>DAILY CHECK </b></font><span
                                                        class="text-warning"><b>POINT</b></span>
                                                </h3>
                                                {{-- <a href="#">
                                                    <img src="/assets/img/avatar/logo_daily.png"
                                                        class="rounded img-fluid" width="190" alt="Logo">
                                                </a> --}}
                                            </div>
                                        </div>
                                        <form action="/postlogin" method="post">
                                            {{ csrf_field() }}
                                            <!-- Input User -->
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary text-white">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="user" class="form-control border-primary"
                                                    placeholder="User" required>
                                            </div>
                                            <!-- Input Password -->
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary text-white"><i
                                                            class="fas fa-lock"></i></span>
                                                </div>
                                                <input type="password" name="pass"
                                                    class="form-control border-primary pr-5" placeholder="Password"
                                                    id="passwordInput" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg-white border-primary text-dark"
                                                        id="togglePassword">
                                                        <i class="fas fa-eye-slash"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="messageContainer"></div>
                                            @if (Session::has('message'))
                                                <div class="alert alert-danger">
                                                    {{ Session::get('message') }}
                                                </div>
                                            @endif
                                            @if (Session::has('error'))
                                                <div class="alert alert-danger">
                                                    {{ Session::get('error') }}
                                            @endif
                                            {{-- <div class="row">
                                                <div class="col-8">
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" id="remember">
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-4">
                                                <button type="submit" class="btn-center btn btn-primary btn-block">SIGN
                                                    IN</button>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="simple-footer text-dark text-center">
                                        Copyright &copy; {{ date('Y') }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <!-- jQuery -->
                <script src="{{ url('backend/plugins/jquery/jquery.min.js') }}"></script>
                <!-- Bootstrap 4 -->
                <script src="{{ url('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                <!-- AdminLTE App -->
                <script src="{{ url('backend/dist/js/adminlte.min.js') }}"></script>
                <script>
                    const passwordInput = document.getElementById('passwordInput');
                    const togglePassword = document.getElementById('togglePassword');

                    togglePassword.addEventListener('click', function() {
                        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                        passwordInput.setAttribute('type', type);
                        console.log(type);
                        // Ganti ikon mata sesuai keadaan password
                        if (type === 'password') {
                            togglePassword.innerHTML = '<i class="fas fa-eye-slash"></i>';
                        } else {
                            togglePassword.innerHTML = '<i class="fas fa-eye"></i>';
                        }
                    });
                </script>
</body>

</html>
