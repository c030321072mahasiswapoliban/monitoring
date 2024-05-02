<?php
$konek = mysqli_connect('localhost', 'root', '', 'm');

if (mysqli_connect_errno()) {
    echo "koneksi gagal" . mysqli_connect_errno();
}

$sql = mysqli_query($konek, 'SELECT * FROM tb_sensor ORDER BY id DESC');
$data = mysqli_fetch_array($sql);

$suhu = isset($data['suhu']) ? $data['suhu'] : '';
$kekeruhan = isset($data['kekeruhan']) ? $data['kekeruhan'] : '';
$ph = isset($data['ph']) ? $data['ph'] : '';
$lv_air = isset($data['lv_air']) ? $data['lv_air'] : '';

// cek data suhu
if ($suhu == 0) $suhu = "Tidak Ada Data";
// validasi keterangan data suhu
if ($suhu >= 10 && $suhu <= 20) {
    $ketsuhu = "Suhu ºC Air Terlalu dingin";
} else if ($suhu >= 20 && $suhu <= 30) {
    $ketsuhu = "Suhu ºC Air Cukup Bagus";
} else if ($suhu >= 30 && $suhu <= 35) {
    $ketsuhu = "Suhu ºC Air Ideal";
} else if ($suhu >= 35 && $suhu <= 40) {
    $ketsuhu = "Suhu ºC Air Terlalu Panas";
} else {
    $ketsuhu = "Segera ºC Ambil Tindakan";
}

// cek data kekeruhan air
if ($kekeruhan == 0) $kekeruhan = "Tidak Ada Data";
//  validasi keterangan kekeruahn
if ($kekeruhan >= 1 && $kekeruhan <= 5) {
    $ketk = "Kualitas Kekeruhan Air Sangat Bagus";
} else if ($kekeruhan >= 5 && $kekeruhan <= 25) {
    $ketk = "Kualitas Kekeruhan Air Sangat Bagus";
} else if ($kekeruhan >= 25 && $kekeruhan <= 30) {
    $ketk = "Kualitas Kekeruhan Air Bagus";
} else if ($kekeruhan >= 30 && $kekeruhan <= 35) {
    $ketk = "Kualitas Kekeruhan Air Cukup Bagus";
} else if ($kekeruhan >= 30 && $kekeruhan <= 40) {
    $ketk = "Kualitas Kekeruhan Air Kurang Bagus";
} else {
    $ketk = "Segera Ambil Tindakan";
}

// cek data ph air
if ($ph == 0) $ph = "Tidak Ada Data";
// validasi keterangan ph
if ($ph >= 4.5 && $ph <= 5.5) {
    $ketph = "Ph Air Sangat Asam";
} else if ($ph >= 5 && $ph <= 6.5) {
    $ketph = "Ph Air Cukup Asam";
} else if ($ph >= 6.5 && $ph <= 7.5) {
    $ketph = "Ph Air Ideal";
} else if ($ph >= 7.5 && $ph <= 8) {
    $ketph = "Ph Air Cukup Ideal";
} else if ($ph >= 8 && $ph <= 9) {
    $ketph = "Ph Air Sangat Basa";
} else {
    $ketph = "Segera Ambil Tindakan";
}

// validasi data level air
if ($lv_air == 0) $lv_air = "Tidak Ada Data";
// vadidasi keterangan lv_air
if ($lv_air >= 0 && $lv_air <= 1) {
    $ketair = "Level Air Kurang";
} else if ($lv_air >= 1 && $lv_air <= 2) {
    $ketair = "Level Air Ideal";
} else if ($lv_air >= 2 && $lv_air <= 3) {
    $ketair = "Kapasitas Air Perlu Dikurangi";
} else if ($lv_air >= 4 && $lv_air <= 3) {
    $ketair = "Level Air Over";
} else {
    $ketair = "Segera Ambil Tindakan";
}

// nilai result baca sensor
if (($suhu >= 30 && $suhu <= 35) && ($kekeruhan >= 1 && $kekeruhan <= 25) && ($ph >= 6.5 && $ph <= 8.0)) {
    $rest = "Semua Normal";
} else {
    $rest = "Terdeteksi Masalah";
}

// setingan tampilan website
$sql = mysqli_query($konek, "SELECT * FROM tb_web");
$data = mysqli_fetch_array($sql);
$title = $data['title'];
$header = $data['header'];
$email = $data['email'];
$phone =  $data['phone'];

// setingan untuk grafiksensor
