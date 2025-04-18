<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($nama = "", $kelas = "", $npm = "")
    {
        return view('profile', [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ]);
    }
   
    
}
