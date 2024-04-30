<?php
include '../../koneksi/koneksi.php';




 if ($suhu >= 30 && $suhu <= 35) { ?>
    <p class="card-badge green" ><?php  echo $ketsuhu; ?> </p>
  <?php } else { ?>
    <p class="card-badge red"> <?php  echo $ketsuhu; ?></p>
  <?php } ?>


