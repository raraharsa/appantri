
<?php
include '../lib/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pasien = $_POST['nama_pasien'];
    $nomor_antrian = $_POST['nomor_antrian'];
    $waktu_kedatangan = $_POST['waktu_kedatangan'];
    $sql = "INSERT INTO antrian (nama_pasien, nomor_antrian, waktu_kedatangan) VALUES (:nama_pasien, :nomor_antrian, :waktu_kedatangan)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nama_pasien', $nama_pasien);
    $stmt->bindParam(':nomor_antrian', $nomor_antrian);
    $stmt->bindParam(':waktu_kedatangan', $waktu_kedatangan);

    if ($stmt->execute()) {
        echo "<div class=\"alert alert-success\" role=\"alert\">
  Data Antrian Berhasil Ditambahkan !
</div>";
    } else {
        echo "<p>Error: Gagal menambahkan data.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Antrian Pasien</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* CSS Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Form Container */
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Input Fields */
        input[type="text"], input[type="number"], input[type="datetime-local"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #99A98F;
            border-radius: 5px;
            font-size: 16px;
            background-color: #f4f4f4;
        }

        /* Submit Button */
        input[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: #99A98F;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #7a8e6d;
        }

        /* Success/Error Message */
        p {
            text-align: center;
            font-size: 16px;
            color: #333;
        }
        button {
            width: 100%;
            padding: 15px;
            background-color: #99A98F;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }
        .alert {
            margin-right: 40px;
        }

    </style>
</head>
<body>

    <div class="form-container">
        <h2>Tambah Antrian Pasien</h2>

        <form method="POST" action="tambah_antrian.php">
            <label for="nama_pasien">Nama Lengkap Pasien:</label>
            <input type="text" name="nama_pasien" id="nama_pasien" required><br>

            <label for="nomor_antrian">Nomor Antrian:</label>
            <input type="number" name="nomor_antrian" id="nomor_antrian" required><br>

            <label for="waktu_kedatangan">Waktu Kedatangan:</label>
            <input type="datetime-local" name="waktu_kedatangan" id="waktu_kedatangan" required><br>

            <input type="submit" value="Tambah Antrian">
           
        </form>
        <a href="default.php"><button>Kembali</button></a> 
    </div>

</body>
</html>
