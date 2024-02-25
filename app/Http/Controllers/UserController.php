<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\UsersImportSusulan;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login | Pemilihan Raya 2024'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        return view('auth.register', [
            'title' => 'Registration | Pemilihan Raya 2024'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(){
        $validator = request()->validate([
            'name'      => 'required',
            'password'  => 'required',
            'konfirmasi'=> 'required|same:password'
        ]);


        User::create($validator);

        return redirect('/login')->with('success', 'Berhasil Melakukan Registrasi!! silahkan Login');

    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nim' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(Auth::user()->role == 'mahasiswa'){
                return redirect('/beranda');
            }else{
                return redirect('/home');
            }
        }

        return back()->with('error', 'Login Failed!! Please Retry Login');
    }

    // Melakukan Logout
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }




    // Import Data Mahasiswa Melalui Excel
    // Link Library https://docs.laravel-excel.com/3.1/imports/
    public function importMahasiswa(Request $request)
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
    public function importSusulan(Request $request)
    {

        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file
        $nama_file = time() . $file->getClientOriginalName();

        // upload ke folder file_susulan di dalam folder public
        $file->move('file_susulan', $nama_file);

        Excel::import(new UsersImportSusulan, public_path("/file_susulan/$nama_file"));
        return redirect('/daftar-mahasiswa-susulan')->with('success', 'Anda Telah Berhasil Melakukan Import Data Peserta Magang/Susulan Pemilihan Raya');
    }

    /**
     * Display the specified resource.
     */
    public function verification(Request $request, $id)
    {
        //
        DB::table('users')->where('id', $id)->update([
            'is_active' => $request->suara,
        ]);

        return redirect(route('Daftar Mahasiswa Susulan'))->with('verifikasi','Verifikasi Suara Mahasiswa Berhasil');

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
    // Mengedit Data Mahasiswa
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
    // Mengedit Data Mahasiwa Susulan
    public function updateSusulan(Request $request, $id)
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

        return redirect(route('Daftar Mahasiswa Susulan'))->with('edit','Data Mahasiswa Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Menghapus Data Mahasiswa
    public function destroy($id)
    {
        //
        DB::table('users')->where('id', $id)->delete();

        return redirect(route('Daftar Mahasiswa'))->with('delete','Data Berhasil Dihapus');
    }
    // Menghapus Data Mahasiswa Susulan
    public function destroySusulan($id)
    {
        //
        DB::table('users')->where('id', $id)->delete();

        return redirect(route('Daftar Mahasiswa Susulan'))->with('delete','Data Mahasiswa  Berhasil Dihapus');
    }

    //Mengambil data calon Himpunan sesuai jurusan
    public function tampilHimpunan($jurusan_id){
        DB::table('calons')
            ->join('kelas as k1', 'calons.kelas_ketua_id', '=', 'k1.id')
            ->join('kelas as k2', 'calons.kelas_wakil_id', '=', 'k2.id')
            ->select('calons.*', 'k1.nama_kelas')
            ->get();
    }

    // Update Foto Mahasiswa Magang
    public function updateFoto(Request $request){

        $id = Auth::user()->id;
        $tujuan_upload = 'assets/foto_mahasiswa';

        $file = $request->file;
        $lokasi_file = time()."-".$file->getClientOriginalName();
		$file->move($tujuan_upload,$lokasi_file);

        User::where('id', $id)->update([
            'foto' => $lokasi_file
        ]);

        return redirect(route('Beranda'));
    }
}