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
        <h2>Tambah data beras</h2>
        <form action="" method="POST">
            <label for="nama">Harga</label>
            <input type="text" name="nama" id="nama" required>

            <button type="submit" name="submit">Simpan Pembayaran</button>
        </form>
    </div>

</body>
</html>
