@extends('layouts.main2')

@section('container_menu')
<main class="text-center">
    <h1 class="fw-bolder" style="font-size: 4vw">PEMILIHAN RAYA <span style="color: blue;">2024</span></h1>
    <h1 class="fw-bolder" style="font-size: 4vw">POLITEKNIK NEGERI SEMARANG</h1>
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
    <img src="assets/pemira.svg" style="width: 30vw; min-width: 100px; max-width: 200px; margin-top: 10vh"><br>
    <a class="btn btn-primary fs-6" href="{{ route('login') }}" style="margin-top: 10vh">Masuk</a>
</main>
@endsection