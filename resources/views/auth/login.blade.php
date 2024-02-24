<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PEMIRA 2024</title>
    <link rel="icon" href="assets/pemira.svg">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">
        <section class="registrasi">
            <div class="card-login login-form" style="min-width: 300px; max-width: 500px;">
                <div class="card-body text-center">
                    <img src="assets/polines.svg" alt="">
                    <img src="assets/BEM.svg" alt="">
                    <img src="assets/BPM.svg" alt="">
                    <img src="assets/pemira.svg" alt="">
                    <h4 class="card-title text-center my-4" style="font-weight: bold;">PEMIRA POLINES <span
                            style="color: #001688;">2024</span></h4>
                </div>
                <div class="card-text">
                    @if (session()->has('error'))
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <div class="alert alert-danger alert-dismissible fade show"
                                style="min-height: 50px; width:500px;" role="alert">
                                <div>
                                    {{ session('error') }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    @endif
                    <form action="{{ route('Authenticate') }}" class="mt-5" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="nim" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">NIM</label>
                        </div>
                        <div class="form-floating mb-5">
                            <input type="password" name="password" class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center mt-4">
                    <img src="assets/HIMA.svg" alt="">
                    <img src="assets/HMAB.svg" alt="">
                    <img src="assets/HME.svg" alt="">
                    <img src="assets/HMM.svg" alt="">
                    <img src="assets/HMS.svg" alt="">
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>