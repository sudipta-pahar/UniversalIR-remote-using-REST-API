/*Created by Sudipta Pahar of Blackalphaa Solutions as internship project
 * for the Project of UniversalIR Remote using Rest API
 * completed and submitted on 04-04-20 at 12 noon
 */


#include<ESP8266WiFi.h>
const char* ssid = "";//input wifi credentials
const char* ssid = ""

IPAddress ip();//include server credentials
IPAddress gatewayDNS();
IPAddress netmask();

const char* host = "";

void setup()
{
  Serial.begin(115200);
  delay(10); 
  Serial.print("Connecting to ");
  WiFi.config(ip, gatewayDNS,netmask,gatewayDNS);
  WiFi.begin(ssid, password);

  while(WiFi.status()! = WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }

  Serial.print(" WiFi connected\t IP address: ");
  Serial.print(WiFi.localIP());
}

void looop()
{
  delay(5000);
  Serial.print("connecting to.. ");
  Serial.println(host);

  WiFiClient client;
  const int httpPort = 80;
  if(!client.connect(host, httpPort))
  {
    Serial.println("connection failed");
    return;
  }

  String url = "http://192.168.43.217/IRUniversalRemote/buttons.php";
  client.print(String("GET")+ url + "HTTP/1.1\r\n"+ "Host: "+host+ "\r\r"+ "Connection: close\r\n\r\n");
  unsigned long timeout = millis();
  while(client.available()==0)
  {
    if(millis()-timeout> 25000)
    {
      Serial.println(">>> CLient Timeout! ");
      client.stop();
      return;
    }
  }
}while(client.available())
{
  String line = client.readStringUntil('\r');
  Serial.print(line);
  if (line.indexOf("/line") != -1){
      irsend.sendRaw(line, sizeof(line) / sizeof(line[0]), khz);   
      Serial.println("IRreq Communication sent");
  }
}
Serial.println();
Serial.println("closing connection");
client.stop();
}
