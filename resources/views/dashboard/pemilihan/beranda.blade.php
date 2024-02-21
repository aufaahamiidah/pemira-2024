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
        <div class="col">
            <div class="p-3">
                <button type="button" class="border-0" data-bs-toggle="modal" data-bs-target="#modalHMJ">
                    <div class="card py-5" style="width: 30rem;">
                        <div class="card-body">
                            @if ($user == 1)
                            <img src="assets/HIMA.svg" width="120" alt="" class="mb-4">
                            <h3 class="card-title" style="font-weight: bold;">Himpunan Mahasiswa Jurusan Akuntansi
                                (HIMA) </h3>
                            @elseif ($user == 2)
                            <img src="assets/HMAB.svg" width="120" alt="" class="mb-4">
                            <h3 class="card-title" style="font-weight: bold;">Himpunan Mahasiswa Jurusan
                                Administrasi
                                Bisnis (HMAB) </h3>
                            @elseif ($user == 3)
                            <img src="assets/HME.svg" width="120" alt="" class="mb-4">
                            <h3 class="card-title" style="font-weight: bold;">Himpunan Mahasiswa Jurusan Elektro
                                (HME)
                            </h3>
                            @elseif ($user == 4)
                            <img src="assets/HMS.svg" width="120" alt="" class="mb-4">
                            <h3 class="card-title" style="font-weight: bold;">Himpunan Mahasiswa Jurusan Sipil (HMS)
                            </h3>
                            @elseif ($user == 5)
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
                <form action="{{ route('submitBEM') }}" method="post" id="formBEM">
                    @csrf
                    <div class="decision row d-flex justify-content-center">
                        @foreach ($bem as $item)
                        <div class="col-lg-6 col-sm-12">
                            <div class="p-3">
                                <div class="form-check card">
                                    <h5 class="card-header text-center font-weight-bold">{{ $item->no_urut }}</h5>
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ $item->foto_ketua }}" alt="foto_ketua">
                                            <h5 class="card-title">{{ $item->nama_ketua }}</h5>
                                        </div>
                                        <div class="col">
                                            <img src="{{ $item->foto_wakil }}" alt="foto_wakil">
                                            <h5 class="card-title">{{ $item->nama_wakil }}</h5>
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
                                        <input class="form-check-input" type="radio" name="bem" id="bem{{ $item->id }}"
                                            value="{{ $item->id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                            <button type="submit" onclick="submitBEM(event)" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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
                <form action="{{ route('submitBPM') }}" method="post" id="formBPM">
                    @csrf
                    <div class="decision row">
                        @foreach ($bpm as $item)
                        <div class="col-lg-6 col-sm-12">
                            <div class="p-3">
                                <div class="form-check card">
                                    <h5 class="card-header text-center font-weight-bold">{{ $item->no_urut }}</h5>
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ $item->foto_ketua }}" alt="foto_ketua">
                                            <h5 class="card-title">{{ $item->nama_ketua }}</h5>
                                        </div>
                                        <div class="col">
                                            <img src="{{ $item->foto_wakil }}" alt="foto_wakil">
                                            <h5 class="card-title">{{ $item->nama_wakil }}</h5>
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
                                        <input class="form-check-input" type="radio" name="bpm" id="bpm{{ $item->id }}"
                                            value="{{ $item->id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <button type="submit" onclick="submitBPM(event)" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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
                    @if ($user == 1)
                    <img src="assets/HIMA.svg" width="120" alt="" class="mb-4">
                    @elseif ($user == 2)
                    <img src="assets/HMAB.svg" width="120" alt="" class="mb-4">
                    @elseif ($user == 3)
                    <img src="assets/HME.svg" width="120" alt="" class="mb-4">
                    @elseif ($user == 4)
                    <img src="assets/HMS.svg" width="120" alt="" class="mb-4">
                    @elseif ($user == 5)
                    <img src="assets/HMM.svg" width="120" alt="" class="mb-4">
                    @endif
                    <h5 style="font-weight: bold; text-align: center;">CALON PRESIDEN DAN WAKIL PRESIDEN MAHASISWA</h5>
                </div>
                <form action="{{ route('submitBPM') }}" method="post" id="formHMJ">
                    @csrf
                    <div class="decision row">
                        @foreach ($hmj as $item)
                        <div class="col-lg-6 col-sm-12">
                            <div class="p-3">
                                <div class="form-check card">
                                    <h5 class="card-header text-center font-weight-bold">{{ $item->no_urut }}</h5>
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ $item->foto_ketua }}" alt="foto_ketua">
                                            <h5 class="card-title">{{ $item->nama_ketua }}</h5>
                                        </div>
                                        <div class="col">
                                            <img src="{{ $item->foto_wakil }}" alt="foto_wakil">
                                            <h5 class="card-title">{{ $item->nama_wakil }}</h5>
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
                                        <input class="form-check-input" type="radio" name="hmj" id="hmj{{ $item->id }}"
                                            value="{{ $item->id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                            <button type="submit" onclick="submitHMJ(event)" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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
            title: 'KONFIRMASI PILIHAN ANDA',
            buttons: {
                konfirmasi: {
                    text: 'Konfirmasi',
                    value: true
                },
                cancel: "Ulangi"
            }
        }).then((result) => {
            if (result) {
                Swal.fire('Terimakasih Telah Berpartisipasi', '', 'success');
                document.getElementById("formBEM").submit();
            }
        });
    }

    function submitBPM(e){
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
            title: 'KONFIRMASI PILIHAN ANDA',
            buttons: {
                konfirmasi: {
                    text: 'Konfirmasi',
                    value: true
                },
                cancel: "Ulangi"
            }
        }).then((result) => {
            if (result) {
                Swal.fire('Terimakasih Telah Berpartisipasi', '', 'success');
                document.getElementById("formBPM").submit();
            }
        });
    }
    function submitHMJ(e) {
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
            title: 'KONFIRMASI PILIHAN ANDA',
            buttons: {
                konfirmasi: {
                    text: 'Konfirmasi',
                    value: true
                },
                cancel: "Ulangi"
            }
        }).then((result) => {
            if (result) {
                Swal.fire('Terimakasih Telah Berpartisipasi', '', 'success');
                document.getElementById("formHMJ").submit();
            }
        });
    }
</script>
