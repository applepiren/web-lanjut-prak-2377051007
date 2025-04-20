<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f1f8f6] flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
        <h2 class="text-2xl font-semibold text-center mb-6">Tambah User</h2>

        <form action="{{ route('user.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama :</label>
                <input type="text" name="nama" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">NPM :</label>
                <input type="text" name="npm" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kelas :</label>
                <input type="text" name="kelas" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>
            <div>
                <button type="submit" 
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md transition-all duration-200">
                    Submit
                </button>
            </div>
        </form>
    </div>

</body>
</html>
