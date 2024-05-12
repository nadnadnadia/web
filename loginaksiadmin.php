<?php
session_start();
require "koneksi.php";

$User = $_POST['User'];
$Password = $_POST["Password"];

//query to db
$result = mysqli_query($conn, "SELECT * FROM admin WHERE User='$User' ");

$row = mysqli_fetch_assoc($result);

if (password_verify ($Password, $row['Password'])) {
    $_SESSION['login'] = true;
    $_SESSION['Nama'] = $row['User'];
    $_SESSION['Photo'] = 'admin.jpg';
    $_SESSION['hakakses'] = 'admin';
    header("Location: index.php");
}else {
    echo "
    <script> 
    alert('Username atau Password salah');
    document.location.href='login.php';
    </script>
    ";
}

