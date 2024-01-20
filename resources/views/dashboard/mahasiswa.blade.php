@extends('layouts.main')

@section('container')
    <h1>Daftar Mahasiswa</h1>    
    <div class="card shadow">
        <div class="card-header">
          <div class="row">
            <div class="col-md-2 col-sm-3">
                <button class="btn btn-primary">Import Data</button>
            </div>
            <div class="col-md-7 col-sm-9">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Insert Your Search..." aria-label="Insert Your Search..." aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
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
                              aria-expanded="false"
                          >
                              5
                          </button>
                          <div class="dropdown-menu" aria-labelledby="triggerId">
                              <button class="dropdown-item" href="#">All</button>
                              <button class="dropdown-item" href="#">10</button>
                              <button class="dropdown-item" href="#">25</button>
                              <button class="dropdown-item" href="#">50</button>
                              <button class="dropdown-item" href="#">100</button>
                          </div>
                      </div>
                      <div class="dropdown open">
                          <b>Filter</b>
                          <button
                              class="btn border-secondary dropdown-toggle rounded-pill"
                              type="button"
                              id="triggerId"
                              data-bs-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                          >
                              All
                          </button>
                          <div class="dropdown-menu" aria-labelledby="triggerId">
                              <button class="dropdown-item" href="#">All</button>
                              <button class="dropdown-item" href="#">Jurusan</button>
                          </div>
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
                    <th scope="col">Nama</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Kata Sandi</th>
                    <th scope="col">Jurusan</th>
                    <th class="text-center" scope="col">BEM</th>
                    <th class="text-center" scope="col">BPM</th>
                    <th class="text-center" scope="col">HMJ</th>
                    <th class="text-center" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Nita Yuliana</td>
                    <td>3.52.22.2.18</td>
                    <td>lPi2uAOP</td>
                    <td>Administrasi Bisnis</td>
                    <td class="text-center">✅</td>
                    <td class="text-center">✅</td>
                    <td class="text-center">✅</td>
                    <td class="text-center d-flex justify-content-center gap-1">
                      <button class="btn btn-sm rounded-pill btn-warning"><i class="bi bi-pencil-square"></i>Edit</button>
                      <button class="btn btn-sm rounded-pill btn-danger"><i class="bi bi-trash"></i>Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Administrasi Bisnis</td>
                    <td class="text-center">✅</td>
                    <td class="text-center">✅</td>
                    <td class="text-center">✅</td>
                    <td class="text-center d-flex justify-content-center gap-1">
                      <button class="btn btn-sm rounded-pill btn-warning"><i class="bi bi-pencil-square"></i>Edit</button>
                      <button class="btn btn-sm rounded-pill btn-danger"><i class="bi bi-trash"></i>Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    <td>Administrasi Bisnis</td>
                    <td class="text-center">☑️</td>
                    <td class="text-center">☑️</td>
                    <td class="text-center">☑️</td>
                    <td class="text-center d-flex justify-content-center gap-1">
                      <button class="btn btn-sm rounded-pill btn-warning"><i class="bi bi-pencil-square"></i>Edit</button>
                      <button class="btn btn-sm rounded-pill btn-danger"><i class="bi bi-trash"></i>Delete</button>
                    </td>
                  </tr>
                </tbody>
            </table>
        </div>
      </div>
      @endsection