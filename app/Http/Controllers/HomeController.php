<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Calon;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function welcome(){
        return view('welcome', [
            'title' => 'Welcome To Pemilihan Raya 2024'
        ]);
    }

    public function index()
    {
        if(Auth::user()->role == 'mahasiswa'){
            return redirect(route('Beranda'));
        } else {
            return view("dashboard.admin.index", [
                "title" => "Home | Pemilihan Raya 2024",
                "active" => "home",
                'jumlah_mahasiswa' => User::count(),
                "calon_bem" => Calon::where('type', 'BEM')->get(),
                "calon_bpm_akuntansi" => Calon::where('type', 'BPM')->where('jurusan_id', '1')->get(),
                "calon_bpm_adbis" => Calon::where('type', 'BPM')->where('jurusan_id', '2')->get(),
                "calon_bpm_elektro" => Calon::where('type', 'BPM')->where('jurusan_id', '3')->get(),
                "calon_bpm_sipil" => Calon::where('type', 'BPM')->where('jurusan_id', '4')->get(),
                "calon_bpm_mesin" => Calon::where('type', 'BPM')->where('jurusan_id', '5')->get(),
                "calon_hmj_akuntansi" => Calon::where('type', 'HMJ')->where('jurusan_id', '1')->get(),
                "calon_hmj_adbis" => Calon::where('type', 'HMJ')->where('jurusan_id', '2')->get(),
                "calon_hmj_elektro" => Calon::where('type', 'HMJ')->where('jurusan_id', '3')->get(),
                "calon_hmj_sipil" => Calon::where('type', 'HMJ')->where('jurusan_id', '4')->get(),
                "calon_hmj_mesin" => Calon::where('type', 'HMJ')->where('jurusan_id', '5')->get(),
                "sudah_memilih"  => User::where('bem_id', '!=', null)->where('bpm_id', '!=', null)->where('hmj_id', '!=', null),
                "belum_memilih"  => User::where('bem_id', '=', null)->where('bpm_id', '=', null)->where('hmj_id', '=', null),
                "suara_sah"  => User::where('is_active', '=', '1'),
                "suara_tidak_sah"  => User::where('is_active', '=', '0'),
            ]);
        }
    }

    public function mahasiswa(Request $request)
    {
        
        if(Auth::user()->role == 'mahasiswa'){
            return redirect(route('Beranda'));
        } else {
            // Membuat Sebuah Fitur Filter. dengan Menggunakan Query Scope. => Cek Models
            if (request(['search', 'kelas', 'show'])) {
                // Jika Menggunakan Filter
                // with() menggunakan Relationship Database(Eloquent ORM Laravel), paginate() Menggunakan Pagination Database
                $users = User::with('kelas', 'jurusan', 'bem')->where('status', 'aktif')->where('role', 'mahasiswa')->filter(request(['search', 'kelas']))->paginate((request('show') ?? 100))->withQueryString();
            } else {
                // Jika tidak menggunakan Filter
                $users = User::with('kelas', 'jurusan', 'bem')->where('status', 'aktif')->where('role', 'mahasiswa')->paginate(100);
            }

            $classes = Kelas::get();
    
            return view("dashboard.admin.mahasiswa", [
                "title" => "Daftar Mahasiswa | Pemilihan Raya 2024",
                "active" => "mahasiswa",
                "users" => $users,
                "classes" => $classes,
            ]);
        }
    }

    public function susulan()
    {
        if(Auth::user()->role == 'mahasiswa'){
            return redirect(route('Beranda'));
        } else {
            // Membuat Sebuah Fitur Filter. dengan Menggunakan Query Scope. => Cek Models
            if (request(['search', 'kelas', 'show'])) {
                // Jika Menggunakan Filter
                // with() menggunakan Relationship Database(Eloquent ORM Laravel), paginate() Menggunakan Pagination Database
                $users = User::with('kelas', 'jurusan')->where('status', 'tidak aktif')->where('role', 'mahasiswa')->filter(request(['search', 'kelas']))->paginate((request('show') ?? 10))->withQueryString();
            } else {
                // Jika tidak menggunakan Filter
                $users = User::with('kelas', 'jurusan')->where('status', 'tidak aktif')->where('role', 'mahasiswa')->paginate(100);
            }
    
            $classes = Kelas::get();
            return view("dashboard.admin.susulan", [
                "title" => "Daftar Mahasiswa Susulan | Pemilihan Raya 2024",
                "active" => "susulan",
                "users" => $users,
                "classes" => $classes,
            ]);
        }
    }

    public function calon()
    {
        if(Auth::user()->role == 'mahasiswa'){
            return redirect(route('Beranda'));
        } else {
            if (request(['search', 'type', 'kelas', 'show'])) {
                // Jika Menggunakan Filter
                // with() menggunakan Relationship Database(Eloquent ORM Laravel), paginate() Menggunakan Pagination Database
                $users = Calon::with('kelas', 'kelas_ketua', 'kelas_wakil')->filter(request(['search', 'type', 'kelas']))->paginate((request('show') ?? 10))->withQueryString();
            } else {
                // Jika tidak menggunakan Filter
                $users = Calon::with('kelas', 'kelas_ketua', 'kelas_wakil')->paginate(10);
            }
    
            $classes = Kelas::get();
            // dd($users[0]->kelas_ketua->nama_kelas);
            return view("dashboard.admin.calon", [
                "title" => "Daftar Calon | Pemilihan Raya 2024",
                "active" => "calon",
                "users" => $users,
                "data"  => Calon::with('kelas'),
                "classes" => $classes,
            ]);
        }
    }

    public function uploadFoto()
    {
        if(Auth::user()->status == 'tidak aktif'){
            return view('dashboard.pemilihan.upload_foto',[
                'title' => 'Upload Foto | Pemilihan Raya 2024'
            ]);
        } else {
            return redirect(route('Beranda'));
        }
    }

    public function beranda()
    {
        if(Auth::user()->role == 'mahasiswa'){
            if(Auth::user()->status == 'tidak aktif' && Auth::user()->foto == null){
                return redirect(route('Upload Foto Mahasiswa'));
            } else {
                return view('dashboard.pemilihan.beranda', [
                    'title' => 'Pemilihan Raya 2024',
                    'bem' => Calon::with('kelas_ketua', 'kelas')
                        ->where('type', 'bem')
                        ->get(),
                    'bpm' => Calon::with('kelas_ketua')
                        ->where('type', 'bpm')
                        ->where('jurusan_id', Auth::user()->jurusan_id)
                        ->get(),
                    'hmj' => Calon::with('kelas_ketua', 'kelas')
                        ->where('type', 'hmj')
                        ->where('jurusan_id', Auth::user()->jurusan_id)
                        ->get(),
                    'user' => User::with('jurusan', 'kelas')
                        ->where('jurusan_id', Auth::user()->jurusan_id)
                        ->get()
                        ->first(),
                ]);
            }
        } else {
            return redirect(route('home'));
        }
    }

    // public function tampilHMJ($id)
    // {
    //     $user = User::find($id);
    //     $kelas = $user->kelas;
    //     $hmj = DB::table('calons')
    //         ->join('kelas', 'calons.kelas_ketua_id', '=', 'kelas.id')
    //         ->join('jurusans', 'kelas.jurusan_id', '=', 'jurusans.id')
    //         ->where('kelas.jurusan_id', '=', $kelas->jurusan_id)
    //         ->where('type', '=', 'hmj')
    //         ->select('calons.*', 'kelas.nama_kelas', 'jurusans.nama_jurusan')
    //         ->get();
    //     return view('dashboard.pemilihan.himpunan', compact('hmj'));
    // }

    // public function tampilBEM($id)
    // {
    //     $user = User::find($id);
    //     $kelas = $user->kelas;
    //     $bem = DB::table('calons')
    //         ->join('kelas as ketua', 'calons.kelas_ketua_id', '=', 'ketua.id')
    //         ->join('kelas as wakil', 'calons.kelas_wakil_id', '=', 'wakil.id')
    //         ->join('jurusans', 'ketua.jurusan_id', '=', 'jurusans.id')
    //         ->where('type', '=', 'bem')
    //         ->get();
    //     return view('dashboard.pemilihan.bem', compact('bem'));
    // }

    // public function tampilBPM($id)
    // {
    //     $user = User::find($id);
    //     $kelas = $user->kelas;
    //     $bpm = DB::table('calons')
    //         ->join('kelas', 'calon.kelas_ketua_id', '=', 'kelas.id')
    //         ->join('jurusans','kelas.jurusan_id','=','jurusans.id')
    //         ->where('kelas.jurusan_id','=',$kelas->jurusan_id)
    //         ->where('type', '=', 'bpm')
    //         ->select('calons.*', 'kelas.nama_kelas','jurusans.nama_jurusan')
    //         ->get();
    //     return view('dashboard.pemilihan.bpm', compact('bpm'));
    // }
}
