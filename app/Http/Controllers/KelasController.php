<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Imports\CalonImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if(Auth::user()->role == 'mahasiswa'){
            return redirect(route('Beranda'));
        } else {
            // Membuat Sebuah Fitur Filter. dengan Menggunakan Query Scope. => Cek Models
            if (request(['search', 'show'])) {
                // Jika Menggunakan Filter
                // with() menggunakan Relationship Database(Eloquent ORM Laravel), paginate() Menggunakan Pagination Database
                $class = Kelas::with('jurusan')->filter(request(['search']))->paginate((request('show') ?? 20))->withQueryString();
            } else {
                // Jika tidak menggunakan Filter
                $class = Kelas::with('jurusan')->paginate(20);
            }
            return view('dashboard.admin.kelas', [
                'title' => 'Daftar Kelas | Pemilihan Raya 2024',
                'classes' => $class,
                'active' => 'kelas',
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file
        $nama_file = time() . $file->getClientOriginalName();

        // upload ke folder file_kelas di dalam folder public
        $file->move('file_kelas', $nama_file);

        Excel::import(new CalonImport, public_path("/file_kelas/$nama_file"));
        return redirect(route('Daftar Kelas'))->with('success', 'Anda Telah Berhasil Melakukan Import Daftar Kelas Pemilihan Raya 2024');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
