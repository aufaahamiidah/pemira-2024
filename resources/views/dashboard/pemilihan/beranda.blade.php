@extends('layouts.main2')

@section('container_menu')
<!-- pilihan -->
<div class="container px-4 text-center mt-5">
    <div class="decision row gx-5">
        <div class="col">
            <div class="p-3">
                <button type="button" class="border-0" data-bs-toggle="modal" data-bs-target="#modalBEM">
                    <div class="card py-5" style="width: 30rem;">
                        <div class="card-body">
                            <img src="assets/BEM.svg" width="120" alt="" class="mb-4">
                            <h3 class="card-title" style="font-weight: bold;">Badan Eksekutif Mahasiswa (BEM)</h3>
                        </div>
                    </div>
                </button>
            </div>
        </div>
        <div class="col">
            <div class="p-3">
                <button type="button" class="border-0" data-bs-toggle="modal" data-bs-target="#modalBPM">
                    <div class="card py-5" style="width: 30rem;">
                        <div class="card-body">
                            <img src="assets/BPM.svg" width="120" alt="" class="mb-4">
                            <h3 class="card-title" style="font-weight: bold;">Badan Perwakilan Mahasiswa (BPM)</h3>
                        </div>
                    </div>
                </button>
            </div>
        </div>
        
<form action="{{ route('submitPilihan') }}" method="post" id="vote">
    @csrf
    <button type="submit" class="btn btn-success" onclick="konfirmasiPilihan(event)" role="button">Konfirmasi</button>
