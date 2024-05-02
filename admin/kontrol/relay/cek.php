<?php
include "../../koneksi/koneksi.php";

$stat = $_GET['stat'];
if($stat == "ON"){
    mysqli_query($konek, "UPDATE tb_kontrol set relay = 1");
  echo  "ON";
}else  {
    mysqli_query($konek, "UPDATE tb_kontrol set relay = 0");
    echo  "OFF";
}


?>