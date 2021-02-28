<?php
/*check for real user start*/
include "crypto.php";
if (login_check() == true) {
  session_destroy();
  header("Location:http://".$_SERVER["HTTP_HOST"]."/home.php");
  exit();
} else {
  header("Location:http://".$_SERVER["HTTP_HOST"]."/home.php");
  exit();
}

/*check for real user end*/
?>