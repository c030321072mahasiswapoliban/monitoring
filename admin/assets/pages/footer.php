<footer class="footer">
  <div class="container">
    <ul class="footer-list">
      <li class="footer-item">
        <a href="#" class="footer-link">About</a>
      </li>
      <li class="footer-item">
        <a href="#" class="footer-link">Developers</a>
      </li>
      <li class="footer-item">
        <a href="#" class="footer-link">Support</a>
      </li>
    </ul>
    <p class="copyright">
      &copy; 2024 <a href="#" class="copyright-link">poliBanjarmasin</a>. D3 TEKNIK Infromatika
    </p>

  </div>
</footer>

<!-- start script -->

<script src="./assets/js/script.js"></script>
<script type="text/javascript" src="./assets/jquery/jquery.min.js"></script>
<script type="text/javascript">
  // start sensor
  $(document).ready(function() {
    setInterval(function() {
      $("#ceksuhu").load("./sensor/suhu/cek.php");
      $("#statsuhu").load("./sensor/suhu/status.php");
      $("#logosuhu").load("./sensor/suhu/logo.php");

    }, 500);
  });

  $(document).ready(function() {
    setInterval(function() {
      $("#cekph").load("./sensor/ph/cek.php");
      $("#statph").load("./sensor/ph/status.php");
      $("#logoph").load("./sensor/ph/logo.php");
    }, 500);
  });

  $(document).ready(function() {
    setInterval(function() {
      $("#cekkeruh").load("./sensor/kekeruhan/cek.php");
      $("#statkeruh").load("./sensor/kekeruhan/status.php");
      $("#logokeruh").load("./sensor/kekeruhan/logo.php");
    }, 500);
  });

  $(document).ready(function() {
    setInterval(function() {
      $("#rest").load("./sensor/result/result.php");
      $("#logorest").load("./sensor/result/logo.php");
    }, 500);
  });
// relay1
  $(document).ready(function() {
    setInterval(function() {
      $("#ceklv").load("./sensor/kekeruhan/cek.php");
      $("#statlv").load("./sensor/kekeruhan/status.php");
    }, 500);
  });
// relay 2
  $(document).ready(function() {
    setInterval(function() {
      $("#cekvol").load("./sensor/level/cek.php");
      $("#statvol").load("./sensor/level/status.php");
      $("#logovol").load("./sensor/level/logo.php");
    }, 500);
  });
  // end sensor

  /**=====================================================================**/
  // start kontroll relay 
  function ubahstatus(value) {
    if (value == true) value = "ON";
    else value = "OFF";
    document.getElementById('status').innerHTML = value;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById('status').innerHTML = xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET", "./kontrol/relay/cek.php?stat=" + value, true);
    xmlhttp.send();
  }

  $(document).ready(function() {
    setInterval(function() {
      //khusus untuk load status relay pmpa air
      $("#status").load("./kontrol/relay/logo.php");
    }, 100);
  });

  // end relay

  // ==================================================//

  // start relay 2

  function ubahstatusrelay(value) {
    if (value == true) value = "ON";
    else value = "OFF";
    document.getElementById('statusrelay').innerHTML = value;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById('statusrelay').innerHTML = xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET", "./kontrol/relaysecond/cek.php?statrelay=" + value, true);
    xmlhttp.send();
  }

  $(document).ready(function() {
    setInterval(function() {
      //khusus untuk load status relay pmpa air
      $("#statusrelay").load("./kontrol/relaysecond/logo.php");
    }, 100);
  });

  // end relay 2

  /**=====================================================================**/

  // start servo
  function ubahposisi(value) {
      document.getElementById('posisi').innerHTML = value;

      //ajax untuk membuat nilai status relay
      var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          //ambil respon dari web setelah merubah nilai
          document.getElementById('posisi').innerHTML = xmlhttp.responseText;

        }
      }
      //eksekusi file php untuk merubah nilai databs
      xmlhttp.open("GET", "./kontrol/servo/cek.php?pos=" + value, true);
      //kirim data
      xmlhttp.send();
    }
  // end servo
  // refreshid
  var refreshid = setInterval(function() {
    $('#grafiksensor').load("./sensor/grafik/grafik.php");
  }, 1000);

// $(document).ready(function() {
//   setInterval(function() {
//     $('#grafiksensor').load("./sensor/grafik/grafik.php");
//   }, 1000);
// });

// tablewjnl


//   function table(){
//     const xhttp = new XMLHttpRequest();
//     xhttp.onload = function(){
//       document.getElementById("table").innerHTML = this.responseText;
//     }
//     xhttp.open("GET", "./sensor/table_sensor/table.php" );
// xhttp.send();

//   }

//     var tableid = setInterval(function() {
//     $('#tablesensor').load("./sensor/table_sensor/table.php");
//   }, 1000);

//   var tanggaltableid = setInterval(function() {
//     $('#tanggalsensor').load("./sensor/table_sensor/tgl.php");
//   }, 1000);



  
</script>

</body>

</html>