<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("dashboard.index",[
            "title" => "Home | Pemilihan Raya 2024",
            "active" => "home",
        ]);
    }

    public function mahasiswa(){
        return view("dashboard.mahasiswa", [
            "title" => "Daftar Mahasiswa | Pemilihan Raya 2024",
            "active" => "mahasiswa",
        ]);
    }

    public function susulan(){
        return view("dashboard.susulan", [
            "title"=> "Daftar Mahasiswa Susulan | Pemilihan Raya 2024",
            "active" => "susulan",
        ]);
    }

    public function calon(){
        return view("dashboard.calon", [
            "title"=> "Daftar Calon | Pemilihan Raya 2024",
            "active" => "calon",
        ]);
    }
}
