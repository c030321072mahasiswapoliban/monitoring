<?php
include '../../koneksi/koneksi.php';


if ($ph >= 6.5 && $ph <= 7.5) { ?>
    <p class="card-badge green"> <?php echo $ketph; ?></p>
  <?php } else { ?>
    <p class="card-badge red"><?php echo $ketph; ?></p>
  <?php } ?>
