<?php
include '../lib/koneksi.php';

$sql = "SELECT * FROM antrian ORDER BY nomor_antrian DESC"; // Memastikan data diurutkan dengan benar
$stmt = $conn->prepare($sql);
$stmt->execute();

$antrian = $stmt->fetchAll(PDO::FETCH_ASSOC); // Menyimpan hasil query dalam variabel antrian

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Antrian Pasien</title>
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

       
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            text-align: left;
            border-radius: 8px;
            overflow: hidden;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #99A98F;
            text-align: center;
        }

        table th {
            background-color: #99A98F;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        table tr:hover {
            background-color: #dcdcdc;
        }

        
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        a:hover {
            color: #0056b3;
        }

       
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .button {
            background-color: #99A98F;
            color: white;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            
            font-size: 16px;
            text-align: center;
            
        }

        .button:hover {
            background-color: #7a8e6d;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Daftar Antrian Pasien</h2>

        <?php
        // Periksa jika data ada
        if (count($antrian) > 0) {
            echo "<table>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Nomor Antrian</th>
                    <th>Waktu Kedatangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>";

            $no = 1;
            foreach ($antrian as $row) {
                echo "<tr>
                    <td>".$no."</td>
                    <td>".$row["nama_pasien"]."</td>
                    <td>".$row["nomor_antrian"]."</td>
                    <td>".$row["waktu_kedatangan"]."</td>
                    <td>".$row["status"]."</td>
                    <td><a href='ubah_status.php?id=".$row["id"]."'>Ubah Status</a> | <a href='hapus_antrian.php?id=".$row["id"]."'>Hapus</a></td>
                </tr>";
                $no++;
            }
            echo "</table>";
        } else {
            echo "<p style='text-align: center;'>Tidak ada antrian.</p>";
        }
        ?>

        <div class="button-container">
            <a href="tambah_antrian.php" class="button">Tambah Antrian</a>
            <a href="default.php" class="button">Kembali</a> 
        </div>
    </div>

</body>
</html>

<?php
$conn = null;
?>
