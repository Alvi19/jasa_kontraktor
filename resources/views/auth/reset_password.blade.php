<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>
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
                                <div class="text-center mb-4">
                                    <h3>Forgot Password</h3>
                                </div>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form action="{{ route('password.update', $token) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <input type="hidden" name="email" value="{{ request()->email }}">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Email" value="{{request()->email}}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password Baru</label>
                                        <input type="password" class="form-control form-control-user" id="password" aria-describedby="emailHelp" placeholder="Password Baru" name="password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Ulangi Password Baru</label>
                                        <input type="password" class="form-control form-control-user" id="password_confirmation" aria-describedby="emailHelp" placeholder="Ulangi Password Baru" name="password_confirmation">
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                                        Reset Password
                                    </button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-1 mx-2 fw-bold">New to </p>
                                        <a class="small" href="{{ route('auth.register') }}"> Create an Account!</a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                                        <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Sign
                                            In</a>
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