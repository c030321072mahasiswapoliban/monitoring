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

  $(document).ready(function() {
    setInterval(function() {
      $("#ceklv").load("./sensor/level/cek.php");
      $("#statlv").load("./sensor/level/status.php");
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
  // end relay
  $(document).ready(function() {
    setInterval(function() {
      //khusus untuk load status relay pmpa air
      $("#status").load("./kontrol/relay/logo.php");
    }, 100);
  });
  /**=====================================================================**/
  // start servo

  // end servo
</script>

</body>

</html>