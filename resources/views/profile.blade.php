<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <?php
        // Variabel data mahasiswa
        $nama = "Fiorentina Amara Putri";
        $kelas = "D3MI";
        $npm = "2377051007";
        $foto = "Foto.jpeg"; // Nama file gambar
    ?>

    <div class="bg-white shadow-lg rounded-lg p-6 w-80 text-center">
        <img class="w-24 h-24 mx-auto rounded-full border-4 border-gray-300" 
             src="{{ asset('assets/Foto.jpeg')}}" 
             alt="Foto Profil">
        <div class="mt-4">
            <div class="bg-gray-300 text-gray-700 font-semibold py-2 rounded-md mb-2"> <?= $nama ?> </div>
            <div class="bg-gray-300 text-gray-700 font-semibold py-2 rounded-md mb-2"> <?= $kelas ?> </div>
            <div class="bg-gray-300 text-gray-700 font-semibold py-2 rounded-md"> <?= $npm ?> </div>
        </div>
    </div>
    
</body>
</html>
