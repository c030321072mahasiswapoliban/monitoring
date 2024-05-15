<?php
//include koneksi
include "../../koneksi/koneksi.php";

//tangkap variabel dari ajax
$pos = $_GET['pos'];
//update nilai fild servo
mysqli_query($konek, "UPDATE tb_kontrol SET servo='$pos'");
//berikan respon
echo $pos;
?>