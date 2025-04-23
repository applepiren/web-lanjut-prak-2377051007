@extends('layouts.app')

@section('content')

<script src="https://cdn.tailwindcss.com"></script>

<div class="bg-gradient-to-r from-red-200 to-blue-300 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-md">
        <h2 class="text-3xl font-extrabold text-center text-gray-700 mb-6">Update User</h2>

        <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="nama" class="block text-lg font-medium text-gray-700">Nama :</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}" class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none shadow-sm">
                @foreach($errors->get('nama') as $msg)
                    <p class="text-red-500 text-sm mt-1">{{ $msg }}</p>
                @endforeach
            </div>

            <div>
                <label for="npm" class="block text-lg font-medium text-gray-700">NPM :</label>
                <input type="text" id="npm" name="npm" value="{{ old('npm', $user->npm) }}" class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none shadow-sm">
                @foreach($errors->get('npm') as $msg)
                    <p class="text-red-500 text-sm mt-1">{{ $msg }}</p>
                @endforeach
            </div>

            <div>
                <label for="kelas_id" class="block text-lg font-medium text-gray-700">Kelas :</label>
                <select name="kelas_id" id="kelas_id" required class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none shadow-sm">
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}" {{ $kelasItem->id == $user->kelas_id ? 'selected' : '' }}>
                            {{ $kelasItem->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="foto" class="block text-lg font-medium text-gray-700">Foto :</label>
                <input type="file" id="foto" name="foto" class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none shadow-sm">
                @if($user->foto && file_exists(public_path('upload/img/' . $user->foto)))
                    <img src="{{ asset('upload/img/' . $user->foto) }}" class="mt-2 w-24 h-24 object-cover rounded-full">
                @endif
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition duration-300 shadow-md">
                Submit
            </button>
        </form>
    </div>

</div>

@endsection