<?php

include '../../koneksi/koneksi.php';

$suhu =  mysqli_query($konek, "SELECT MAX(suhu) FROM tb_sensor ORDER BY suhu");
$datasuhu = mysqli_fetch_array($suhu);
$suhu = $datasuhu['MAX(suhu)'];
$ratasuhu = $suhu + $suhu / $suhu;

$ph = mysqli_query($konek, "SELECT MAX(ph) FROM tb_sensor ORDER BY ph");
$dataph = mysqli_fetch_array($ph);
$ph = $dataph['MAX(ph)'];
$rataph = $ph + $ph / $ph;

$kek = mysqli_query($konek, "SELECT MAX(kekeruhan) FROM tb_sensor ORDER BY kekeruhan");
$datakek = mysqli_fetch_array($kek);
$kek = $datakek['MAX(kekeruhan)'];
$ratakek = $kek + $kek / $kek;

$lv = mysqli_query($konek, "SELECT MAX(lv_air) FROM tb_sensor ORDER BY lv_air");
$datalv = mysqli_fetch_array($lv);
$lv = $datalv['MAX(lv_air)'];
$ratalv = $lv + $lv / $lv;




?>

<table class="table1">
  <tr>
   
    <!-- <td>tanggal</td> -->
    <td>Rata" pH</td>
    <td>Rata" suhu</td>
    <td>Rata" kekeruhan</td>
    <td>Rata" lv air</td>
  
  </tr>
      
        <tr>
           
            <td><?php echo $rataph;?></td>
            <td><?php echo $ratasuhu;?></td>
            <td><?php echo $ratakek;?></td>
            <td><?php echo $ratalv;?></td>
           
        </tr>
</table>
