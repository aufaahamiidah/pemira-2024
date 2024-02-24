@extends('layouts.main') @section('container')

<h2 class="text-center mt-5 title" style="border-bottom-color: blue;">Dashboard Panitia</h2>
<div class="row mt-4 baris-chart">
    <div class="col-6" style="width: 400px;">
        <canvas id="jmlPemilih"></canvas>
    </div>
</div>
<h1>Daftar Calon Pemilihan Raya 2024</h1>
<div class="card shadow">
    <div class="card-header">
        <div class="row">
            <form class="row" action="{{ route('Daftar Calon') }}" method="get">
                <div class="col-md-2 col-sm-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Import">Import
                        Data</button>
                </div>
                <div class="col-md-7 col-sm-9">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search"
                            placeholder="Insert (Nama, NIM, Kelas Ketua or Wakil) Search..."
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
                        <div class="dropdown open">
                            <b>Kelas</b>
                            <select class="btn border-secondary dropdown-toggle rounded-pill" name="kelas"
                                value="PS-3A">
                                <option class="dropdown-item" value="{{ request('kelas') }}">{{
                                    App\Models\Kelas::where('id', request('kelas'))->get()->first()->nama_kelas ??
                                    'Default' }}</option>
                                <option class="dropdown-item" value="1">PS-1A</option>
                                <option class="dropdown-item" value="2">PS-2A</option>
                                <option class="dropdown-item" value="3">PS-3A</option>
                                <option class="dropdown-item" value="4">PS-4A</option>
                                <option class="dropdown-item" value="5">IK-1A</option>
                                <option class="dropdown-item" value="6">IK-2A</option>
                                <option class="dropdown-item" value="7">IK-3A</option>
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
    @if( session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {!! session('delete') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if( session()->has('edit'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {!! session('edit') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card-body table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">NIM</th>
                    <th class="text-center" scope="col">Ormawa</th>
                    <th class="text-center" scope="col">No Urut</th>
                    <th class="text-center" scope="col">Kelas</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration}}</th>
                    <td><span class="text-success"><b>{{ $user->nama_ketua }}</b></span>
                        |
                        <span class="text-primary"><b>{{ $user->nama_wakil }}</b></span>
                    </td>
                    <td><span class="text-success"><b>{{ $user->nim_ketua }}</b></span>
                        |
                        <span class="text-primary"><b>{{ $user->nim_wakil }}</b></span>
                    </td>
                    <td class="text-center">{{ $user->type }}</td>
                    <td class="text-center">{{ $user->no_urut }}</td>
                    <td class="text-center"><span class="text-success"><b>{{ $user->kelas_ketua->nama_kelas
                                }}</b></span>
                        |
                        <span class="text-primary"><b>{{ $user->kelas_wakil->nama_kelas }}</b></span>
                    </td>
                    <td class="text-center d-flex justify-content-center gap-1">
                        <button type="button" class="btn btn-sm rounded-pill btn-info" data-bs-toggle="modal"
                            data-bs-target="#detailModal{{ $user->id }}">
                            <i class="bi bi-info-circle"></i> Detail
                        </button>
                        <button type="button" class="btn btn-sm rounded-pill btn-warning" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $user->id }}">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                        <button type="button" class="btn btn-sm rounded-pill btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $user->id }}">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $users->links() }} --}}
    </div>
</div>
<!-- Modal Import Data Calon -->
<div class="modal fade" id="Import" tabindex="-1" aria-labelledby="ImportLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('Import Data Calon') }}" method="post" enctype="multipart/form-data">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="ImportLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <b>
                        <p>Catatan</p>
                    </b>
                    <p>Kolom 1 : Type Organisasi</p>
                    <p>Kolom 2 : No Urut Paslon</p>
                    <p>Kolom 3 : Nama Ketua Paslon</p>
                    <p>Kolom 4 : Nama Wakil Ketua Paslon</p>
                    <p>Kolom 5 : NIM Ketua Paslon</p>
                    <p>Kolom 6 : NIM Wakil Ketua Paslon</p>
                    <p>Kolom 7 : Kelas Ketua Paslon</p>
                    <p>Kolom 8 : Kelas Wakil Ketua Paslon</p>
                    <p>Kolom 9 : Visi Paslon</p>
                    <p>Kolom 10 : Misi Paslon</p>
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

