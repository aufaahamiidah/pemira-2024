@extends('layouts.main2')

@section('container_menu')
<!-- pilihan -->
<div class="container px-4 text-center mt-5">
    <div class="row" style="height: 100vh">
        <div class="col d-flex justify-content-center align-items-center">
            <div class="card">
                <form action="{{ route('Update Foto Mahasiswa') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h6 class="calon-header card-header text-center m-0 py-2 text-white fw-semibold">Verifikasi Foto
                    </h6>
                    <div class="card-body">
                        <p class="card-text mb-3">
                            Lakukan verifikasi identitas dengan cara melakukan foto selfie dengan membawa Kartu Tanda
                            Mahasiswa (KTM) atau bukti lain yang dapat membuktikan bahwa kamu adalah mahasiswa
                            Politeknik
                            Negeri Semarang dan akun ini adalah benar milikmu. Pastikan foto wajah dan kartu identitas
                            terlihat jelas, terutama kolom nama pada kartu identitas, apabila tidak maka suara mu
                            dianggap
                            tidak sah.
                        </p>
                        <div class="d-flex flex-column justify-content-center align-items-center mb-3">
                            <img src="/assets/KTM.jpg" id="preview-image" class="object-fit-cover mb-2" alt=""
                                style="width: 30vw; max-width: 300px; min-width: 150px;" />
                            <p class="card-text fs-5">Posisikan KTM anda seperti gambar diatas</p>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" id="file-input" name="file" class="form-control" id="inputGroupFile01" />
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const fileInput = document.getElementById('file-input');

        const previewImage = document.getElementById('preview-image');

        fileInput.addEventListener('change', event => {
            if (event.target.files.length > 0) {
                previewImage.src = URL.createObjectURL(
                    event.target.files[0],
                );

                previewImage.style.display = 'block';
            }
        });
</script>
@endsection