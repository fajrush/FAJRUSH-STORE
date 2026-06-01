<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

// 1. Tangkap Data Input Pembeli
$produk    = $_POST['produk'];
$whatsapp  = $_POST['whatsapp'];
$email     = $_POST['email'];
$metode    = $_POST['metode'];

// 2. Tentukan Harga Valid di Server (Mencegah Manipulasi Harga dari Inspect Element)
$daftar_harga = [
    'pterodactyl_2gb' => 10000,
    'pterodactyl_4gb' => 20000,
    'pterodactyl_8gb' => 40000,
    'otp_whatsapp'    => 7000,
    'otp_telegram'    => 5000
];

if (!array_key_exists($produk, $daftar_harga)) {
    die("Produk tidak valid!");
}

$harga_asli = $daftar_harga[$produk];
$nomor_invoice = "INV-" . time();

// 3. KONFIGURASI API GATEWAY (Isi sesuai data dari fr3newera.com Anda)
$api_key = "FR3_ziyqk6312052026pmccfzpuhbdnyw";

// Data yang diminta oleh dokumentasi API FR3NEWERA
$payload = [
    'api_key'      => $api_key,
    'amount'       => $harga_asli,
    'method'       => $metode,
    'merchant_ref' => $nomor_invoice,
    'customer_phone'=> $whatsapp,
    'customer_email'=> $email,
    // URL yang akan dipanggil FR3NEWERA jika pembeli sudah sukses bayar
    'callback_url' => "https://" . $_SERVER['HTTP_HOST'] . "/callback.php" 
];

// 4. Tembak API FR3NEWERA menggunakan cURL PHP
$ch = curl_init("https://www.rumahotp.io/api/v1/deposit/create?amount=NOMINAL&payment_id=qris"); // Sesuaikan endpoint resmi mereka
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch);

$json = json_decode($response, true);

// 5. Lempar Pembeli ke Halaman Bayar FR3NEWERA jika sukses
if (isset($json['status']) && $json['status'] == 'success') {
    header("Location: " . $json['payment_url']); // Alihkan langsung ke invoice QRIS/Bayar
    exit;
} else {
    // Jika gagal, tampilkan errornya
    echo "<h3>Gagal membuat pembayaran!</h3>";
    echo "Pesan Error: " . ($json['message'] ?? 'Koneksi API Gagal.');
}
?>
