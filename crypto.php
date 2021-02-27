<?php

 $log_var="AAAAAAAAA111WWW234124";

class Cryptography {
  private $key = "rhu384urgfu492iekqpakdhxxbdhr8eieourrufufh";
  private $iv = '1234567891011121';
  public $ciphering = "AES-128-CTR";
  public $options=0;
  
  final public function encoding($text) {
    $encryption = openssl_encrypt($text, $this->ciphering,
      $this->key, $this->options, $this->iv);
    return $encryption;
  }
  
  final public function decoding($data){
    $decryption = openssl_decrypt ($data, $this->ciphering,$this->key, $this->options, $this->iv);
    return $decryption;
  }
  
}

/*$obj = new Cryptography();
echo($obj->encoding("Hello"));
echo($obj->decoding("EcSBbkc="));*/

?>