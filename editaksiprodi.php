<?php 
require 'koneksi.php';

$id = $_POST['ID_Prodi'];

$prodi = $_POST['namaprodi'];

$query = "UPDATE prodi SET nama_prodi='$prodi' WHERE ID_Prodi='$id'";

//echo $query;
//die;

mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo " 
            <script>
                alert('Data berhasil diubah');
                document.location.href='prodi.php';
            </script>
        ";
}else {
    echo " 
        <script>
        alert ('Data gagal diubah'); 
        </script>
    ";
    echo mysqli_error($conn);
};
?>