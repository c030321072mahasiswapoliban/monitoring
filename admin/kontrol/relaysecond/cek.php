<?php
include "../../koneksi/koneksi.php";

$statrelay = $_GET['statrelay'];
if($statrelay == "ON"){
    mysqli_query($konek, "UPDATE tb_kontrol set relaysecond = 1");
  echo  "ON";
}else  {
    mysqli_query($konek, "UPDATE tb_kontrol set relaysecond = 0");
    echo  "OFF";
}


?>