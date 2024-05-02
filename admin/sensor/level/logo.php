<?php
include '../../koneksi/koneksi.php';

if ($lv_air >= 2 && $lv_air <= 3) { ?>
  <div class="card-icon icon-box green">
    <span class="material-symbols-rounded  icon">task_alt</span>
  </div>
    <?php } else { ?>
      <div class="card-icon icon-box blue">
    <span class="material-symbols-rounded  icon">drive_file_rename_outline</span>
  </div>
    <?php } ?>
