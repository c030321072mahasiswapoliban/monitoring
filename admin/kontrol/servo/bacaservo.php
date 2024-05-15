<?php
include "../../koneksi/koneksi.php";

$sql = mysqli_query($konek, "SELECT * FROM tb_kontrol");
$data = mysqli_fetch_array($sql);
$servo = $data['servo'];
//respon balik ke nodemcu
echo $servo;
?>