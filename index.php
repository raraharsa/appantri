
<?php
session_start();

include "lib/koneksi.php";
if (!isset($_SESSION['user_id'])) {
    include "login.php";
}else {
    $sqlUser = $conn->prepare("SELECT * FROM user WHERE id = ?");
    $sqlUser ->execute([$_SESSION['user_id']]);
    $resultUser = $sqlUser ->fetch();
   
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Chat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
$page = ($_GET['page'])?$_GET['page']:null;
if (isset($page)){
  if ($page=='keluar') {
    include "modul/logout.php";
  }

  if ($page=='tambah') {
    include "modul/tambah_antrian.php";
  }
  if ($page=='daftar') {
    include "modul/daftar_antrian.php";
  }

  
} else{
    include "modul/default.php";
  }

?>
</body>

</html>
<?php
}
?>
