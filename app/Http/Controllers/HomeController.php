<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Calon;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("dashboard.index",[
            "title" => "Home | Pemilihan Raya 2024",
            "active" => "home",
        ]);
    }

    public function mahasiswa(Request $request){
        // Membuat Sebuah Fitur Filter. dengan Menggunakan Query Scope. => Cek Models
        if(request(['search', 'kelas', 'show'])){
            // Jika Menggunakan Filter
            // with() menggunakan Relationship Database(Eloquent ORM Laravel), paginate() Menggunakan Pagination Database
            $users = User::with('kelas', 'jurusan', 'bem')->where('status', 'aktif')->filter(request(['search', 'kelas']))->paginate((request('show')?? 100))->withQueryString();
        } else {
            // Jika tidak menggunakan Filter
            $users = User::with('kelas', 'jurusan', 'bem')->where('status', 'aktif')->paginate(100);
        }

        return view("dashboard.mahasiswa", [
            "title" => "Daftar Mahasiswa | Pemilihan Raya 2024",
            "active" => "mahasiswa",
            "users" => $users,
        ]);
    }

    public function susulan(){
        // Membuat Sebuah Fitur Filter. dengan Menggunakan Query Scope. => Cek Models
        if(request(['search', 'kelas', 'show'])){
            // Jika Menggunakan Filter
            // with() menggunakan Relationship Database(Eloquent ORM Laravel), paginate() Menggunakan Pagination Database
            $users = User::with('kelas', 'jurusan', 'calon')->where('status', 'tidak aktif')->filter(request(['search', 'kelas']))->paginate((request('show')?? 10))->withQueryString();
        } else {
            // Jika tidak menggunakan Filter
            $users = User::with('kelas', 'jurusan', 'calon')->where('status', 'tidak aktif')->paginate(10);
        }

        return view("dashboard.susulan", [
            "title"=> "Daftar Mahasiswa Susulan | Pemilihan Raya 2024",
            "active" => "susulan",
            "users" => $users,
        ]);
    }

    public function calon(){
        return view("dashboard.calon", [
            "title"=> "Daftar Calon | Pemilihan Raya 2024",
            "active" => "calon",
            "users" => Calon::get(),
        ]);
    }
}
