<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('user_create');
    }

    public function store(Request $_request){
        // $data = $_request->all();
        // dd($data);
        $data = [
            'nama'=> $_request->input('nama'),
            'kelas'=> $_request->input('kelas'),
            'npm'=> $_request->input('npm'),    
        ];
        return view('profile', $data);
    }
}
