<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexusStore - Panel Pterodactyl & Rumah OTP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-900 text-gray-100 font-sans">

    <!-- NAVBAR -->
    <nav class="bg-gray-800 border-b border-gray-700 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between">
            <span class="text-xl font-black tracking-wider text-indigo-500"><i class="fa-solid fa-bolt mr-2"></i>NEXUSSTORE</span>
            <span class="bg-green-500/10 text-green-400 text-xs px-3 py-1 rounded-full border border-green-500/20">
                <span class="w-2 h-2 inline-block bg-green-400 rounded-full mr-1 animate-pulse"></span> Sistem Otomatis 24 Jam
            </span>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="max-w-4xl mx-auto px-4 py-10">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-white">Order Instant Panel & Rumah OTP</h1>
            <p class="text-gray-400 mt-2">Pembayaran Otomatis didukung oleh FR3NEWERA Payment Gateway</p>
        </div>

        <!-- FORM ORDER UTAMA -->
        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700 shadow-xl">
            <form action="proses.php" method="POST" class="space-y-6">
                
                <!-- 1. PILIH PRODUK -->
                <div>
                    <label class="block text-sm font-bold text-gray-300 mb-2"><i class="fa-solid fa-box text-indigo-400 mr-2"></i>1. Pilih Paket Produk</label>
                    <select name="produk" required class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500">
                        <option value="">-- Pilih Paket --</option>
                        <optgroup label="⚡ PANEL PTERODACTYL">
                            <option value="pterodactyl_2gb">Panel Pterodactyl 2GB RAM - Rp 10.000</option>
                            <option value="pterodactyl_4gb">Panel Pterodactyl 4GB RAM - Rp 20.000</option>
                            <option value="pterodactyl_8gb">Panel Pterodactyl 8GB RAM - Rp 40.000</option>
                        </optgroup>
                        <optgroup label="📱 RUMAH OTP (NOMOR VIRTUAL)">
                            <option value="otp_whatsapp">Nomor OTP WhatsApp - Rp 7.000</option>
                            <option value="otp_telegram">Nomor OTP Telegram - Rp 5.000</option>
                        </optgroup>
                    </select>
                </div>

                <!-- 2. DATA PEMBELI -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-300 mb-2"><i class="fa-brands fa-whatsapp text-green-400 mr-2"></i>2. No. WhatsApp Anda</label>
                        <input type="number" name="whatsapp" required placeholder="Contoh: 08123456789" class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500">
                        <span class="text-xs text-gray-500 mt-1 block">Detail akun akan dikirim ke nomor ini.</span>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-300 mb-2"><i class="fa-solid fa-envelope text-blue-400 mr-2"></i>3. Email Anda</label>
                        <input type="email" name="email" required placeholder="nama@gmail.com" class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500">
                    </div>
                </div>

                <!-- 3. METODE PEMBAYARAN -->
                <div>
                    <label class="block text-sm font-bold text-gray-300 mb-2"><i class="fa-solid fa-credit-card text-yellow-400 mr-2"></i>4. Metode Pembayaran (FR3NEWERA)</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <label class="bg-gray-900 border border-gray-700 rounded-xl p-4 flex items-center space-x-3 cursor-pointer hover:border-indigo-500">
                            <input type="radio" name="metode" value="QRIS" checked class="text-indigo-600 focus:ring-0">
                            <span class="text-sm font-medium">QRIS (All E-Wallet)</span>
                        </label>
                        <label class="bg-gray-900 border border-gray-700 rounded-xl p-4 flex items-center space-x-3 cursor-pointer hover:border-indigo-500">
                            <input type="radio" name="metode" value="DANA" class="text-indigo-600 focus:ring-0">
                            <span class="text-sm font-medium">DANA</span>
                        </label>
                        <label class="bg-gray-900 border border-gray-700 rounded-xl p-4 flex items-center space-x-3 cursor-pointer hover:border-indigo-500">
                            <input type="radio" name="metode" value="OVO" class="text-indigo-600 focus:ring-0">
                            <span class="text-sm font-medium">OVO</span>
                        </label>
                    </div>
                </div>

                <!-- BUTTON SUBMIT -->
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 px-6 rounded-xl transition shadow-lg shadow-indigo-600/30 text-center block">
                    <i class="fa-solid fa-basket-shopping mr-2"></i> Proses Pembayaran Sekarang
                </button>
            </form>
        </div>
    </main>
</body>
</html>
