<?php

include "config.php";
include "crypto.php";

$password_err = "";
$email_err = "";
$error = "";

$test = login_check();
if ($test == false) {

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  

  $email = $_POST["email"];
  $password = $_POST["password"];

  if (empty($email) || empty($password)) {
    $error = '<p class="lore-error">You must filled all data</p>';
  } else {
    

    
    $sql_code = "Select email,password from autho where email='$email'";
    
    $result1 = $conn->query($sql_code);

    if ($result1->num_rows>0){
        $result2=$result1->fetch_assoc();
        if($password==$result2["password"]){
        $error='<p class="lore-succ">successfully login</p>';
        session_start();
       
        $obj=new Cryptography();
        $_SESSION["login_user"]=$obj->encoding($logvar);
        $now = time();
$_SESSION['discard_after'] = $now + 9000;
        
        header("Location:http://".$_SERVER["HTTP_HOST"]."/admin_home.php");
        exit();
        }
        else{
          $error = '<p class="lore-error">Email or Pasword is incorrect</p>';
        }
    }
    else{
        $error = '<p class="lore-error">Email or Pasword is incorrect</p>';
    }
    }

}
}
else {
  header("Location:http://".$_SERVER["HTTP_HOST"]."/admin_home.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title> Login with php </title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/login_phone.css">
   
</head>
<body>
  <!--Login start-->
  <section>
    <div id="login-info">
      <!--Login form start-->
      <div id="login">
        <div id="login-c">
          <div id="login-c-head">
            <h1>Hello!</h1>
            <p>
              sign in to your account
            </p>
          </div>
          <div id="login-c-form">
            <form action="login.php" method="post" accept-charset="utf-8">
              <div class="login-field">
                <img src="img/email.png" alt="" />
                <input type="text" name="email" id="" value="" required/>
              </div>
              <div class="login-field">
                <img src="img/lock.png" alt="" />
                <input type="password" name="password" id="pass-in" value="" required/>
                <img src="img/hide_pass.png" alt="" id="pass-show" />
              </div>
              <div id="login-c-btn">
                <a href="#">Forgot password</a>
                 <?php echo $error; ?>
                <input type="submit" value="Sign Up" />
                <a href="#">Already have an account <strong>Login in</strong></a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--Login form end-->
      <!--info start-->
      <div id="info">
        <div id="info-wel">
          <h1>Welcome back</h1>
          <p>Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello </p>
        </div>
      </div>
      <!--info end-->
    </div>
  </section>
  <!--Login end-->
  <script type="text/javascript" src="js/script.js"></script>
</body>
</html>