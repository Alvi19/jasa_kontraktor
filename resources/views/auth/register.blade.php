<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link rel="shortcut icon" type="image/png" href="/asset/template/src/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/asset/template/src/assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('login') }}"
                                    class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="/asset/template/src/assets/images/logos/dark-logo.svg" width="180" alt="">
                                </a>
                                <p class="text-center">Your Create Accout</p>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form action="{{ route('auth.register') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Daftar Sebagai</label>
                                        <select class="form-select" aria-label="Default select example" name="status">
                                            <option disabled>Pilih</option>
                                            <option value="kontraktor" {{ old('status') ?? @$data->status ==
                                                'kontraktor' ? 'selected' : '' }}>
                                                Kontraktor</option>
                                            <option value="client" {{ old('status') ?? @$data->status == 'client' ?
                                                'selected' : '' }}>
                                                Client</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            aria-describedby="textHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                            aria-describedby="textHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_wa" class="form-label">No WhatsApp</label>
                                        <input type="number" class="form-control" id="No WhatsApp" name="no_wa"
                                            aria-describedby="textHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            id="exampleInputPassword1">
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign
                                        Up</button>
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