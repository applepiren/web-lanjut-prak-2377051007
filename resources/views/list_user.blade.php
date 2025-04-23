@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<body class="bg-gradient-to-r from-red-200 to-blue-300 flex items-center justify-center min-h-screen">
<div class="container mx-auto p-4">
    <div class="overflow-x-auto">
        <a href="{{ route('user_create') }}" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>
        <table class="min-w-full border border-gray-300 shadow-md rounded-lg">
            <thead class="bg-blue-700 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Nama</th>
                    <th class="py-3 px-6 text-left">NPM</th>
                    <th class="py-3 px-6 text-left">Foto</th>
                    <th class="py-3 px-6 text-left">Kelas</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-100">
                        <td class="py-3 px-6 border"> {{ $user->id }} </td>
                        <td class="py-3 px-6 border"> {{ $user->nama }} </td>
                        <td class="py-3 px-6 border"> {{ $user->npm }} </td>
                        <td class="py-3 px-6 border">
                            @if($user->foto && file_exists(public_path('upload/img/' . $user->foto)))
                                <img src="{{ asset('upload/img/' . $user->foto) }}" alt="Foto {{ $user->nama }}" class="w-16 h-16 object-cover rounded-lg border">
                            @else
                                <span class="text-gray-500">Tidak ada foto</span>
                            @endif
                        </td>
                        <td class="py-3 px-6 border"> {{ $user->nama_kelas }} </td>
                        <td class="py-3 px-6 border text-center">
                            <a href="{{ route('users.show', $user->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Detail</a>
                            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
@endsection