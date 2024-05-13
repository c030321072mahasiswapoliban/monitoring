<?php
include 'koneksi/koneksi.php';

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

<canvas id="myChart" style="width: 100%; max-width: 400px; height: 250px;"></canvas>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
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
    datasets: [
      {
        label: "Suhu (°C)",
        fill: false,
        backgroundColor: "rgba(255, 99, 132, 0.5)",
        borderColor: "rgba(255, 99, 132, 1)",
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
        label: "pH",
        fill: false,
        backgroundColor: "rgba(54, 162, 235, 0.5)",
        borderColor: "rgba(54, 162, 235, 1)",
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
        label: "Kekeruhan",
        fill: false,
        backgroundColor: "rgba(255, 206, 86, 0.5)",
        borderColor: "rgba(255, 206, 86, 1)",
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
        label: "Level Air",
        fill: false,
        backgroundColor: "rgba(75, 192, 192, 0.5)",
        borderColor: "rgba(75, 192, 192, 1)",
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

  var option = {
    showLines: true,
    animation: {
      duration: 5
    },
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero:true
        }
      }],
      xAxes: [{
        ticks: {
          fontSize: 10
        }
      }]
    }
  };

  var myLineChart = new Chart(canvas, {
    type: 'line',
    data: data,
    options: option
  });

  canvas.onclick = function(evt){
    var activePoints = myLineChart.getElementsAtEvent(evt);
    var firstPoint = activePoints[0];
    var label = myLineChart.data.labels[firstPoint._index];
    var value1 = myLineChart.data.datasets[firstPoint._datasetIndex].data[firstPoint._index];
    var datasetLabel = myLineChart.data.datasets[firstPoint._datasetIndex].label;
    if (firstPoint !== undefined) {
      alert(label + ": " + datasetLabel + " = " + value1);
    }
  };
</script>
