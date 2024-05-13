<?php
include "../../koneksi/koneksi.php";

$sql = mysqli_query($konek, "SELECT * FROM tb_kontrol");
$data = mysqli_fetch_array($sql);

$relay = isset($data['relay']) ? $data['relay'] : '';

echo $relay; //1/0

?>