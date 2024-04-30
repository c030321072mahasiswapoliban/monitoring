<?php 
include '../../koneksi/koneksi.php';

if ($lv_air >= 1 && $lv_air <= 2) { ?>
    <span class="card-badge green"><?php echo $ketair; ?></span>
     <?php } else { ?>
       <span class="card-badge red"><?php echo $ketair; ?></span>
     <?php } 

// <div class="card-badge red" id="statlv"></div>