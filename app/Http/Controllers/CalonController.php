<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Calon;
use App\Imports\CalonImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class CalonController extends Controller
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
    public function import(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file
        $nama_file = time() . $file->getClientOriginalName();

        // upload ke folder file_calon di dalam folder public
        $file->move('file_calon', $nama_file);

        Excel::import(new CalonImport, public_path("/file_calon/$nama_file"));
        return redirect(route('Daftar Calon'))->with('success', 'Anda Telah Berhasil Melakukan Import Data Calon Pemilihan Raya 2024');
    }

    /**
     * Display the specified resource.
     */
    public function show(Calon $calon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $tujuan_upload = 'assets/foto_calon';
        $foto_ketua = $request->foto_ketua;
        $lokasi_file_ketua = time()."-".$foto_ketua->getClientOriginalName();
		$foto_ketua->move($tujuan_upload,$lokasi_file_ketua);

        $foto_wakil = $request->foto_wakil;
        $lokasi_file_wakil = time()."-".$foto_wakil->getClientOriginalName();
		$foto_wakil->move($tujuan_upload,$lokasi_file_wakil);

        DB::table('calons')->where('id', $id)->update([
            'nama_ketua'    => $request->nama_ketua,
            'nama_wakil'    => $request->nama_wakil,
            'nim_ketua'     => $request->nim_ketua,
            'nim_wakil'     => $request->nim_wakil,
            'kelas_ketua_id'=> $request->kelas_ketua,
            'kelas_wakil_id'=> $request->kelas_wakil,
            'foto_ketua'    => $lokasi_file_ketua,
            'foto_wakil'    => $lokasi_file_wakil,
            'no_urut'       => $request->no_urut,
            'type'          => $request->type,
            'visi'          => $request->visi,
            'misi'          => $request->misi,
        ]);

        return redirect(route('Daftar Calon'))->with('edit','Data Calon Pemira Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        DB::table('calons')->where('id', $id)->delete();

        return redirect(route('Daftar Calon'))->with('delete','Data Calon Pemira Berhasil Dihapus');
    }

    //fungsi untuk submit hasil pilih pengguna
    public function submitPilihan(Request $request){
        User::where('id', Auth::user()->id)->update([
            'bem_id' => $request->bem,
            'bpm_id' => $request->bpm,
            'hmj_id' => $request->hmj,
            'is_active' => '1',
        ]);
        return redirect('/beranda')->with('success', 'Anda Telah Berhasil Memilih');
        
    }
}
