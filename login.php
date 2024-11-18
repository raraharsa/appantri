<?php
session_start();
include 'lib/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // cari pengguna dari email
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Jika pengguna ditemukan, simpan ke session dan arahkan ke halaman utama
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama'] = $user['nama']; // Tambahkan session username
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Wah, kamu belum daftar akun nih!";
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #C1D0B5;
        }
        .login-container {
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

<div class="login-container">
    <h2 class="text-center">Login</h2>
    <form method="POST">
        <div class="form-outline mb-4">
            <label class="form-label">Masukkan Email:</label>
            <input type="email" class="form-control" name="email" required />
        </div>
        
        <button type="submit" class="btn btn-primary btn-block mb-4" name="btn">Login</button>
        
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <div class="text-center">
            <p>Belum punya akun? <a href="modul/user.php" class="btn btn-link">Daftar Akun</a></p>
        </div>
    </form>
</div>

</body>
</html>

</body>
</html>