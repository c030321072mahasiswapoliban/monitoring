
/**pin sensor
  //1. sensor ultrasonik trig 23 echo 22
  //2. sensor ph 34
  //3. sensor kekeruhan 35
  //4. sensor suhu 33
**/

/**
  1. pin servo pakan 16
  2. pin relay pompa1 17 && relaysecond 5

**/

#include <HTTPClient.h>
#include <WiFi.h>
#include "Servo.h"
#include "OneWire.h"
#include "DallasTemperature.h"

//sensor jarak ultrasonik hc sr-o4
int trigPin = 23;
int echoPin = 22;
long waktu;
int lv_air;

//sensor ph air
#define PH_PIN 34
#define PH_X 4.01
#define PH_OFFSET  6.68 //6.03 //6.07
#define m 9 // V
#define n 3000 // A
#define x 6 // filter

int sensorPh[10];
int sensorPh1;
int voltPh[10];
float voltPh1;
int ph1[10] ;
int ph2 ;
int ph3[10];
float ph4;
int ph5[10];
float ph6;
int ph7[10];
float ph8;
int ph9[10];
float ph;

//sensor kekeruhan
#define PIN_KEK 35
int sensorKeruh;
float voltKek;
float KekKal = 30.00; //23.00;
float kekeruhan0;
float kekeruhan;
float keruhKal;
float keruhMap;
float keruh;

//sensor suhu
#include "OneWire.h"
#include "DallasTemperature.h"
const int oneWireBus = 33;
OneWire oneWire(oneWireBus);
DallasTemperature sensorSuhu(&oneWire);

//servo untuk pakan ikan
Servo myservo;
#define pin_servo 16

//relay untuk pompa air
#define pin_relay 17
#define pin_relaysecond 5

//konfigurasi untuk koneksi ke wifi
const char* ssid = "AndroidAP3DC4";
const char* pass = "12345678";
const char* host = "192.168.43.49";

void setup() {
  Serial.begin(9600);

  WiFi.begin(ssid, pass);
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(500);
  }
  Serial.println("berhasil konek ke wifi !!! ");

  /**--------------------sensor---------------------------------**/
  //Sensor ultrasonik
  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);
  //sensor ph
  pinMode(PH_PIN, INPUT);
  pinMode(PIN_KEK, INPUT);

  /**---------------------kontrol-------------------------------**/

  //servo untuk pakan ikan
  myservo.attach(pin_servo);
  myservo.write(0);

  //relay1 pompa air
  pinMode(pin_relay, OUTPUT);
  digitalWrite(pin_relay, 0);
  //relaysecond pompa iar
  pinMode(pin_relaysecond, OUTPUT);
  digitalWrite(pin_relaysecond, 0);
}

