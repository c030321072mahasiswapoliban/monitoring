<?php

include '../../koneksi/koneksi.php';
$tgl = mysqli_query($konek, "SELECT MAX(tanggal) FROM tb_sensor ORDER BY tanggal");
$datatgl = mysqli_fetch_array($tgl);
$maxtgl = $datatgl['MAX(tanggal)'];
echo $maxtgl;