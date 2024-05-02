#include <HTTPClient.h>
#include <WiFi.h>

//include libaray servo
#include "Servo.h"
//INCLUDE libaray untuk sesor ds18b20
#include "OneWire.h"
#include "DallasTemperature.h"

//network ssid
const char* ssid = "AndroidAP3DC4";
const char* pass = "12345678";

//ambil ip server
const char* host = "192.168.43.49";

//definisikan pin relay dan servo

#define pin_relay 5  //D5
#define pin_servo 18  //D18


//definisikan pin untuk sensor ds18b20
const int oneWireBus = 17; //D8

//membuat object untuk ds18b20
OneWire oneWire(oneWireBus);
DallasTemperature sensorSuhu(&oneWire);

//membuat oject untuk ervo
Servo myservo;

//sensor ph air
int sensorPh;
int mappingPh;
float voltPh;
float Po = 0;
float PH_step;
float PH4 = 2.226;
float PH7 = 2.691;
#define PH_PIN 13

//sensor ph air
int sensorPh;
float voltPh;
float pH ;
#define PH_PIN 2


//sensor kekeruhan
int sensorKeruh;
float voltKek;
float KekKal = 23.00;
float kekeruhan;
float keruhKal;
float keruhMap;
float keruh;
#define PIN_KEK 15




//sensor jarak ultrasonik hc sr-o4
const int Jarak_trigPin = 4;
const int Jarak_EchoPin = 2;
double duration, distanceCM, jarak;

void setup() {
  Serial.begin(9600);

  //koneksi ke WiFi
  //  WiFi.hostname("NodeMCU");
  WiFi.begin(ssid, pass);

  //cek koneksi berhasil atau tidak
  while (WiFi.status() != WL_CONNECTED) {
    //coba koneksi terus
    Serial.print(".");
    delay(500);
  }

  //apabila terkoneksi
  Serial.println("berhasil konek ke wifi");

  //berikan mode untuk relay
  pinMode(pin_relay, OUTPUT);
  //status awal mati/off
  digitalWrite(pin_relay, 0);  //LOW = 0 = OFF HIGH=1=ON

  //setup untuk servo
  myservo.attach(pin_servo);
  //set posisi awal drajat servo
  myservo.write(0);


  //Sensor ultrasonik
  pinMode(Jarak_trigPin, OUTPUT);
  pinMode(Jarak_EchoPin, INPUT);
}

