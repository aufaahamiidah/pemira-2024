<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="assets/pemira.svg" width="50"> <b> PEMIRA <span style="color: blue;">2024</span></b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" style="font-weight: 500" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" {!! ($active=='home' )? "style='color:blue;'" : '' !!} aria-current="page"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" {!! ($active=='mahasiswa' )? "style='color:blue;'" : '' !!}
                        href="{{ route('Daftar Mahasiswa') }}">Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" {!! ($active=='susulan' )? "style='color:blue;'" : '' !!}
                        href="{{ route('Daftar Mahasiswa Susulan') }}">Susulan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" {!! ($active=='calon' )? "style='color:blue;'" : '' !!}
                        href="{{ route('Daftar Calon') }}">Calon Pemira</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" {!! ($active=='kelas' )? "style='color:blue;'" : '' !!}
                        href="{{ route('Daftar Kelas') }}">Kelas</a>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn dropdown-toggle" style="background-color: blue; color:white;" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->nama }}
                </button>
                <ul class="dropdown-menu">
                    <form action="{{ route('Logout') }}" method="POST">
                        @csrf
                        <li><button type="submit" class="dropdown-item text-danger" href="#"><b>Logout</b></button></li>
                    </form>
                </ul>
            </div>
        </div>
    </div>
</nav>