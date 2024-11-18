<?php 
include '../lib/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM antrian WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
       
        echo "
        <div class=\"message-container\">
        
            <h1 style=\"margin-bottom: 10px;\">Data antrian berhasil dihapus!</h1>
            <a href=\"daftar_antrian.php\"><button>Kembali</button></a> 
        </div>
    ";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}

// No need to close the PDO connection manually
?>
<style>
     body {
            font-family: Arial, sans-serif;
            background-color: #C1D0B5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .message-container {
            text-align: center;
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            width: 50%;
        }

        .message-container h1 {
            color: #99A98F;
            font-size: 32px;
            margin: 0;
        }

        .message-container p {
            color: #333;
            font-size: 20px;
            margin-top: 10px;
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
    </style>
</style>