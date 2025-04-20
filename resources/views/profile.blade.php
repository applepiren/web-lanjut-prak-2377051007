<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi gulir popup */
        .popup {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .popup.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-[#f5f0e6] flex items-center justify-center min-h-screen">

    <?php
        $nama = "Fiorentina Amara Putri";
        $kelas = "D3MI";
        $npm = "2377051007";
        $foto = "Foto.jpeg";
    ?>

    <div id="popupCard" class="popup bg-[#e4d5c7] shadow-2xl rounded-2xl p-8 w-80 text-center">
        <img class="w-28 h-28 mx-auto rounded-full border-4 border-[#c2b8a3] shadow-md" 
             src="{{ asset('asset/Foto.jpeg')}}" 
             alt="Foto Profil">
        <div class="mt-6 space-y-3">
            <div class="bg-[#d2c3b3] text-[#4b3e2e] font-semibold py-2 px-4 rounded-full shadow-sm">
                <?= $nama ?>
            </div>
            <div class="bg-[#d2c3b3] text-[#4b3e2e] font-semibold py-2 px-4 rounded-full shadow-sm">
                <?= $kelas ?>
            </div>
            <div class="bg-[#d2c3b3] text-[#4b3e2e] font-semibold py-2 px-4 rounded-full shadow-sm">
                <?= $npm ?>
            </div>
        </div>
    </div>

    <script>
        // Tambahkan class "show" setelah halaman dimuat
        window.onload = () => {
            document.getElementById('popupCard').classList.add('show');
        };
    </script>
    
</body>
</html>
