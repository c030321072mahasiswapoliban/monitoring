<?php
include "../../koneksi/koneksi.php";

$sql = mysqli_query($konek, "SELECT * FROM tb_kontrol");
$data = mysqli_fetch_array($sql);

$servo = isset($data['servo']) ? $data['servo'] : '';

echo $servo; //1/0

?>