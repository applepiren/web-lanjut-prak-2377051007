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
            'title' => 'user create',
            'kelas' => $kelas,
        ];

        return view('user_create', $data);
    }
    
    public function store(Request $request){
        $validateData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], 
        [
            'nama.required' => 'Nama tidak boleh kosong!',
            'nama.max' => 'Nama tidak boleh lebih dari 255 kata',
            'npm.required' => 'NPM tidak boleh kosong',
            'npm.size' => 'NPM harus terdiri dari 10 digit',
            'foto.image' => 'File harus berupa gambar',
            'foto.max' => 'Max size foto adalah 2mb',
        ]
        );

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('upload/img', $fotoPath);
        } else {
            $fotoPath = null;
        }

            $this->userModel->create([
                'nama' => $request->input('nama'),
                'npm' => $request->input('npm'),
                'kelas_id' => $request->input('kelas_id'),
                'foto' => $fotoPath, // Menyimpan path foto
                ]);
                 return redirect()->to('/')->with('success', 'User
                berhasil ditambahkan');

        // $this->userModel->create($validateData);

        // return redirect()->to('/user');

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
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }
    //1.show pertama
    // public function show($id){
    //     $user = $this->userModel->getUser($id);

    //     $data = [
    //         'title' => 'Profile',
    //         'user' => $user
    //     ];

    //     return view('profile', $data);
    // }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id){
        $user = UserModel::findOrFail($id);

        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = time() . '_' . $foto->getClientOriginalName();
             $foto->move(public_path('storage/upload/img'), $fotoPath);
            $user->foto = $fotoPath;
        }
        
        $user->save();

        return redirect()->route('list.user')->with('success', 'User Berhasil di Update');
    }

    public function destroy($id){
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->to('/user')->with('success', 'User has been deleted successfully');
    }

    public function show($id){
    $user = UserModel::findOrFail($id);
    $kelas = Kelas::find($user->kelas_id);
    $user->nama_kelas = $kelas ? $kelas->nama_kelas : null;

    $title = 'Detail '.$user->nama;

    return view('profile', compact('user', 'kelas', 'title'));
    }

}