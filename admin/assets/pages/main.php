<?php
$sql = mysqli_query($konek, "SELECT * FROM tb_kontrol");
$data = mysqli_fetch_array($sql);
$relay = $data['relay'];
$relaysecond = $data['relaysecond'];

?>

<main>
  <article class="container article">

    <section class="home">

      <div class="card profile-card">

        <div class="profile-card-wrapper">

          <figure class="card-avatar">
            <img src="./assets/images/avatar-1.jpg" alt="Elizabeth Foster" width="48" height="48">
          </figure>

          <div>
            <p class="card-title">Elizabeth Foster</p>

            <p class="card-subtitle">Web & Graphic Designer</p>
          </div>

        </div>

        <ul class="contact-list">

          <li>
            <a href="mailto:xyz@mail.com" class="contact-link icon-box">
              <span class="material-symbols-rounded  icon">mail</span>

              <p class="text"><?php echo $email ?></p>
            </a>
          </li>

          <li>
            <a href="tel:00123456789" class="contact-link icon-box">
              <span class="material-symbols-rounded  icon">call</span>

              <p class="text"><?php echo $phone ?></p>
            </a>
          </li>

        </ul>

        <div class="divider card-divider"></div>

        <li class="progress-item">

      </div>

      <div class="card-wrapper">
        <!-- suhu -->
        <div class="card task-card">
          <div id="logosuhu">

          </div>


          <div>
            <data class="card-data" id="ceksuhu">0</data>

            <div id="statsuhu">

            </div>

          </div>
        </div>
        <!-- end suhu -->

        <!-- ph -->
        <div class="card task-card">
          <div id="logoph">

          </div>

          <div>
            <data class="card-data" id="cekph">0</data>
            <div id="statph">

            </div>

          </div>

        </div>
        <!-- end ph -->

        <!-- kekeruhan -->
        <div class="card task-card">
          <div id="logokeruh">

          </div>



          <div>
            <data class="card-data" id="cekkeruh">0</data>
            <div id="statkeruh">

            </div>

          </div>

        </div>
        <!-- end kekeruhan -->



        <!-- level air -->
        <div class="card task-card">
          <div id="logovol">

          </div>



          <div>
            <data class="card-data" id="cekvol">0</data>
            <div id="statvol">

            </div>

          </div>

        </div>
        <!-- end level air -->

        <!-- result sensor -->
        <div class="card task-card">
          <div id="logorest">

          </div>

          <div id="rest">

          </div>

        </div>
        <!-- end result -->

      </div>

      <div class="card revenue-card">

        <p class="card-text"><?php include "tanggal.php" ?></p>
        <data class="card-title" id="tanggalsensor">

        </data>

        <p class="card-text">Hitung Cepat Rata" Kondisi Lingkungan Budidaya</p>
        <hr>

        <data class="card-title" id="tablesensor">

        </data>


      </div>





    </section>

    <?php
    include 'assets/pages/pemeliharaan.php';
    ?>

  </article>
</main>