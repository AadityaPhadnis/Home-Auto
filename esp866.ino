/*
 *  This sketch sends data via HTTP GET requests to homeautomationec15.000webhostapp.com service.
 *
 *
 */
#include <ESP8266WiFi.h>
const char* ssid     = "ADYYRTUzNjM"
const char* password = "1234567890";
const char* host = "homeautomationec15.000webhostapp.com";
const char* id = "house1";
String line;
char data[20];
void setup() {
  Serial.begin(9600);
  delay(10);
  // We start by connecting to a WiFi network
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
  }
  Serial.println(WiFi.localIP());
}
void loop() {
  int i=0,j=0;
  delay(1000);
  // Use WiFiClient class to create TCP connections
  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    return;
  }

  // We now create a URI for the request
  String url = "/esp.php?id=" + id;

  // This will send the request to the server
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n");
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 5000) {
      client.stop();
      return;
    }
  }
  // Read all the lines of the reply from server and print them to Serial
  while(client.available()){
   line = client.readStringUntil('\r');
   for(i=0;i<line.length();i++)
   {
    if(line[i]=='*')
    {
     break;
    }
   }
  for(i=i;i<line.length();i++)
  {
    data[j]=line[i];
    j++;
  }
  }

  Serial.println(data);
}
