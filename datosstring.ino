#include <SoftwareSerial.h>
#define tempo 500

int pinecho = 6;
int pintrigger = 7;
int pinled = 13;  
int sensorPin = 3;
int cont = 0;
bool s_high = 0;
int estado = 0;
int counter = 0; 
String envio= "";
// VARIABLES PARA CALCULOS
int tiempo, distancia;

void setup() {
  Serial3.begin(115200);
  Serial.begin(115200);
  pinMode(3, INPUT);
  // PREPARAR LA COMUNICACION SERIAL
  Serial.begin(115200);
  // CONFIGURAR PINES DE ENTRADA Y SALIDA
  pinMode(pinecho, INPUT);
  pinMode(pintrigger, OUTPUT);
  pinMode(13, OUTPUT);
}
void loop() {

      // ENVIAR PULSO DE DISPARO EN EL PIN "TRIGGER"
  digitalWrite(pintrigger, LOW);
  delayMicroseconds(100000);
  digitalWrite(pintrigger, HIGH);
  // EL PULSO DURA AL MENOS 10 uS EN ESTADO ALTO
  delayMicroseconds(100000);
  digitalWrite(pintrigger, LOW);
  tiempo = pulseIn(pinecho, HIGH);   // MEDIR EL TIEMPO EN ESTADO ALTO DEL PIN "ECHO" EL PULSO ES PROPORCIONAL A LA DISTANCIA MEDIDA
   // LA VELOCIDAD DEL SONIDO ES DE 340 M/S O 29 MICROSEGUNDOS POR CENTIMETRO
  // DIVIDIMOS EL TIEMPO DEL PULSO ENTRE 58, TIEMPO QUE TARDA RECORRER IDA Y VUELTA UN CENTIMETRO LA ONDA SONORA
  distancia = tiempo / 58;
  // ENVIAR EL RESULTADO AL MONITOR SERIAL
  Serial.print(distancia); //imprimir distancia
  Serial.println(" cm");

if(digitalRead(3)) s_high = 1;
 if(!digitalRead(3) && s_high)
 {
  s_high = 0;
  counter += 1;     
  Serial.println("este es el valor del contador ");
  Serial.println(counter);                                                     //dato a enviar numero de paquetes  
 // Serial3.write(ccounter);

    }
    if (distancia <5 ) {
    digitalWrite(13, HIGH);
    delay(3000);
              
        
  estado = 1;

  Serial.print(distancia); //imprimir cuantos no pasan                        //dato  a enviar de la distancia a la que paso el paquete 
envio= String('a')+String(counter)+ String('b')+String(distancia) ;
  Serial.println(envio);
Serial3.println(envio);  

    }else {
    digitalWrite(13, LOW);
 estado =0;
 
  }
   envio= String('a')+String(counter)+ String('b')+String(distancia) ;
  Serial.println(envio);
Serial3.println(envio); 
  

}