@foreach ($users as $user)
<!-- Modal Detail Calon Pemira -->
<div class="modal fade" id="detailModal{{ $user->id }}" tabindex="-1" aria-labelledby="detailModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="detailModalLabel">Detail Calon Pemira 2024</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-xl-6 col-sm-12">
                                <img src="/assets/foto_calon/{{ $user->foto_ketua }}" alt="Gambar Calon Pemira 2024" style="width: 30vw; max-width: 250px; min-width: 100px;">
                            </div>
                            <div class="col-xl-6 col-sm-12">
                                <p><b>Nama Ketua</b> : <br> {{ $user->nama_ketua }}</p>
                                <p><b>NIM Ketua</b> : <br> {{ $user->nim_ketua }}</p>
                                <p><b>Kelas Ketua</b> : <br> {{ $user->kelas_ketua->nama_kelas }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-xl-6 col-sm-12">
                                <img src="/assets/foto_calon/{{ $user->foto_wakil }}" alt="Gambar Calon Wakil Pemira 2024" style="width: 30vw; max-width: 250px; min-width: 100px;">
                            </div>
                            <div class="col-xl-6 col-sm-12">
                                <p><b>Nama Wakil Ketua</b> : <br> {{ $user->nama_wakil }}</p>
                                <p><b>NIM Wakil Ketua</b> : <br> {{ $user->nim_wakil }}</p>
                                <p><b>Kelas Wakil Ketua</b> : <br> {{ $user->kelas_wakil->nama_kelas }}</p>
                            </div>
                        </div>
                    </div>
                    <p style="text-align: center"><b>Visi</b> : <br> {{ $user->visi }} </p>
                    <p style="text-align: center"><b>Misi</b> : <br> {{ $user->misi }} </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Mahasiswa -->
<div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Data Calon Pemira</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('Update Data Calon', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="no_urut" value="{{ $user->no_urut }}">
                    <div class="mb-3">
                        <label for="type" class="form-label">Type Ormawa :</label>
                        <select class="form-select mb-3" name="type" id="type" required>
                            <option value="BEM">BEM</option>
                            <option value="BPM">BPM</option>
                            <option value="HMJ">HMJ</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_ketua" class="form-label">Nama Ketua :</label>
                        <input class="form-control mb-3" type="text" name="nama_ketua" id="nama_ketua"
                            value="{{ $user->nama_ketua }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_wakil" class="form-label">Nama Wakil Ketua :</label>
                        <input class="form-control mb-3" type="text" name="nama_wakil" id="nama_wakil"
                            value="{{ $user->nama_wakil }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nim_ketua" class="form-label">NIM Ketua :</label>
                        <input class="form-control mb-3" type="text" name="nim_ketua" id="nim_ketua"
                            value="{{ $user->nim_ketua }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nim_wakil" class="form-label">NIM Wakil Ketua :</label>
                        <input class="form-control mb-3" type="text" name="nim_wakil" id="nim_wakil"
                            value="{{ $user->nim_wakil }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto_ketua" class="form-label">Foto Ketua :</label>
                        <input class="form-control mb-3" type="file" name="foto_ketua" id="foto_ketua"
                            value="{{ $user->foto_ketua }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto_wakil" class="form-label">Foto Ketua :</label>
                        <input class="form-control mb-3" type="file" name="foto_wakil" id="foto_wakil"
                            value="{{ $user->foto_wakil }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas_ketua" class="form-label">Kelas Ketua :</label>
                        <select class="form-select mb-3" name="kelas_ketua" id="kelas_ketua" required>
                            <option value="1">PS-1A</option>
                            <option value="2">PS-2A</option>
                            <option value="3">PS-3A</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kelas_wakil" class="form-label">Kelas Wakil Ketua :</label>
                        <select class="form-select mb-3" name="kelas_wakil" id="kelas_wakil" required>
                            <option value="1">PS-1A</option>
                            <option value="2">PS-2A</option>
                            <option value="3">PS-3A</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="visi" class="form-label">Visi : </label>
                        <textarea class="form-control" name="visi" id="visi" rows="3">{{ $user->visi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="misi" class="form-label">Misi : </label>
                        <textarea class="form-control" name="misi" id="misi" rows="3">{{ $user->misi }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Detele Mahasiswa -->
<div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                Apakah Anda Yakin ingin Menghapus Data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <a href="{{ route('Delete Data Calon', $user->id) }}" class="btn btn-primary">Yakin</a>
            </div>
        </div>
    </div>
</div>
@endforeach

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="path/to/chartjs/dist/chart.umd.js"></script>
<script>
    const jmlP = document.getElementById('jmlPemilih');
    const jmlSuaraSah = document.getElementById('jmlSuaraSah');

    new Chart(jmlP, {
    type: 'doughnut',
    data: {
        labels: ['BEM', 'BPM', 'HMJ'],
        datasets: [{
        label: 'Jumlah Paslon',
        data: [{{ App\Models\Calon::where('type', 'BEM')->count() }}, {{ App\Models\Calon::where('type', 'BPM')->count() }}, {{ App\Models\Calon::where('type', 'HMJ')->count() }}],
        borderWidth: 1,
        backgroundColor:['#36a2eb', '#ff6384', '#6962AD']
        }]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    }
    });
</script>
@endsection