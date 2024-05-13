<?php
include '../../koneksi/koneksi.php';


if ($kekeruhan >= 40 && $kekeruhan <= 50) { ?>
    <span class="card-badge green" ><?php echo $ketk; ?></span>
  <?php } else { ?>
    <span class="card-badge red"><?php echo $ketk; ?></span>
  <?php } ?>

  
