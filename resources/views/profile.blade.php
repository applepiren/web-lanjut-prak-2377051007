<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Profile</title>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-200 to-blue-400">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-96 text-center">

        <div class="flex justify-center mb-5">
                <img src="{{ asset('upload/img/' . $user->foto) }}" alt="Foto {{ $user->nama }}" 
                     class="w-60 h-60 rounded-full border-4 border-blue-300 object-cover shadow-md">
        </div>

        <div class="space-y-5 text-left px-6 py-4">
            <div class="bg-blue-100 py-3 px-4 rounded-lg font-semibold text-gray-700 shadow">Nama: {{$user->nama}}</div>
            <div class="bg-blue-100 py-3 px-4 rounded-lg font-semibold text-gray-700 shadow">NPM: {{$user->npm}}</div>
            <div class="bg-blue-100 py-3 px-4 rounded-lg font-semibold text-gray-700 shadow">Kelas: {{$user->nama_kelas ?? 'Kelas tidak ditemukan' }}</div>
        </div>
    </div>
</body>
</html>