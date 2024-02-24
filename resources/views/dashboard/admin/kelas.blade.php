@extends('layouts.main') @section('container')

<h1>Daftar Kelas</h1>
<div class="card shadow">
    <div class="card-header">
        <div class="row">
            <form class="row" action="{{ route('Daftar Kelas') }}" method="get">
                <div class="col-md-2 col-sm-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Import">Import
                        Data</button>
                </div>
                <div class="col-md-7 col-sm-9">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search"
                            placeholder="Insert (Nama and Kode Kelas) Search..."
                            aria-label="Insert Your Search..." aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                class="bi bi-search"></i></button>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="d-flex gap-2">
                        <div class="dropdown open">
                            <b>Show</b>
                            <select class="btn border-secondary dropdown-toggle rounded-pill" name="show" value="PS-3A">
                                <option class="dropdown-item" value="{{ request('show') }}">{{ request('show') ??
                                    'Default' }}</option>
                                <option class="dropdown-item" value="5">5</option>
                                <option class="dropdown-item" value="10">10</option>
                                <option class="dropdown-item" value="25">25</option>
                                <option class="dropdown-item" value="50">50</option>
                                <option class="dropdown-item" value="100">100</option>
                                <option class="dropdown-item" value="200">200</option>
                                <option class="dropdown-item" value="500">500</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if( session()->has('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {!! session('success') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card-body table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th class="text-center" scope="col">Nama Kelas</th>
                    <th class="text-center" scope="col">Kode Kelas</th>
                    <th class="text-center" scope="col">Jurusan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $class)
                <tr>
                    <th scope="row">{{ $loop->iteration}}</th>
                    <td class="text-center">{{ $class->nama }}
                    </td>
                    <td class="text-center"><b>{{ $class->nama_kelas }}</b>
                    </td>
                    <td class="text-center">{{ $class->jurusan->nama_jurusan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $classes->links() }} --}}
    </div>
</div>
<!-- Modal Import Kelas -->
<div class="modal fade" id="Import" tabindex="-1" aria-labelledby="ImportLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('Import Data Kelas') }}" method="post" enctype="multipart/form-data">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="ImportLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <b>
                        <p>Catatan</p>
                    </b>
                    <p>Kolom 1 : Nama Kelas</p>
                    <p>Kolom 2 : Kode Kelas</p>
                    <p>Kolom 3 : Jurusan</p>
                    <input class="form-control" type="file" name="file">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection