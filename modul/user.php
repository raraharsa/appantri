<?php
include '../lib/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    // Masukkan data ke tabel user tanpa menentukan `id`
    $stmt = $conn->prepare("INSERT INTO rumahsakit.user (nama, email) VALUES (?, ?)");
    $stmt->execute([$nama, $email]);

    // Arahkan ke halaman login setelah berhasil
    header("Location: ../login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #C1D0B5;
        }
        .create-container {
            width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="create-container">
    <h2 class="text-center">Buat Akun</h2>
    <form method="POST">
        <div class="form-outline mb-4">
            <label class="form-label">Username:</label>
            <input type="text" class="form-control" name="nama" id="nama" required />
        </div>

        <div class="form-outline mb-4">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="email" required />
        </div>
        
        <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>

        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        
    </form>
</div>
</body>

</html>