<?php
include '../../koneksi/koneksi.php';

if ($suhu >= 30 && $suhu <= 35) { ?>
  <div class="card-icon icon-box green">
    <span class="material-symbols-rounded  icon">task_alt</span>
  </div>
    <?php } else { ?>
      <div class="card-icon icon-box blue">
    <span class="material-symbols-rounded  icon">drive_file_rename_outline</span>
  </div>
    <?php } ?>