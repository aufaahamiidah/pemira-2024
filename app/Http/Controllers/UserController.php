<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

     
    // Import Data Mahasiswa Melalui Excel
    // Link Library https://docs.laravel-excel.com/3.1/imports/
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

        // upload ke folder file_mahasiswa di dalam folder public
        $file->move('file_mahasiswa', $nama_file);

        Excel::import(new UsersImport, public_path("/file_mahasiswa/$nama_file"));
        return redirect('/daftar-mahasiswa')->with('success', 'Anda Telah Berhasil Melakukan Import Data Peserta Pemilihan Raya');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        DB::table('users')->where('id', $id)->update([
            'nama'      => $request->nama,
            'nim'       => $request->nim,
            'nohp'      => $request->nohp,
            'gender'    => $request->gender,
            'kelas_id'  => $request->kelas,
            'status'    => $request->status,
        ]);

        return redirect(route('Daftar Mahasiswa'))->with('edit','Data Mahasiswa Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        DB::table('users')->where('id', $id)->delete();

        return redirect(route('Daftar Mahasiswa'))->with('delete','Data Berhasil Dihapus');
    }
}
