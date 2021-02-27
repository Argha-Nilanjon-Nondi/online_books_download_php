<?php
/*check for real user start*/
include "crypto.php";
session_start();
$obj = new Cryptography();
$de_log_var = $obj->decoding($_SESSION["login_user"]);
if (isset($_SESSION["login_user"])){
  if ($de_log_var == $log_var) {
    session_destroy();
  } else {
    header("Location:http://".$_SERVER["HTTP_HOST"]."/home.php");
    exit();
  }

} else {

  header("Location:http://".$_SERVER["HTTP_HOST"]."/home.php");
  exit();
}
/*check for real user end*/
?>