void loop() {

  WiFiClient client;
  const int httpPort = 80;
  //uji konesi ke server
  if (!client.connect(host, httpPort)) {
    Serial.println("gagal koneksi ke server ;( ");
    return;
  }

  /**-------------------sensor-----------------------------**/

  // Sensor ultrasonik
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  waktu = pulseIn(echoPin, HIGH);
  lv_air = waktu * 0.034 / 2;
  Serial.print("Jarak: ");
  Serial.println(lv_air);

 for (int i = 0; i < n; i++)
  {
    sensorPh[i] = analogRead(PH_PIN);
    sensorPh1 += sensorPh[i];

    voltPh[i] = sensorPh1 * (3.3 / 1024);
    voltPh1 += voltPh[i];

    ph1[i] = (sensorPh1 * voltPh1);
    ph2 += ph1[i];

    delay(10);

    if (i = m - 1)
    {
      sensorPh1 /= m;
      voltPh1 /= m;
      ph2 /= m;
      break;
    }
  }
//  Serial.print("Rata-rata Nilai Analog Sensor Adalah : ");
//  Serial.println(sensorPh1);
//  Serial.print("Rata-rata Nilai VoltPh Sensor Adalah : ");
//  Serial.println(voltPh1);
//  Serial.print("Rata - rata Analog Sensor * Volt Sensor  PH = ");
//  Serial.println(ph2);

  /** filter pertama 1 **/

  for (int j = 0; j < n; j++)
  {
    ph3[j] = (sensorPh1 * voltPh1) / m - 1;
    ph4 += ph3[j];
    delay(5);
    if (j = m - 1)
    {
      ph4 /= m;
      break;
    }

  }

  /** filter ke dua **/

  for (int k = 0; k < m; k++)
  {
    ph5[k] = ph4 + PH_X;
    ph6 += ph5[k];
    delay(5);
    if (k = x - 1)
    {
      ph6 /= x;
      break;
    }
  }

  /** filter ke 3**/

  for (int y = 0; y < m; y++)
  {
    ph7[y] = ph6 + ph4;
    ph8 += ph7[y];
    delay(5);
    if (y = x - 1)
    {
      ph8 /= x;
      break;
    }
  }

    /** filter ke 4**/

  for(int z=0;z<n;z++)
  {
    ph9[z]= ph8+ph6;
    ph+=ph9[z];
    delay(5);
    if(z=m-1)
    {
      ph/=m;
      break;
    }
  }
  ph = ph + PH_OFFSET;
  Serial.print("Nilai PH = ");
  Serial.println(ph);

  //sensor kekeruhan
  sensorKeruh = analogRead(PIN_KEK);
  voltKek = sensorKeruh * (3.3 / 1024);
  Serial.print("Volt Kekeruhan = ");
//  Serial.println(voltKek);
  kekeruhan0 = -30.402 * voltKek + 100.04 ;
  keruhKal = 100 / (kekeruhan0 - 12.42) * (-100) ;
  keruhMap = map(keruhKal, 0, 1186.00, 0, 500.00);
  kekeruhan = keruhMap - KekKal;
  Serial.print("Nilai Kekeruhan = ");
  Serial.println(kekeruhan);

  //sensor suhu
  sensorSuhu.requestTemperatures();
  float suhu = sensorSuhu.getTempCByIndex(0);
  float temperatureF = sensorSuhu.getTempFByIndex(0);
  Serial.print(suhu);  //yang dibutuhkan hanya satuan celcius
  Serial.println("ºC");
  Serial.print(temperatureF);
  Serial.println("ºF");

  /**-----------------------------------end sensor----------------------------------------------**/

  /**-------------------------kirim sensor data ke database website------------------------------**/
  String LinkSensors;
  HTTPClient httpSensors;
  LinkSensors = "http://" + String(host) + "/monitoring/admin/sensor/kirimdata/kirimdata.php?suhu=" + String(suhu) + "&ph=" + String(ph) + "&lv_air=" + String(lv_air) + "&kekeruhan=" + String(kekeruhan);
  httpSensors.begin(LinkSensors);
  httpSensors.GET();
  String responseSensors = httpSensors.getString();
  Serial.println(responseSensors);
  httpSensors.end();


  /**-----------------------------kirim data untuk on / off pompa air-----------------------------------**/
  String LinkRelay;
  HTTPClient httpRelay;
  LinkRelay = "http://" + String(host) + "/monitoring/admin/kontrol/bacarelay/bacarelay.php";
  httpRelay.begin(LinkRelay);
  httpRelay.GET();
  String responseRelay = httpRelay.getString();
  Serial.println(responseRelay);
  httpRelay.end();
  digitalWrite(pin_relay, responseRelay.toInt());


  /**---------------------kirim data untuk on / off relay ke 2 --------------------------------------**/
  //  String LinkRelaySecond;
  //  HTTPClient httpRelaySecond;
  //  LinkRelaySecond =  "http://" + String(host) + "/tugasakhir/admin/kontrolling/bacarelaysecond.php";
  //  httpRelaySecond.begin(LinkRelaySecond);
  //  //ambul status relaysecond
  //  httpRelaySecond.GET();
  //  //baca status respons
  //  String responseRelaySecond = httpRelaySecond.getString();
  //  Serial.println(responseRelaySecond);
  //  httpRelaySecond.end();
  //  //ubah starys relay di nodemcu
  //  digitalWrite(pin_relaysecond, responseRelaySecond.toInt());


  /**-------------------------------kirim data servo untuk memberikan pakan ikan ---------------------------**/
  //  String LinkServo;
  //  HTTPClient httpServo;
  //  //  LinkServo = "http://" + String(host) + "/kontrolling/bacaservo.php";
  //  LinkServo = "http://" + String(host) + "/tugasakhir/admin/kontrolling/bacaservo.php";
  //  httpServo.begin(LinkServo);
  //  //ambil isi status relay
  //  httpServo.GET();
  //  //baca statys response
  //  String responseServo = httpServo.getString();
  //  Serial.println(responseServo);
  //  httpServo.end();
  //
  //  //set posisi servo
  //  myservo.write(responseServo.toInt());
  delay(3000);
}
