<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use App\Models\User;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('user_create', [
            'kelas' => Kelas::all(),
        ]);
    }
    // public function store(Request $request){
    //     $data = [
    //         'nama'=>$request->input('nama'),
    //         'kelas'=>$request->input('kelas'),
    //         'npm'=>$request->input('npm'),
    //     ];
    //     return view('profile', $data);
    // }
    public function store(Request $request){
        $validateData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = UserModel::create($validateData);

        $user->load('kelas');

        return view ('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        ]);
    }
}