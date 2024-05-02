<?php
include '../../koneksi/koneksi.php';
$suhu = $_GET['suhu'];
$ph = $_GET['ph'];
$kekeruhan = $_GET['kekeruhan'];
$lv_air = $_GET['lv_air'];



mysqli_query($konek, "ALTER TABLE tb_sensor AUTO_INCREMENT=1");
$simpan = mysqli_query($konek, "INSERT INTO tb_sensor(suhu, ph, lv_air, kekeruhan)values('$suhu', '$ph', '$lv_air','$kekeruhan')");

if($simpan)
echo "berhasil";
else
echo "gagal";
?>