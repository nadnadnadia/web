<?php
session_start();
require "koneksi.php";

$NIM = $_POST['NIM'];
$Password = $_POST["Password"];

//query to db
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$NIM' ");

$row = mysqli_fetch_assoc($result);

if (password_verify ($Password, $row['Password'])) {
    $_SESSION['login'] = true;
    $_SESSION['Nama'] = $row['Nama'];
    $_SESSION['Photo'] = $row['Photo'];
    header("Location: index.php");
}else {
    echo "
    <script> 
    alert('Username atau Password salah');
    document.location.href='login.php';
    </script>
    ";
}

