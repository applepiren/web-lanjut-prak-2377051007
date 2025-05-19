
@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-gradient-to-r from-red-200 to-blue-300 min-h-screen py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Daftar Pengguna</h1>
            <a href="{{ route('user_create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
                + Tambah Pengguna
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-800">
                <thead class="bg-blue-700 text-white text-left">
                    <tr>
                        <th class="py-3 px-6 text-center">ID</th>
                        <th class="py-3 px-6">Nama</th>
                        <th class="py-3 px-6">NPM</th>
                        <th class="py-3 px-6">Foto</th>
                        <th class="py-3 px-6">Kelas</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="py-3 px-6">{{ $user->id }}</td>
                            <td class="py-3 px-6">{{ $user->nama }}</td>
                            <td class="py-3 px-6">{{ $user->npm }}</td>
                            <td class="py-3 px-6">
                                 @if($user->foto && file_exists(public_path('storage/upload/img/' . $user->foto)))
                                    <img src="{{ asset('storage/upload/img/' . $user->foto) }}" alt="Foto {{ $user->nama }}" class="w-16 h-16 object-cover rounded-full shadow">
                                @else
                                    <span class="text-gray-500 italic">Tidak ada foto</span>
                                @endif
                            </td>
                            <td class="py-3 px-6">{{ $user->nama_kelas ?? '-' }}</td>
                            <td class="py-3 px-6 text-center space-x-2">
                                <!-- button show 1 -->
                                <!-- <a href="{{ route('users.show', $user->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Detail</a> -->
                                <a href="{{ route('user.show', $user->id) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">View</a>
                                <a href="{{ route('user.edit', $user->id) }}" class="inline-block bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">Edit</a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda Yakin Ingin Hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection
