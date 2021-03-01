<?php

include "crypto.php";
include "config.php";
$error = "";
/*Add a contact satrt*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $context = $_POST["context"];


  if (empty($name) || empty($email) || empty($subject) || empty($context)) {
    $error = '<div id="contact-known" style="background-color:red;">
          <div>
            <p style="color:black;">
              All data must be filled
            </p>
          </div>
          <div id="contact-known-cancel">
            <p style="color:black;">
              X
            </p>
          </div>
        </div>';


  } else {

    $conn->query("INSERT INTO contact(name,email,subject,context) Values('$name','$email','$subject','$context');");

    $error = '<div id="contact-known">
          <div>
            <p>
              Message send successfully .
            </p>
          </div>
          <div id="contact-known-cancel">
            <p>
              X
            </p>
          </div>
        </div>';





  }

}
/*Add a contact end*/

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" href="css/phone.css">
  <title>Argha book</title>
</head>

<body>
  <!--navbar start-->
  <section>
    <nav>
      <div id="navbar-logo">
        <img src="img/logo.png" alt="">
      </div>
      <div id="nabar-url">
        <ul id="navbar-coll">
          <li class="navbar-item"><a href="home.php">Home</a></li>
          <li class="navbar-item"><a href="collection.php">Collection</a></li>
          <li class="navbar-item active"><a href="contact.php">Contact</a></li>
          <li class="navbar-item"><a href="about.html">About</a></li>
          <li class="navbar-item"><a href="login.php">Login</a></li>
        </ul>
      </div>
    </nav>
  </section>
  <!--navbar end-->

  <!--contact form start-->
  <section>
    <div id="contact">
      <div id="contact-welcome">
        <?php echo($error); ?>
        <h4>Contact Form</h4>
      </div>
      <div id="contact-form">
        <form action="" method="post">
          <input type="name" name="name" id="" placeholder="Your name">
          <input type="email" name="email" id="" placeholder="Email">
          <input type="text" name="subject" id="" placeholder="Type your subject">
          <textarea name="context" id="" cols="30" rows="10" placeholder="What is your context"></textarea>
          <button type="submit">Send It</button>
        </form>
      </div>
    </div>
  </section>
  <!--contact form end-->

  <!--footer start-->
  <footer>
    <p>
      All reversed by <strong>arghabooks.com</strong>
    </p>
  </footer>
  <!--footer end-->

  <script src="js/contact.js" type="text/javascript"></script>
</body>

</html>