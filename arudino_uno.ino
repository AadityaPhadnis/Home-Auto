
#include <SoftwareSerial.h>

SoftwareSerial mySerial(8, 9); // RX, TX

int d1 = 3;
int d2 = 4;
int d3 = 5;
int d4 = 6;
 
void setup() {

  pinMode(d1,OUTPUT);
  pinMode(d2,OUTPUT);
  pinMode(d3,OUTPUT);
  pinMode(d4,OUTPUT);
  // Open serial communications and wait for port to open:
  Serial.begin(9600);

  Serial.println("Goodnight moon!");

  // set the data rate for the SoftwareSerial port
  mySerial.begin(9600);
}

void loop() {
  int i=0;
  String s;
  mySerial.flush();
  while(!mySerial.available()); 
  if(mySerial.available()) {
    s=mySerial.readStringUntil('\r');
  char ch[s.length()];
  s.toCharArray(ch,s.length());
  Serial.println(ch);
  if(ch[1]=='0')
  digitalWrite(d1,LOW);
  if(ch[1]=='1')
  digitalWrite(d1,HIGH);
  if(ch[2]=='0')
  digitalWrite(d2,LOW);
  if(ch[2]=='1')
  digitalWrite(d2,HIGH);
  if(ch[3]=='0')
  digitalWrite(d3,LOW);
  if(ch[3]=='1')
  digitalWrite(d3,HIGH);
  if(ch[4]=='0')
  digitalWrite(d4,LOW);
  if(ch[4]=='1')
  digitalWrite(d4,HIGH);
  }
}

