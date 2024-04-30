<?php
include '../../koneksi/koneksi.php';

$sql_id = mysqli_query($konek, "SELECT MAX(ID) FROM tb_sensor");
$data_id = mysqli_fetch_array($sql_id);
$id_akhir = $data_id['MAX(ID)'];
$id_awal = $id_akhir - 2;

$tanggal = mysqli_query($konek, "SELECT tanggal FROM tb_sensor 
WHERE ID>='$id_awal' and ID<='$id_akhir' ORDER BY ID ASC");

$suhu = mysqli_query($konek, "SELECT suhu FROM tb_sensor 
WHERE ID>='$id_awal' and ID<='$id_akhir' ORDER BY ID ASC");

$ph = mysqli_query($konek, "SELECT ph FROM tb_sensor 
WHERE ID>='$id_awal' and ID<='$id_akhir' ORDER BY ID ASC");

$kekeruhan = mysqli_query($konek, "SELECT kekeruhan FROM tb_sensor 
WHERE ID>='$id_awal' and ID<='$id_akhir' ORDER BY ID ASC");

$lv_air = mysqli_query($konek, "SELECT lv_air FROM tb_sensor 
WHERE ID>='$id_awal' and ID<='$id_akhir'  ORDER BY ID ASC");

?>

<div class="card task-card">

  <canvas id="myChart"></canvas>


</div>

<script>
  var canvas = document.getElementById('myChart');
  var data = {
    labels: [
      <?php
      while ($data_tanggal = mysqli_fetch_array($tanggal)) {
        echo '"' . $data_tanggal['tanggal'] . '",';
      }
      ?>
    ],
    datasets: [{
        label: "suhu",
        fill: true,
        backgroundColor: "rgba(52, 231, 43, 0.5)",
        borderColor: "rgba(52, 231, 43, 1)",
        lineTension: 0.5,
        pointRadius: 5,
        data: [
          <?php
          while ($data_suhu = mysqli_fetch_array($suhu)) {
            echo $data_suhu['suhu'] . ',';
          }
          ?>
        ]
      },
      {
        label: "ph",
        fill: true,
        backgroundColor: "rgba(52, 231, 43, 0.5)",
        borderColor: "rgba(52, 231, 43, 1)",
        lineTension: 0.5,
        pointRadius: 5,
        data: [
          <?php
          while ($data_ph = mysqli_fetch_array($ph)) {
            echo $data_ph['ph'] . ',';
          }
          ?>
        ]
      },
      {
        label: "kekeruhan",
        fill: true,
        backgroundColor: "rgba(52, 231, 43, 0.5)",
        borderColor: "rgba(52, 231, 43, 1)",
        lineTension: 0.5,
        pointRadius: 5,
        data: [
          <?php
          while ($data_kekeruhan = mysqli_fetch_array($kekeruhan)) {
            echo $data_kekeruhan['kekeruhan'] . ',';
          }
          ?>
        ]
      },
      {
        label: "lv_air",
        fill: true,
        backgroundColor: "rgba(52, 231, 43, 0.5)",
        borderColor: "rgba(52, 231, 43, 1)",
        lineTension: 0.5,
        pointRadius: 5,
        data: [
          <?php
          while ($data_lv_air = mysqli_fetch_array($lv_air)) {
            echo $data_lv_air['lv_air'] . ',';
          }
          ?>
        ]
      }

    ]
  };

  // option grafik
  var option = {
    showLines: true,
    animation: {
      duration: 5
    }
  };

  // cetak grafik kedalam kanvas
  var myLineChart = Chart.Line(canvas, {
    data: data,
    options: option
  });
</script>