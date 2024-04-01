@extends('layouts.main')

@section('container-fluid')

<div class="card shadow mt-5">
    <div class="card-header text-center bg-primary text-white">
        <h3>Hasil Pemungutan Suara</h3>
    </div>
    <h2 class="text-center mt-5 title font-weight-bold" style="border-bottom-color: blue;">Quick Count</h2>
    <div class="row mt-4 baris-chart">
        <div class="col-6" style="width: 400px;">
            <canvas id="jmlPemilih"></canvas>
        </div>
        <div class="col-6" style="width: 400px;">
            <canvas id="jmlSuaraSah"></canvas>
        </div>
        <div class="col-6" style="width: 400px;">
            <canvas id="jmlSuaraBEM"></canvas>
        </div>
    </div>
    @if (Auth::user()->role == 'admin')
    <div class="card-body table-responsive mt-5">
        <table class="table table-striped table-bordered border-light" >
            <thead class="table-dark">
                <tr>
                    <td class="align-middle text-center" colspan="11">Calon Presiden Mahasiswa & Wakil Presiden Mahasiswa</td>
                </tr>
                <tr>
                    <td class="align-middle text-center" rowspan="2">No Urut</td>
                    <td class="align-middle text-center" rowspan="2">Nama Calon</td>
                    <td class="text-center" colspan="5">Jurusan</td>
                    <td class="text-center" colspan="3">Total Suara</td>
                    <td class="align-middle text-center" rowspan="2">Presentase</td>
                </tr>
                <tr>
                    <td class="text-center">Akuntansi</td>
                    <td class="text-center">Administrasi Bisnis</td>
                    <td class="text-center">Teknik Elektro</td>
                    <td class="text-center">Teknik Sipil</td>
                    <td class="text-center">Teknik Mesin</td>
                    <td class="text-center">Total Perolehan</td>
                    <td class="text-center">Suara Sah</td>
                    <td class="text-center">Tidak Sah</td>
                </tr>
            </thead>
            <tbody class="table-light">
                @foreach ($calon_bem as $bem)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $bem->nama_ketua }}</td>
                    <td class="text-center">{{ App\Models\User::where('jurusan_id', '1')->where('bem_id', $bem->id)->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('jurusan_id', '2')->where('bem_id', $bem->id)->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('jurusan_id', '3')->where('bem_id', $bem->id)->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('jurusan_id', '4')->where('bem_id', $bem->id)->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('jurusan_id', '5')->where('bem_id', $bem->id)->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bem_id', $bem->id)->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bem_id', $bem->id)->where('is_active', '1')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bem_id', $bem->id)->where('is_active', '0')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bem_id', $bem->id)->where('is_active', '1')->count() / App\Models\User::count() * 100 }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-body table-responsive mt-5">
        <table class="table table-striped table-bordered border-light" >
            <thead class="table-dark">
                <tr>
                    <td class="align-middle text-center" colspan="7">Calon Anggota BPM Akuntansi</td>
                </tr>
                <tr>
                    <td class="align-middle text-center" rowspan="2">No Urut</td>
                    <td class="align-middle text-center" rowspan="2">Nama Calon</td>
                    <td class="text-center" colspan="4">Suara</td>
                    <td class="align-middle text-center" rowspan="2">Presentase</td>
                </tr>
                <tr>
                    <td class="text-center">Total Perolehan</td>
                    <td class="text-center">Total</td>
                    <td class="text-center">Sah</td>
                    <td class="text-center">Tidak Sah</td>
                </tr>
            </thead>
            <tbody class="table-light">
                @foreach ($calon_bpm_akuntansi as $bpm)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $bpm->nama_ketua }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', '!=', null)->where('jurusan_id', '1')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->where('is_active', '1')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->where('is_active', '0')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->where('is_active', '1')->count() / App\Models\User::count() * 100 }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-body table-responsive mt-5">
        <table class="table table-striped table-bordered border-light" >
            <thead class="table-dark">
                <tr>
                    <td class="align-middle text-center" colspan="7">Calon Anggota BPM Administrasi Bisnis</td>
                </tr>
                <tr>
                    <td class="align-middle text-center" rowspan="2">No Urut</td>
                    <td class="align-middle text-center" rowspan="2">Nama Calon</td>
                    <td class="text-center" colspan="4">Suara</td>
                    <td class="align-middle text-center" rowspan="2">Presentase</td>
                </tr>
                <tr>
                    <td class="text-center">Total Perolehan</td>
                    <td class="text-center">Total</td>
                    <td class="text-center">Sah</td>
                    <td class="text-center">Tidak Sah</td>
                </tr>
            </thead>
            <tbody class="table-light">
                @foreach ($calon_bpm_adbis as $bpm)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $bpm->nama_ketua }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', '!=', null)->where('jurusan_id', '2')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->where('is_active', '1')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->where('is_active', '0')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->where('is_active', '1')->count() / App\Models\User::count() * 100 }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-body table-responsive mt-5">
        <table class="table table-striped table-bordered border-light" >
            <thead class="table-dark">
                <tr>
                    <td class="align-middle text-center" colspan="7">Calon Anggota BPM Teknik Elektro</td>
                </tr>
                <tr>
                    <td class="align-middle text-center" rowspan="2">No Urut</td>
                    <td class="align-middle text-center" rowspan="2">Nama Calon</td>
                    <td class="text-center" colspan="4">Suara</td>
                    <td class="align-middle text-center" rowspan="2">Presentase</td>
                </tr>
                <tr>
                    <td class="text-center">Total Perolehan</td>
                    <td class="text-center">Total</td>
                    <td class="text-center">Sah</td>
                    <td class="text-center">Tidak Sah</td>
                </tr>
            </thead>
            <tbody class="table-light">
                @foreach ($calon_bpm_elektro as $bpm)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $bpm->nama_ketua }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', '!=', null)->where('jurusan_id', '3')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->where('is_active', '1')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->where('is_active', '0')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->where('is_active', '1')->count() / App\Models\User::count() * 100 }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-body table-responsive mt-5">
        <table class="table table-striped table-bordered border-light" >
            <thead class="table-dark">
                <tr>
                    <td class="align-middle text-center" colspan="7">Calon Anggota BPM Teknik Sipil</td>
                </tr>
                <tr>
                    <td class="align-middle text-center" rowspan="2">No Urut</td>
                    <td class="align-middle text-center" rowspan="2">Nama Calon</td>
                    <td class="text-center" colspan="4">Suara</td>
                    <td class="align-middle text-center" rowspan="2">Presentase</td>
                </tr>
                <tr>
                    <td class="text-center">Total Perolehan</td>
                    <td class="text-center">Total</td>
                    <td class="text-center">Sah</td>
                    <td class="text-center">Tidak Sah</td>
                </tr>
            </thead>
            <tbody class="table-light">
                @foreach ($calon_bpm_sipil as $bpm)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $bpm->nama_ketua }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', '!=', null)->where('jurusan_id', '4')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->where('is_active', '1')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->where('is_active', '0')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->where('is_active', '1')->count() / App\Models\User::count() * 100 }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-body table-responsive mt-5">
        <table class="table table-striped table-bordered border-light" >
            <thead class="table-dark">
                <tr>
                    <td class="align-middle text-center" colspan="7">Calon Anggota BPM Teknik Mesin</td>
                </tr>
                <tr>
                    <td class="align-middle text-center" rowspan="2">No Urut</td>
                    <td class="align-middle text-center" rowspan="2">Nama Calon</td>
                    <td class="text-center" colspan="4">Suara</td>
                    <td class="align-middle text-center" rowspan="2">Presentase</td>
                </tr>
                <tr>
                    <td class="text-center">Total Perolehan</td>
                    <td class="text-center">Total</td>
                    <td class="text-center">Sah</td>
                    <td class="text-center">Tidak Sah</td>
                </tr>
            </thead>
            <tbody class="table-light">
                @foreach ($calon_bpm_mesin as $bpm)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $bpm->nama_ketua }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', '!=', null)->where('jurusan_id', '5')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->where('is_active', '1')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->where('is_active', '0')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('bpm_id', $bpm->id)->where('is_active', '1')->count() / App\Models\User::count() * 100 }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    @if (Auth::User()->role == 'panitia' && Auth::user()->jurusan_id == 1 || Auth::user()->role == 'admin')
    <div class="card-body table-responsive mt-5">
        <table class="table table-striped table-bordered border-light" >
            <thead class="table-dark">
                <tr>
                    <td class="align-middle text-center" colspan="7">Calon Ketua Himpunan Mahasiswa Akuntansi</td>
                </tr>
                <tr>
                    <td class="align-middle text-center" rowspan="2">No Urut</td>
                    <td class="align-middle text-center" rowspan="2">Nama Calon</td>
                    <td class="text-center" colspan="4">Suara</td>
                    <td class="align-middle text-center" rowspan="2">Presentase</td>
                </tr>
                <tr>
                    <td class="text-center">Total Perolehan</td>
                    <td class="text-center">Total</td>
                    <td class="text-center">Sah</td>
                    <td class="text-center">Tidak Sah</td>
                </tr>
            </thead>
            <tbody class="table-light">
                @foreach ($calon_hmj_akuntansi as $hmj)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $hmj->nama_ketua }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', '!=', null)->where('jurusan_id', '1')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->where('is_active', '1')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->where('is_active', '0')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->where('is_active', '1')->count() / App\Models\User::count() * 100 }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    @if (Auth::User()->role == 'panitia' && Auth::user()->jurusan_id == 2|| Auth::user()->role == 'admin')
    <div class="card-body table-responsive mt-5">
        <table class="table table-striped table-bordered border-light" >
            <thead class="table-dark">
                <tr>
                    <td class="align-middle text-center" colspan="7">Calon Ketua Himpunan Mahasiswa Administrasi Bisnis</td>
                </tr>
                <tr>
                    <td class="align-middle text-center" rowspan="2">No Urut</td>
                    <td class="align-middle text-center" rowspan="2">Nama Calon</td>
                    <td class="text-center" colspan="4">Suara</td>
                    <td class="align-middle text-center" rowspan="2">Presentase</td>
                </tr>
                <tr>
                    <td class="text-center">Total Perolehan</td>
                    <td class="text-center">Total</td>
                    <td class="text-center">Sah</td>
                    <td class="text-center">Tidak Sah</td>
                </tr>
            </thead>
            <tbody class="table-light">
                @foreach ($calon_hmj_adbis as $hmj)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $hmj->nama_ketua }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', '!=', null)->where('jurusan_id', '2')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->where('is_active', '1')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->where('is_active', '0')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->where('is_active', '1')->count() / App\Models\User::count() * 100 }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    @if (Auth::User()->role == 'panitia' && Auth::user()->jurusan_id == 3 || Auth::user()->role == 'admin')
    <div class="card-body table-responsive mt-5">
        <table class="table table-striped table-bordered border-light" >
            <thead class="table-dark">
                <tr>
                    <td class="align-middle text-center" colspan="7">Calon Ketua Himpunan Mahasiswa Sipil</td>
                </tr>
                <tr>
                    <td class="align-middle text-center" rowspan="2">No Urut</td>
                    <td class="align-middle text-center" rowspan="2">Nama Calon</td>
                    <td class="text-center" colspan="4">Suara</td>
                    <td class="align-middle text-center" rowspan="2">Presentase</td>
                </tr>
                <tr>
                    <td class="text-center">Total Perolehan</td>
                    <td class="text-center">Total</td>
                    <td class="text-center">Sah</td>
                    <td class="text-center">Tidak Sah</td>
                </tr>
            </thead>
            <tbody class="table-light">
                @foreach ($calon_hmj_sipil as $hmj)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $hmj->nama_ketua }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', '!=', null)->where('jurusan_id', '3')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->where('is_active', '1')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->where('is_active', '0')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->where('is_active', '1')->count() / App\Models\User::count() * 100 }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    @if (Auth::User()->role == 'panitia' && Auth::user()->jurusan_id == 4 || Auth::user()->role == 'admin')
    <div class="card-body table-responsive mt-5">
        <table class="table table-striped table-bordered border-light" >
            <thead class="table-dark">
                <tr>
                    <td class="align-middle text-center" colspan="7">Calon Ketua Himpunan Mahasiswa Elektro</td>
                </tr>
                <tr>
                    <td class="align-middle text-center" rowspan="2">No Urut</td>
                    <td class="align-middle text-center" rowspan="2">Nama Calon</td>
                    <td class="text-center" colspan="4">Suara</td>
                    <td class="align-middle text-center" rowspan="2">Presentase</td>
                </tr>
                <tr>
                    <td class="text-center">Total Perolehan</td>
                    <td class="text-center">Total</td>
                    <td class="text-center">Sah</td>
                    <td class="text-center">Tidak Sah</td>
                </tr>
            </thead>
            <tbody class="table-light">
                @foreach ($calon_hmj_elektro as $hmj)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $hmj->nama_ketua }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', '!=', null)->where('jurusan_id', '4')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->where('is_active', '1')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->where('is_active', '0')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->where('is_active', '1')->count() / App\Models\User::count() * 100 }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    @if (Auth::User()->role == 'panitia' && Auth::user()->jurusan_id == 5 || Auth::user()->role == 'admin')
    <div class="card-body table-responsive mt-5">
        <table class="table table-striped table-bordered border-light" >
            <thead class="table-dark">
                <tr>
                    <td class="align-middle text-center" colspan="7">Calon Ketua Himpunan Mahasiswa Mesin</td>
                </tr>
                <tr>
                    <td class="align-middle text-center" rowspan="2">No Urut</td>
                    <td class="align-middle text-center" rowspan="2">Nama Calon</td>
                    <td class="text-center" colspan="4">Suara</td>
                    <td class="align-middle text-center" rowspan="2">Presentase</td>
                </tr>
                <tr>
                    <td class="text-center">Total Perolehan</td>
                    <td class="text-center">Total</td>
                    <td class="text-center">Sah</td>
                    <td class="text-center">Tidak Sah</td>
                </tr>
            </thead>
            <tbody class="table-light">
                @foreach ($calon_hmj_mesin as $hmj)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $hmj->nama_ketua }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', '!=', null)->where('jurusan_id', '5')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->where('is_active', '1')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->where('is_active', '0')->count() }}</td>
                    <td class="text-center">{{ App\Models\User::where('hmj_id', $hmj->id)->where('is_active', '1')->count() / App\Models\User::count() * 100 }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="path/to/chartjs/dist/chart.umd.js"></script>
<script>
    const jmlP = document.getElementById('jmlPemilih');
    const jmlSuaraSah = document.getElementById('jmlSuaraSah');

    new Chart(jmlP, {
    type: 'doughnut',
    data: {
        labels: ['Sudah Memilih', 'Belum Memilih'],
        datasets: [{
        label: 'Jumlah Mahasiswa',
        data: [{{ $sudah_memilih->count() }}, {{ $belum_memilih->count() }}],
        borderWidth: 1,
        backgroundColor:['#36a2eb', '#ff6384']
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
    new Chart(jmlSuaraSah, {
    type: 'doughnut',
    data: {
        labels: ['Suara Sah', 'Suara Tidak Sah'],
        datasets: [{
        label: 'Jumlah Mahasiswa',
        data: [{{ $suara_sah->count() }}, {{ $suara_tidak_sah->count() }}],
        backgroundColor: ['#ffce56', '#cc65fe']
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
    new Chart(jmlSuaraBEM, {
    type: 'doughnut',
    data: {
        labels: ['Suara Sah', 'Suara Tidak Sah'],
        datasets: [{
        label: 'Jumlah Mahasiswa',
        data: [{{ $suara_sah->count() }}, {{ $suara_tidak_sah->count() }}],
        backgroundColor: ['#ffce56', '#cc65fe']
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