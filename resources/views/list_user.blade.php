@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<body class="bg-gradient-to-r from-red-200 to-blue-300 flex items-center justify-center min-h-screen">
<div class="container mx-auto p-4">
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 shadow-md rounded-lg">
            <thead class="bg-blue-700 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Nama</th>
                    <th class="py-3 px-6 text-left">NPM</th>
                    <th class="py-3 px-6 text-left">Kelas</th>
                    <!-- <th class="py-3 px-6 text-center">Aksi</th> -->
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($users as $user) { ?>
                    <tr class="hover:bg-gray-100">
                        <td class="py-3 px-6 border"> <?= $user['id'] ?> </td>
                        <td class="py-3 px-6 border"> <?= $user['nama'] ?> </td>
                        <td class="py-3 px-6 border"> <?= $user['npm'] ?> </td>
                        <td class="py-3 px-6 border"> <?= $user['nama_kelas'] ?> </td>
                        <!-- <td class="py-3 px-6 border text-center">
                            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                        </td> -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
@endsection