</form>
        <div class="col">
            <div class="p-3">
                <button type="button" class="border-0" data-bs-toggle="modal" data-bs-target="#modalHMJ">
                    <div class="card py-5" style="width: 30rem;">
                        <div class="card-body">
                            @if ($user->jurusan_id == 1)
                            <img src="assets/HIMA.svg" width="120" alt="" class="mb-4">
                            <h3 class="card-title" style="font-weight: bold;">Himpunan Mahasiswa Jurusan Akuntansi
                                (HIMA) </h3>
                            @elseif ($user->jurusan_id == 2)
                            <img src="assets/HMAB.svg" width="120" alt="" class="mb-4">
                            <h3 class="card-title" style="font-weight: bold;">Himpunan Mahasiswa Jurusan
                                Administrasi
                                Bisnis (HMAB) </h3>
                            @elseif ($user->jurusan_id == 3)
                            <img src="assets/HME.svg" width="120" alt="" class="mb-4">
                            <h3 class="card-title" style="font-weight: bold;">Himpunan Mahasiswa Jurusan Elektro
                                (HME)
                            </h3>
                            @elseif ($user->jurusan_id == 4)
                            <img src="assets/HMS.svg" width="120" alt="" class="mb-4">
                            <h3 class="card-title" style="font-weight: bold;">Himpunan Mahasiswa Jurusan Sipil (HMS)
                            </h3>
                            @elseif ($user->jurusan_id == 5)
                            <img src="assets/HMM.svg" width="120" alt="" class="mb-4">
                            <h3 class="card-title" style="font-weight: bold;">Himpunan Mahasiswa Jurusan Mesin (HMM)
                            </h3>
                            @endif
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalBEM" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalBEM" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="title text-center">
                    <img src="assets/BEM.svg" width="150" alt="" class="mb-4">
                    <h5 style="font-weight: bold; text-align: center;">CALON PRESIDEN DAN WAKIL PRESIDEN MAHASISWA</h5>
                </div>
                    <div class="decision row d-flex justify-content-center">
                        @foreach ($bem as $item)
                        <div class="col-lg-6 col-sm-12">
                            <div class="p-3">
                                <div class="form-check card">
                                    <h5 class="card-header text-center font-weight-bold bg-primary text-white mb-3">{{ $item->no_urut }}</h5>
                                    <div class="row">
                                        <div class="col text-center">
                                            <img src="{{ $item->foto_ketua ?? 'assets/profile.jpeg' }}" alt="foto_ketua" width="200">
                                            <h5 class="card-title mt-3">{{ $item->nama_ketua }}</h5>
                                        </div>
                                        <div class="col text-center">
                                            <img src="{{ $item->foto_wakil ?? 'assets/profile.jpeg' }}" alt="foto_wakil" width="200">
                                            <h5 class="card-title mt-3">{{ $item->nama_wakil }}</h5>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <label for="bem{{ $item->id }}">
                                            <hr>
                                            <h6 class="card-text">Visi</h6>
                                            <p class="card-text">{{ $item->visi }}</p>
                                            <h6 class="card-text">Misi</h6>
                                            <p class="card-text">{{ $item->misi }}</p>
                                        </label>
                                        <input class="form-check-input" type="radio" name="bem" form="vote" id="bem{{ $item->id }}"
                                            value="{{ $item->id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                            <button type="button" onclick="submitBEM(event)" class="btn btn-primary">Submit</button>
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalBPM" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalBPM" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="title text-center">
                    <img src="assets/BPM.svg" width="120" alt="" class="mb-4">
                    <h5 style="font-weight: bold; text-align: center;">CALON PRESIDEN DAN WAKIL PRESIDEN MAHASISWA</h5>
                </div>
                    <div class="decision row">
                        @foreach ($bpm as $item)
                        <div class="col-lg-6 col-sm-12">
                            <div class="p-3">
                                <div class="form-check card">
                                    <h5 class="card-header text-center font-weight-bold bg-primary text-white mb-3">{{ $item->no_urut }}</h5>
                                    <div class="row">
                                        <div class="col text-center">
                                            <img src="{{ $item->foto_ketua ?? 'assets/profile.jpeg' }}" alt="foto_ketua" width="200">
                                            <h5 class="card-title mt-3">{{ $item->nama_ketua }}</h5>
                                        </div>
                                        <div class="col text-center">
                                            <img src="{{ $item->foto_wakil ?? 'assets/profile.jpeg' }}" alt="foto_wakil" width="200">
                                            <h5 class="card-title mt-3">{{ $item->nama_wakil }}</h5>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <label for="bpm{{ $item->id }}">
                                            <hr>
                                            <h6 class="card-text">Visi</h6>
                                            <p class="card-text">{{ $item->visi }}</p>
                                            <h6 class="card-text">Misi</h6>
                                            <p class="card-text">{{ $item->misi }}</p>
                                        </label>
                                        <input class="form-check-input" type="radio" name="bpm" form="vote" id="bpm{{ $item->id }}"
                                            value="{{ $item->id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <button type="button" onclick="submitBPM(event)" class="btn btn-primary">Submit</button>
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalHMJ" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalHMJ" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="title text-center">
                    @if ($user->jurusan_id == 1)
                    <img src="assets/HIMA.svg" width="120" alt="" class="mb-4">
                    @elseif ($user->jurusan_id == 2)
                    <img src="assets/HMAB.svg" width="120" alt="" class="mb-4">
                    @elseif ($user->jurusan_id == 3)
                    <img src="assets/HME.svg" width="120" alt="" class="mb-4">
                    @elseif ($user->jurusan_id == 4)
                    <img src="assets/HMS.svg" width="120" alt="" class="mb-4">
                    @elseif ($user->jurusan_id == 5)
                    <img src="assets/HMM.svg" width="120" alt="" class="mb-4">
                    @endif
                    <h5 style="font-weight: bold; text-align: center;">CALON PRESIDEN DAN WAKIL PRESIDEN MAHASISWA</h5>
                </div>
                    <div class="decision row">
                        @foreach ($hmj as $item)
                        <div class="col-lg-6 col-sm-12">
                            <div class="p-3">
                                <div class="form-check card">
                                    <h5 class="card-header text-center font-weight-bold bg-primary text-white mb-3">{{ $item->no_urut }}</h5>
                                    <div class="row">
                                        <div class="col text-center">
                                            <img src="{{ $item->foto_ketua ?? 'assets/profile.jpeg' }}" alt="foto_ketua" width="200">
                                            <h5 class="card-title mt-3">{{ $item->nama_ketua }}</h5>
                                        </div>
                                        <div class="col text-center">
                                            <img src="{{ $item->foto_wakil ?? 'assets/profile.jpeg' }}" alt="foto_wakil" width="200">
                                            <h5 class="card-title mt-3">{{ $item->nama_wakil }}</h5>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <label for="hmj{{ $item->id }}">
                                            <hr>
                                            <h6 class="card-text">Visi</h6>
                                            <p class="card-text">{{ $item->visi }}</p>
                                            <h6 class="card-text">Misi</h6>
                                            <p class="card-text">{{ $item->misi }}</p>
                                        </label>
                                        <input class="form-check-input" type="radio" name="hmj" form="vote" id="hmj{{ $item->id }}"
                                            value="{{ $item->id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                            <button type="button" onclick="submitHMJ(event)" class="btn btn-primary">Submit</button>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    function submitBEM(e) {
        e.preventDefault();

        var bem = document.getElementsByName('bem');
        var selectedBEM = false;
        for (let i = 0; i < bem.length; i++) {
            if (bem[i].checked) {
                selectedBEM = true;
                break;
            }
        }
        //Tampilkan pesan error jika tidak ada pilihan
        if(!selectedBEM){
            Swal.fire({
                icon: 'error',
                title: 'Pilihan Presma Wapresma belum dipilih',
                text: 'Mohon pilih salah satu',
            });
            return;
        }

        //konfirmasi ulang pilihan
        Swal.fire({
            icon: 'success',
            title: 'Anda Telah Memilih',
            buttons: {
                konfirmasi: {
                    text: 'Konfirmasi',
                    value: true
                },
                cancel: "Ulangi"
            }
        });
    }

    function submitBPM(e){
        e.preventDefault();
        var bpm = document.getElementsByName('bpm');
        var selectedBPM = false;
        for (let i = 0; i < bpm.length; i++) {
            if (bpm[i].checked) {
                selectedBPM = true;
                break;
            }
        }

        //Tampilkan pesan error jika tidak ada pilihan
        if(!selectedBPM){
            swal({
                icon: 'error',
                title: 'Pilihan BPM belum dipilih',
                text: 'Mohon pilih salah satu',
            });
            return;
        }
        //konfirmasi ulang pilihan
        Swal.fire({
            icon: 'success',
            title: 'Anda Telah Memilih',
            buttons: {
                konfirmasi: {
                    text: 'Konfirmasi',
                    value: true
                },
                cancel: "Ulangi"
            }
        });
    }
    function submitHMJ(e) {
        e.preventDefault();
        var hmj = document.getElementsByName('hmj');
        var selectedHMJ = false;
        for (let i = 0; i < hmj.length; i++) {
            if (hmj[i].checked) {
                selectedHMJ = true;
                break;
            }
        }
        if (!selectedHMJ) {
            Swal.fire({
                icon: 'error',
                title: 'Pilihan Ketua Himpunan belum dipilih',
                text: 'Mohon pilih salah satu',
            });
            return;

        }
        //konfirmasi ulang pilihan
        Swal.fire({
            icon: 'success',
            title: 'Anda Telah Memilih',
            buttons: {
                konfirmasi: {
                    text: 'Konfirmasi',
                    value: true
                },
                cancel: "Ulangi"
            }
        });
    }

    function konfirmasiPilihan(e){
        e.preventDefault();
        
        var bem = document.getElementsByName('bem');
        var selectedBEM = false;
        for (let i = 0; i < bem.length; i++) {
            if (bem[i].checked) {
                selectedBEM = true;
                break;
            }
        }
        var hmj = document.getElementsByName('hmj');
        var selectedHMJ = false;
        for (let i = 0; i < hmj.length; i++) {
            if (hmj[i].checked) {
                selectedHMJ = true;
                break;
            }
        }
        var bpm = document.getElementsByName('bpm');
        var selectedBPM = false;
        for (let i = 0; i < bpm.length; i++) {
            if (bpm[i].checked) {
                selectedBPM = true;
                break;
            }
        }
        //Tampilkan pesan error jika tidak ada pilihan
        if(!selectedBEM){
            Swal.fire({
                icon: 'error',
                title: 'Anda Belum Memilih Calon Badan Eksekutif Mahasiswa',
                text: 'Mohon pilih salah satu',
            });
            return;
        }
        if(!selectedBPM){
            Swal.fire({
                icon: 'error',
                title: 'Anda Belum Memilih Calon Badan Pengawas Mahasiswa',
                text: 'Mohon pilih salah satu',
            });
            return;
        }
        if(!selectedHMJ){
            Swal.fire({
                icon: 'error',
                title: 'Anda Belum Memilih Calon Himpunan Jurusan',
                text: 'Mohon pilih salah satu',
            });
            return;
        }

        //konfirmasi ulang pilihan
        Swal.fire({
            title: 'KONFIRMASI PILIHAN ANDA',
            buttons: {
                confirm: {
                    text: 'Konfirmasi',
                    value: true
                },
                cancel: "Ulangi"
            }
        }).then((result) => {
            if (result) {
                Swal.fire('Terimakasih Telah Berpartisipasi', '', 'success');
                document.getElementById("vote").submit();
            }
        });
        
    }
</script>
