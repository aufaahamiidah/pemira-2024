@extends('layouts.main')

@section('container')
    <h1>Daftar Mahasiswa Susulan</h1>    
    <div class="card shadow">
        <div class="card-header">
            <div class="row">
              <form class="row" action="{{ route('Daftar Mahasiswa Susulan') }}" method="get">
              <div class="col-md-2 col-sm-3">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Import">Import Data</button>
              </div>
                <div class="col-md-7 col-sm-9">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Insert Your Search..." value="{{ request('search') ?? '' }}" aria-label="Insert Your Search..." aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                  </div>
                </div>
                  <div class="col-md-3 col-sm-6">
                      <div class="d-flex gap-2">
                          <div class="dropdown open">
                            <b>Show</b>
                            <select class="btn border-secondary dropdown-toggle rounded-pill" name="show" value="PS-3A">
                              <option class="dropdown-item" value="{{ request('show') }}">({{ request('show') ?? 'Show' }})</option>
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
                              <select class="btn border-secondary dropdown-toggle rounded-pill" name="kelas" value="PS-3A">
                                  <option class="dropdown-item" value="{{ request('kelas') }}">({{ App\Models\Kelas::where('id', request('kelas'))->get()->first()->nama_kelas ?? 'Kelas' }})</option>
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
        @if( session()->has('verifikasi'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {!! session('verifikasi') !!}
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
                    <th scope="col">Nama</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Kata Sandi</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Jurusan</th>
                    <th class="text-center" scope="col">BEM</th>
                    <th class="text-center" scope="col">BPM</th>
                    <th class="text-center" scope="col">HMJ</th>
                    <th class="text-center" scope="col">Status Suara</th>
                    <th class="text-center" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->nim }}</td>
                    <td>{{ $user->pass }}</td>
                    <td>{{ $user->kelas->nama_kelas }}</td>
                    <td>{{ $user->jurusan->nama_jurusan }}</td>
                    <td class="text-center">✅</td>
                    <td class="text-center">✅</td>
                    <td class="text-center">✅</td>
                    <td class="text-center fw-bold {{ ($user->is_active == 1)? 'text-success' : 'text-danger' }}">{{ ($user->is_active == 1)? 'Suara Sah' : 'Suara Tidak Sah' }}</td>
                    <td class="text-center d-flex justify-content-center gap-1">
                        {{-- <button class="btn btn-sm rounded-pill btn-info"><i class="bi bi-image"></i> Foto</button> --}}
                        <button type="button" class="btn btn-sm rounded-pill btn-success" data-bs-toggle="modal" data-bs-target="#verifModal{{ $user->id }}">
                          <i class="bi bi-person-check"></i> Verification
                        </button>
                        {{-- <button class="btn btn-sm rounded-pill btn-success"><i class="bi bi-person-check"></i> Verification</button> --}}
                        <button type="button" class="btn btn-sm rounded-pill btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}">
                          <i class="bi bi-pencil-square"></i> Edit
                        </button>
                        <button type="button" class="btn btn-sm rounded-pill btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">
                          <i class="bi bi-trash"></i> Delete
                        </button>
                    </td>
                  </tr>
                  @endforeach
                  {{-- @if ($users->count() == 0)
                      <td colspan="11">
                        <h3 class="text-center text-secondary">Data Tidak Ditemukan</h3>
                      </td>
                  @endif --}}
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
      </div>
      <!-- Modal Import Data Mahasiswa -->
      <div class="modal fade" id="Import" tabindex="-1" aria-labelledby="ImportLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{ route('Import Data Mahasiswa Susulan') }}" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="ImportLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              @csrf
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
      <!-- Modal Edit Mahasiswa Susulan -->
      <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="editModalLabel">Edit Data Mahasiswa</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('Update Data Mahasiswa Susulan', $user->id) }}" method="post">
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

      <!-- Modal Detele Mahasiswa Susulan -->
      <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              Apakah Anda Yakin ingin Menghapus Data?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
              <a href="{{ route('Delete Data Mahasiswa Susulan', $user) }}" class="btn btn-primary">Yakin</a>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="verifModal{{ $user->id }}" tabindex="-1" aria-labelledby="verifModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="verifModalLabel">{{ $user->nama }}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('Verifikasi Data', $user->id) }}" method="post">
            @csrf
              <div class="modal-body">
                <img src="" alt="Gambar Bukti Mahasiswa"><br>
                <label for="suara" class="form-label">Status Suara :</label>
                <select class="form-select mb-3" name="suara" id="suara" required>
                  <option value="1">Suara Sah</option>
                  <option value="0">Suara Tidak Sah</option>
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Verifikasi</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      @endforeach
@endsection