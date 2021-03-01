<?php

$logvar = "AAAAAAAAA111WWW234124";

class Cryptography {
  private $key = "rhu384urgfu492iekqpakdhxxbdhr8eieourrufufh";
  private $iv = '1234567891011121';
  public $ciphering = "AES-128-CTR";
  public $options = 0;

  final public function encoding($text) {
    $encryption = openssl_encrypt($text, $this->ciphering,
      $this->key, $this->options, $this->iv);
    return $encryption;
  }

  final public function decoding($data) {
    $decryption = openssl_decrypt ($data, $this->ciphering, $this->key, $this->options, $this->iv);
    return $decryption;
  }

}

/*$obj = new Cryptography();
echo($obj->encoding("Hello"));
echo($obj->decoding("EcSBbkc="));*/


function login_check() {
  global $logvar;
  session_start();
  $obj = new Cryptography();

  if (isset($_SESSION["login_user"])) {
    $de_log_var = $obj->decoding($_SESSION["login_user"]);
    if ($de_log_var == $logvar) {

      return true;

    } else {

      return false;
    }

  } else {
    return false;

  }
  /*check for real user end*/
}



function filter_data($data) {
  $data1 = trim($data);
  $data1 = stripcslashes($data1);
  $data1 = htmlspecialchars($data1);
  return $data1;
}
?>