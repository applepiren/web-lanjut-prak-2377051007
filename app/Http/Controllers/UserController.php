<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use App\Models\User;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function create(){
    //     return view('create_user', [
    //         'kelas' => Kelas::all(),
    //     ]);
    // }
    // public function store(Request $request){
    //     $data = [
    //         'nama'=>$request->input('nama'),
    //         'kelas'=>$request->input('kelas'),
    //         'npm'=>$request->input('npm'),
    //     ];
    //     return view('profile', $data);
    // }

    public function create()
    {
        $kelasModel = new Kelas();

        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('user_create', $data);
    }
    
    public function store(Request $request){
        $validateData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $this->userModel->create($validateData);

        return redirect()->to('/user');

        // $user = UserModel::create($validateData);

        // $user->load('kelas');

        // return view ('profile', [
        //     'nama' => $user->nama,
        //     'npm' => $user->npm,
        //     'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        // ]);
    }

    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index(){
        $data = [
            'title' => 'Create User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }

}