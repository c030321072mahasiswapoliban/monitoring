<?php
$konek = mysqli_connect('localhost','root','','m');
if(mysqli_connect_errno()){
    echo "koneksi gagal" . mysqli_connect_errno();
}

$sql = mysqli_query($konek, "SELECT * FROM tb_sensor");
$data = mysqli_fetch_array($sql);
// fething data yang ada pada tabel tb_sensor
$ph = $data['ph'];
$kekeruhan = $data['kekeruhan'];

// validasi ph air
if($ph == 0) $ph = "data kosong";
if($ph >= 1 && $ph <= 5){
    $ket = "ph air telalu rendah";
}else if($ph >= 6.5 && $ph <= 8){
    $ket = "ph air ideal";
}else if($ph >= 8 && $ph <= 10){
    $ket = "ph air basa";
}else if($ph >= 10 && $ph == 14){
    $ket = "ph air sangat basa";
}

echo $ket

// validadi kekeruhan air
?>