
#include <SoftwareSerial.h>
#include <ESP8266WiFi.h>


int contconexion = 0;

const char *ssid = "GRUPO 2";
const char *password = "";

unsigned long previousMillis = 0;

char host[48];
String strhost = "172.16.42.226"; // 
 String strurl = "/conexion_ce/enviardatos.php";
String chipid = "";
int chipid1 = 0;
SoftwareSerial NodeMCU(D2,D3);

//-------Función para Enviar Datos a la Base de Datos SQL--------

String enviardatos(String datos) {
  String linea = "error";
  WiFiClient client;
  strhost.toCharArray(host, 49);

      if (client.connect(host, 80)) {
    Serial.println("exitosa ....");
    return linea;
  }else if (!client.connect(host, 80)) {
    Serial.println("Fallo de conexión…");
    return linea;
  }

  client.print(String("POST ") + strurl + " HTTP/1.1" + "\r\n" + 
               "Host: " + strhost + "\r\n" +
               "Accept: */*" + "*\r\n" +
               "Content-Length: " + datos.length() + "\r\n" +
               "Content-Type: application/x-www-form-urlencoded" + "\r\n" +
               "\r\n" + datos);           
  delay(10);             
  
  Serial.print("Enviando datos a SQL...");
  
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 5000) {
      Serial.println("Cliente fuera de tiempo!");
      client.stop();
      return linea;
    }
  }
  // Lee todas las líneas que recibe del servidor y las imprime por el terminal serial
  while(client.available()){
    linea = client.readStringUntil('\r');
  }  
  Serial.println(linea);
  return linea;
}

//-------------------------------------------------------------------------

// si no vale aqui va  SoftwareSerial NodeMCU(D2,D3);
void setup() {
  Serial.begin(115200);
  NodeMCU.begin(115200);
  Serial.println("");
  pinMode(D2,INPUT); //rx  ----14ardunio
  pinMode(D3,OUTPUT); //tx ----13arduino

    Serial.print("chipId: "); 
  chipid = String(ESP.getChipId());
  Serial.println(chipid); 

  // Conexión WIFI
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED and contconexion <50) { //Cuenta hasta 50 si no se puede conectar entonces cancela
    ++contconexion;
    delay(500);
    Serial.print(".");
  }
  if (contconexion <50) {
      //para usar con ip fija
      IPAddress ip(192,168,1,2); 
      IPAddress gateway(192,168,1,1); 
      IPAddress subnet(255,255,255,0); 
      WiFi.config(ip, gateway, subnet); 
      
      Serial.println("");
      Serial.println("Conexion establecida a: ");
      Serial.println(WiFi.localIP());
  }
  else { 
      Serial.println("");
      Serial.println("Error de conexion");
  }
}
void loop() {                                                                                 
                                                                                      //*********** ESCOGER LOS DATOS DE ACUERDO AL CHIP QUE ESTA MANDANDO SEÑAL************
  if(NodeMCU.available()){
  String c = NodeMCU.readStringUntil('\n'); 
      enviardatos("chipid=" + chipid + "&dato=" + c );
 Serial.println(c);


}
}

   
                                                                                            