void loop() {
  //koneksi ke server/web apache
  WiFiClient client;
  const int httpPort = 80;
  //uji konesi ke server
  if (!client.connect(host, httpPort)) {
    Serial.println("gagal koneksi ke server");
    return;
  }


  //sensor suhuu
  sensorSuhu.requestTemperatures();
  float suhu = sensorSuhu.getTempCByIndex(0);
  float temperatureF = sensorSuhu.getTempFByIndex(0);
  Serial.print(suhu);  //yang dibutuhkan hanya satuan celcius
  Serial.println("ºC");
  Serial.print(temperatureF);
  Serial.println("ºF");


  // sensor pH
  sensorPh = analogRead(PH_PIN);
  voltPh = sensorPh * (3.3 / 1024);
  pH = (-1.2518 * voltPh + 20.513) + 1.90;
  Serial.print("Tegangan PH = ");
  Serial.println (voltPh);
  Serial.print("PH = ");
  Serial.println (pH);

  //sensor kekeruhan
  sensorKeruh = analogRead(PIN_KEK);
  voltKek = sensorKeruh * (3.3 / 1024);
  Serial.print("Volt Kekeruhan = ");
  Serial.println(voltKek);
  kekeruhan = -30.402 * voltKek + 100.04 ;
  keruhKal = 100 / (kekeruhan - 12.42) * (-100) ;
  keruhMap = map(keruhKal, 0, 143.41, 0, 50.00);
  keruh = keruhMap - KekKal;
  Serial.print("Nilai Kekeruhan = ");
  Serial.println(keruh);

  // Sensor ultrasonik
  digitalWrite(Jarak_trigPin, LOW);
  delayMicroseconds(5);
  digitalWrite(Jarak_trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(Jarak_trigPin, LOW);
  duration = pulseIn(Jarak_EchoPin, HIGH);
  //  distanceCM = (duration / 29 / 2);
  distanceCM = (duration * 0.34);
  jarak = (0.0433 * distanceCM + 1.0974) + 0.4 ;
  Serial.print(jarak);
  Serial.println(" CM");

     //baca nilai sensor pH
  String LinkPh;
  HTTPClient httpPh;
  //  LinkSensors = "http://" + String(host) + "/kontrolling/kirimdata.php?suhu=" + String(suhu) + "&level=" + String(level);
  LinkPh = "http://" + String(host) + "/tugasakhir/admin/kontrolling/kirimdata.php?suhu=" + String(suhu) + "&level=" + String(level);
  httpPh.begin(LinkPh);
  //ambil isi status relay
  httpPh.GET();
  //baca statys response
  String responsePh = httpPh.getString();
  Serial.println(responsePh);
  httpPh.end();   


    //baca nilai sensor kekeruhan
  String LinkKeruh;
  HTTPClient httpKeruh;
  //  LinkSensors = "http://" + String(host) + "/kontrolling/kirimdata.php?suhu=" + String(suhu) + "&level=" + String(level);
  LinkKeruh = "http://" + String(host) + "/tugasakhir/admin/kontrolling/kirimdata.php?suhu=" + String(suhu) + "&level=" + String(level);
  httpKeruh.begin(LinkKeruh);
  //ambil isi status relay
  httpKeruh.GET();
  //baca statys response
  String responseKeruh = httpKeruh.getString();
  Serial.println(responseKeruh);
  httpKeruh.end();

  //baca nilai sensor ultrasonik
  String LinkUltrasonik;
  HTTPClient httpUltrasonik;
  //  LinkSensors = "http://" + String(host) + "/kontrolling/kirimdata.php?suhu=" + String(suhu) + "&level=" + String(level);
  LinkUltrasonik = "http://" + String(host) + "/tugasakhir/admin/kontrolling/kirimdata.php?suhu=" + String(suhu) + "&level=" + String(level);
  httpUltrasonik.begin(LinkUltrasonik);
  //ambil isi status relay
  httpUltrasonik.GET();
  //baca statys response
  String responseUltrasonik = httpUltrasonik.getString();
  Serial.println(responseUltrasonik);
  httpUltrasonik.end();

  //baca nilai sensor ds18 dan level water
  String LinkSensors;
  HTTPClient httpSensors;
  //  LinkSensors = "http://" + String(host) + "/kontrolling/kirimdata.php?suhu=" + String(suhu) + "&level=" + String(level);
  LinkSensors = "http://" + String(host) + "/tugasakhir/admin/kontrolling/kirimdata.php?suhu=" + String(suhu) + "&level=" + String(level);
  httpSensors.begin(LinkSensors);
  //ambil isi status relay
  httpSensors.GET();
  //baca statys response
  String responseSensors = httpSensors.getString();
  Serial.println(responseSensors);
  httpSensors.end();

  //baca status relay
  String LinkRelay;
  HTTPClient httpRelay;
  // LinkRelay = "http://" + String(host) + "/kontrolling/bacarelay.php";
  LinkRelay = "http://" + String(host) + "/tugasakhir/admin/kontrolling/bacarelay.php";
  httpRelay.begin(LinkRelay);
  //ambil isi status relay
  httpRelay.GET();
  //baca statys response
  String responseRelay = httpRelay.getString();
  Serial.println(responseRelay);
  httpRelay.end();

  //ubah status relay di nodemcu
  digitalWrite(pin_relay, responseRelay.toInt());

  //baca status servo
  String LinkServo;
  HTTPClient httpServo;
  //  LinkServo = "http://" + String(host) + "/kontrolling/bacaservo.php";
  LinkServo = "http://" + String(host) + "/tugasakhir/admin/kontrolling/bacaservo.php";
  httpServo.begin(LinkServo);
  //ambil isi status relay
  httpServo.GET();
  //baca statys response
  String responseServo = httpServo.getString();
  Serial.println(responseServo);
  httpServo.end();

  //set posisi servo
  myservo.write(responseServo.toInt());

  delay(1000);
}
