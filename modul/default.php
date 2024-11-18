<?php
session_start(); // Mulai sesi

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['nama'])) {
    header("Location: login.php"); // Arahkan ke halaman login jika belum login
    exit();
}

// Ambil username dari sesi
$username = $_SESSION['nama'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Antrian Rumah Sakit</title>
    <style>
        /* CSS Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #C1D0B5;
        }
        .dashboard-container {
            text-align: center;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            position: relative;
        }
        h1 {
            color: black;
            margin-bottom: 15px;
            font-size: 24px;
        }
        p {
            color: #333;
            font-size: 16px;
            margin-bottom: 25px;
        }
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .button {
            padding: 14px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            color: white;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s, transform 0.2s;
        }
        .button-tambah {
            background-color: #ff7043;
        }
        .button-tambah:hover {
            background-color: #e64a19;
            transform: scale(1.05);
        }
        .button-daftar {
            background-color: #42a5f5;
        }
        .button-daftar:hover {
            background-color: #1e88e5;
            transform: scale(1.05);
        }
        .dashboard-container::before {
            
            font-size: 50px;
            position: absolute;
            top: -25px;
            left: calc(50% - 25px);
        }
        /* Small decorative elements */
        
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-8px);
            }
        }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <h1>Selamat Datang,<?=$username?>! 😊</h1>
        <p>Silakan pilih tindakan untuk mengelola antrian rumah sakit</p>
        <div class="button-container">
            <!-- Tombol untuk halaman Tambah Antrian -->
            <a href="modul/tambah_antrian.php" class="button button-tambah">Tambah Antrian</a>
            <!-- Tombol untuk halaman Daftar Antrian -->
            <a href="daftar_antrian.php" class="button button-daftar">Daftar Antrian</a>
            <!-- Tombol untuk halaman logout -->
            <a href="?page=keluar" class="button button-tambah">logout</a>
        </div>
    </div>

</body>
</html>
