<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jumlahjiwa = $_POST['jumlahjiwa'];
    $jeniszakat = $_POST['jeniszakat'];
    $metode = $_POST['metode'];
    $totalbayar = $_POST['totalbayar'];
    $dibayar = $_POST['dibayar'];
    $kembalian = $_POST['kembalian'];
    $tanggalbayar = $_POST['tanggalbayar'];

    $query = "INSERT INTO tb_zakat (nama, jumlahjiwa, jeniszakat, metode, totalbayar, dibayar, kembalian, tanggalbayar)
              VALUES ('$nama', '$jumlahjiwa', '$jeniszakat', '$metode', '$totalbayar', '$dibayar', '$kembalian', '$tanggalbayar')";

    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php");
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pembayaran Zakat</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: #f1f5f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #16a34a;
            font-size: 24px;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #374151;
        }
        input, select {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 1rem;
            background-color: #f9fafb;
        }
        button {
            margin-top: 30px;
            padding: 14px;
            background-color: #16a34a;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            border: none;
            border-radius: 12px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        button:hover {
            background-color: #15803d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Melakukan Pembayaran Zakat</h2>
        <form action="" method="POST">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" required>

            <label for="jumlahjiwa">Jumlah Jiwa</label>
            <input type="number" name="jumlahjiwa" id="jumlahjiwa" min="1" required>

            <label for="jeniszakat">Jenis Zakat</label>
            <select name="jeniszakat" id="jeniszakat" required>
                <option value="">Pilih Jenis Zakat</option>
                <option value="Zakat Fitrah">Zakat Fitrah</option>
                <option value="Zakat Maal">Zakat Maal</option>
                <option value="Zakat Profesi">Zakat Profesi</option>
                <option value="Zakat Perdagangan">Zakat Perdagangan</option>
            </select>

            <label for="metode">Metode Pembayaran</label>
            <input type="text" name="metode" id="metode" required>

            <label for="totalbayar">Total Bayar (Rp)</label>
            <input type="number" name="totalbayar" id="totalbayar" step="0.01" readonly value="0.00">

            <label for="dibayar">Nominal Dibayar (Rp)</label>
            <input type="number" name="dibayar" id="dibayar" required>

            <label for="kembalian">Kembalian (Rp)</label>
            <input type="number" name="kembalian" id="kembalian" readonly value="0.00">

            <label for="tanggalbayar">Tanggal Bayar</label>
            <input type="datetime-local" name="tanggalbayar" id="tanggalbayar" required>

            <button type="submit" name="submit">Simpan Pembayaran</button>
        </form>
    </div>

    <script>
        // Hitung total dan kembalian otomatis
        const jiwaInput = document.getElementById('jumlahjiwa');
        const totalInput = document.getElementById('totalbayar');
        const dibayarInput = document.getElementById('dibayar');
        const kembalianInput = document.getElementById('kembalian');

        jiwaInput.addEventListener('input', updateTotal);
        dibayarInput.addEventListener('input', updateKembalian);

        function updateTotal() {
            const hargaPerJiwa = 35000; // Contoh: Rp 35.000/jiwa
            const jumlah = parseInt(jiwaInput.value) || 0;
            const total = jumlah * hargaPerJiwa;
            totalInput.value = total.toFixed(2);
            updateKembalian();
        }

        function updateKembalian() {
            const total = parseFloat(totalInput.value) || 0;
            const bayar = parseFloat(dibayarInput.value) || 0;
            const kembali = bayar - total;
            kembalianInput.value = (kembali >= 0 ? kembali : 0).toFixed(2);
        }
    </script>
</body>
</html>
