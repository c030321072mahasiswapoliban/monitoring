<?php
include '../../koneksi/koneksi.php';

if ($rest == "Semua Normal") { ?>
    <data class="card-badge green" ><?php echo $rest;  ?></data>
  <?php } else { ?>
    <data class="card-badge red"><?php echo $rest;  ?></data>
  <?php } ?>
