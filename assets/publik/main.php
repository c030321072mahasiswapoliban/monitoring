<?php
$sql = mysqli_query($konek, "SELECT * FROM tb_kontrol");
$data = mysqli_fetch_array($sql);
$relay = $data['relay'];
?>

<main>



  <article class="container article">

    <section class="home">

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


      </div>

      <div class="card-wrapper">


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



      </div>

      <div class="card-wrapper">

        <!-- result sensor -->
        <div class="card task-card">
          <div id="logorest">

          </div>

          <div id="rest">

          </div>

        </div>
        <!-- end result sensor -->
      </div>



    </section>



  </article>
</main>