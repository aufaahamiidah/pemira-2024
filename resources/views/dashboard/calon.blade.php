@extends('layouts.main') @section('container')
<h1>Daftar Calon Pemilihan Raya 2024</h1>
<div class="card shadow">
    <div class="card-header">
        <div class="row">
            <div class="col-md-2 col-sm-3">
                <button class="btn btn-primary">Import Data</button>
            </div>
            <div class="col-md-7 col-sm-9">
                <div class="input-group mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Insert Your Search..."
                        aria-label="Insert Your Search..."
                        aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="d-flex gap-2">
                    <div class="dropdown open">
                        <b>Show</b>
                        <button
                            class="btn border-secondary dropdown-toggle rounded-pill"
                            type="button"
                            id="triggerId"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">5</button>
                        <div class="dropdown-menu" aria-labelledby="triggerId">
                            <button class="dropdown-item" href="#">All</button>
                            <button class="dropdown-item" href="#">10</button>
                            <button class="dropdown-item" href="#">25</button>
                            <button class="dropdown-item" href="#">50</button>
                            <button class="dropdown-item" href="#">100</button>
                        </div>
                    </div>
                    <div class="dropdown open">
                        <b>Kelas</b>
                        <select class="btn border-secondary dropdown-toggle rounded-pill">
                            <option class="dropdown-item" value="">PS-1A</option>
                            <option class="dropdown-item" value="">PS-2A</option>
                            <option class="dropdown-item" value="">PS-3A</option>
                            <option class="dropdown-item" value="">PS-4A</option>
                            <option class="dropdown-item" value="">IK-1A</option>
                            <option class="dropdown-item" value="">IK-2A</option>
                            <option class="dropdown-item" value="">IK-3A</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th class="text-center" scope="col">Ormawa</th>
                    <th class="text-center" scope="col">No Urut</th>
                    <th class="text-center" scope="col">Kelas</th>
                    <th class="text-center" scope="col">Jurusan</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration}}</th>
                    <td>{{ $user->nama_ketua }}
                        |
                        {{ $user->nama_wakil }}</td>
                    <td class="text-center">{{ $user->type }}</td>
                    <td class="text-center">{{ $user->no_urut }}</td>
                    <td class="text-center">{{ $user->kelas_ketua->nama_kelas }}</td>
                    <td class="text-center">{{ $user->kelas_ketua->jurusan->nama_jurusan }}</td>
                    <td class="text-center d-flex justify-content-center gap-1">
                        <button class="btn btn-sm rounded-pill btn-info">
                            <i class="bi bi-info-circle"></i>Detail</button>
                        <button
                            type="button"
                            class="btn btn-sm rounded-pill btn-warning"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $user->id }}">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                        <button
                            type="button"
                            class="btn btn-sm rounded-pill btn-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $user->id }}">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <th scope="row">1</th>
                    <td>Nita Yuliana</td>
                    <td class="text-center">BEM</td>
                    <td class="text-center">3</td>
                    <td class="text-center">IK-3A</td>
                    <td class="text-center">Teknik Elektro</td>
                    <td class="text-center d-flex justify-content-center gap-1">
                        <button class="btn btn-sm rounded-pill btn-info">
                            <i class="bi bi-info-circle"></i>Detail</button>
                        <button class="btn btn-sm rounded-pill btn-warning">
                            <i class="bi bi-pencil-square"></i>Edit</button>
                        <button class="btn btn-sm rounded-pill btn-danger">
                            <i class="bi bi-trash"></i>Delete</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Nita Yuliana</td>
                    <td class="text-center">BEM</td>
                    <td class="text-center">3</td>
                    <td class="text-center">IK-3A</td>
                    <td class="text-center">Teknik Elektro</td>
                    <td class="text-center d-flex justify-content-center gap-1">
                        <button class="btn btn-sm rounded-pill btn-info">
                            <i class="bi bi-info-circle"></i>Detail</button>
                        <button class="btn btn-sm rounded-pill btn-warning">
                            <i class="bi bi-pencil-square"></i>Edit</button>
                        <button class="btn btn-sm rounded-pill btn-danger">
                            <i class="bi bi-trash"></i>Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@foreach ($users as $user)
<!-- Modal Edit Mahasiswa -->
<div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Edit Data Calon Pemira</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('Update Data Calon', $user->id) }}" method="post">
        @csrf
        <div class="modal-body">
          <label for="nama" class="form-label">Nama Lengkap :</label>
          <input class="form-control mb-3" type="text" name="nama" id="nama" value="{{ $user->nama }}" required>
          <label for="nim" class="form-label">NIM :</label>
          <input class="form-control mb-3" type="text" name="nim" id="nim" value="{{ $user->nim }}" required>
          <label for="nohp" class="form-label">No HP :</label>
          <input class="form-control mb-3" type="text" name="nohp" id="nohp" value="{{ $user->nohp }}" required>
          <label for="gender" class="form-label">Jenis Kelamin :</label>
          <select class="form-select mb-3" name="gender" id="gender" required>
            <option value="L">Laki - Laki</option>
            <option value="P">Perempuan</option>
          </select>
          <label for="kelas" class="form-label">Kelas :</label>
          <select class="form-select mb-3" name="kelas" id="kelas" required>
            <option value="1">PS - 1A</option>
            <option value="2">PS - 2A</option>
            <option value="3">PS - 3A</option>
            <option value="4">PS - 4A</option>
          </select>
          <label for="status" class="form-label">Status Mahasiswa :</label>
          <select class="form-select mb-3" name="status" id="status" required>
            <option value="aktif">Mahasiswa Aktif</option>
            <option value="tidak aktif">Mahasiswa Tidak Aktif/Magang</option>
          </select>
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
<div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
@endsection