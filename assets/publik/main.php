<?php
$sql = mysqli_query($konek, "SELECT * FROM tb_kontrol");
$data = mysqli_fetch_array($sql);
$relay = $data['relay'];
?>

<main>



  <article class="container article">

    <section class="home">

    <div class="card-wrapper">
        <div class="card1 task-card">
          <table class="table">
            <thead>
              <tr>
                <th colspan="3" class="table-heading">Monitoring Sensor</th>
              </tr>
              <tr>
                <th>Sensor</th>
                <th>Data</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><i class="fas fa-thermometer-half"></i> Suhu</td>
                <td id="ceksuhu">0</td>
                <td id="statsuhu"></td>
              </tr>
              <tr>
                <td><i class="fas fa-flask"></i> pH</td>
                <td id="cekph">0</td>
                <td id="statph"></td>
              </tr>
              <tr>
                <td><i class="fas fa-water"></i> Kekeruhan</td>
                <td id="cekkeruh">0</td>
                <td id="statkeruh"></td>
              </tr>
              <tr>
                <td><i class="fas fa-chart-bar"></i> Level Air</td>
                <td id="ceklv_air">0</td>
               
                <td id="statlv"></td>
              </tr>
            </tbody>
          </table>
          
      </div>
     

        <script>
          // Fungsi untuk menampilkan tanggal, hari, dan jam
          function showDateTime() {
            var dt = new Date();
            var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            var day = days[dt.getDay()];
            var date = dt.getDate();
            var month = dt.getMonth() + 1;
            var year = dt.getFullYear();
            var hours = dt.getHours();
            var minutes = dt.getMinutes();
            var seconds = dt.getSeconds();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0'+minutes : minutes;
            seconds = seconds < 10 ? '0'+seconds : seconds;
            var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
            document.getElementById("datetime").innerHTML = day + ", " + date + "-" + month + "-" + year + " " + strTime;
            setTimeout(showDateTime, 1000);
          }
          showDateTime();
        </script>


             <!-- clock -->
        <div class="card2 task-card">
        
          
          </div>
        </div>
        <!-- end clock -->

    </div>
    <div class="card-wrapper">
  <div class="card task-card" style="width: 800px;">
    <!-- clock -->
    <div class="clock" style="width: 50%;">
      <div id="datetime" style="font-size: 24px; font-family: 'Courier New', Courier, monospace;">
      </div> <!-- Menampilkan tanggal, hari, dan jam -->
      <h1>   <Perkiraan class="weather-icon"> <Perkiraan class="fas fa-cloud">Perkiraan Cuaca Hari Ini</h1>
      <br>
      <div class="card3-wrapper" style="width: 400px;">
        <div id="weather" style="width: 400px;"></div>
      </div>
    </div>
    <div class="gif" style="width: 50%;">
      <div style="position: relative; overflow: hidden; width: 100%; height: 350px; padding-top: 56.25%;">
        <img id="gifImage" src="gif/istockphoto-1448532345-640_adpp_is.gif" alt="Ikan Nila GIF" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
        <button class="arrow left-arrow" onclick="changeImage(-1)" style="position: absolute; top: 50%; left: 0; transform: translateY(-50%); background-color: rgba(0, 0, 0, 0.5); color: white; border: none; cursor: pointer; padding: 10px; font-size: 16px;">&#10094;</button>
        <button class="arrow right-arrow" onclick="changeImage(1)" style="position: absolute; top: 50%; right: 0; transform: translateY(-50%); background-color: rgba(0, 0, 0, 0.5); color: white; border: none; cursor: pointer; padding: 10px; font-size: 16px;">&#10095;</button>
      </div>
    </div>
  </div>
</div>

<script>
    // Koordinat Banjarmasin
    const latitude = '-3.333164';
    const longitude = '114.586117';
    // Ganti 'YOUR_API_KEY' dengan API Key Anda dari OpenWeatherMap
    const apiKey = '6c4701a226abeebc336ae0ab6818d696';

    // Lakukan permintaan API untuk mendapatkan data cuaca menggunakan One Call API
    fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${apiKey}`)
        .then(response => response.json())
        .then(data => {
            // Konversi suhu dari Kelvin ke Celsius
            const temperature = (data.main.temp - 273.15).toFixed(1);
            const feelsLike = (data.main.feels_like - 273.15).toFixed(1);

            // Tampilkan data cuaca saat ini
            const weatherInfo = `
                <div class="weather-info">
                    <div class="weather-details">
                        <h2>Belitung Barat, Banjarmasin</h2>
                        <p>Deskripsi: ${data.weather[0].description}</p>
                        <p>Temperatur: ${temperature}°C (Merasa seperti: ${feelsLike}°C)</p>
                        <p>Angin: ${data.wind.speed} m/s</p>
                        <p>Kelembaban: ${data.main.humidity}%</p>
                        <p>Tekanan Udara: ${data.main.pressure} hPa</p>
                    </div>
                </div>
            `;
            document.getElementById('weather').innerHTML = weatherInfo;
        })
        .catch(error => console.log('Error:', error));
</script>


</div>
<script>
  var currentImageIndex = 0;
  var images = [
    "gif/istockphoto-1448532345-640_adpp_is.gif",
    "gif/istockphoto-1448531578-640_adpp_is.gif",
    "gif/istockphoto-1448532345-640_adpp_is.gif"
  ];

  function changeImage(n) {
    currentImageIndex += n;
    if (currentImageIndex >= images.length) {
      currentImageIndex = 0;
    }
    if (currentImageIndex < 0) {
      currentImageIndex = images.length - 1;
    }
    document.getElementById("gifImage").src = images[currentImageIndex];
  }
</script>


     
        
      </div>



    </section>



  </article>
</main>