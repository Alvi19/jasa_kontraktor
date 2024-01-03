<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
    <link rel="shortcut icon" type="image/png" href="/asset/template/src/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/asset/template/src/assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1>Selamat Datang</h1>
                                </div>
                                <p class="text-center">Silahkan login</p>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Username" name="username">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                                Remeber this Device
                                            </label>
                                        </div>
                                        <a class="text-primary fw-bold" href="{{route('password.request')}}">Forgot Password ?</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                                        Login
                                    </button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-1 mx-2 fw-bold">New to </p>
                                        <a class="small" href="{{ route('auth.register') }}"> Create an Account!</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/asset/template/src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/asset/template/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

{{-- @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Username" name="username">
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
    </div>

    <button type="submit" class="btn btn-primary btn-user btn-block">
        Login
    </button>
</form>
<hr>
<div class="text-center">
    <a class="small" href="forgot-password.html">Forgot Password?</a>
</div>
<div class="text-center">
    <a class="small" href="{{ route('auth.register') }}">Create an Account!</a>
</div> --}}