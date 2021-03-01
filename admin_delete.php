<?php
include("show_books.php");
$obj = new SHOW_BOOKS(0, 0);
$confirm = 1;
if (isset($_REQUEST["confirm"])) {
  $confirm_no = htmlspecialchars($_REQUEST["confirm"]);
  $confirm_no = number_format($confirm_no);
  $confirm = $confirm_no;


} else {
  $confirm=1;
}
  $main_data = $obj->single_book($confirm)[0];
$book_name = $main_data["book_name"];
?>

<?php

/*check for real user start*/
include "crypto.php";
include "config.php";
$error = "";
$test = login_check();
if ($test == true) {

  $delete = 1;
  if (isset($_REQUEST["delete"])) {
    $delete_no = htmlspecialchars($_REQUEST["delete"]);
    $delete_no = number_format($delete_no);
    $delete = $delete_no;
    $obj->delete_book($delete);

  header("Location:http://".$_SERVER["HTTP_HOST"]."/admin_home.php");
  exit();
  }



  }
  else {
  header("Location:http://".$_SERVER["HTTP_HOST"]."/home.php");
  exit();
  }
  ?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/collection.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/phone.css">
    <link rel="stylesheet" href="css/delete.css">
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
            <li class="navbar-item"><a href="contact.php">Contact</a></li>
            <li class="navbar-item"><a href="about.html">About</a></li>
            <li class="navbar-item active"><a href="admin_home.php">Admin</a></li>
            <li class="navbar-item"><a href="logout.php">Loguot</a></li>
          </ul>
        </div>
      </nav>
    </section>
    <!--navbar end-->

    <section>
      <div id="delete-confirm">
        <h4>Do you want to delete <?php echo($book_name); ?></h4>
        <div>
          <a href="/admin_delete.php?delete=<?php echo($confirm); ?>">YES</a>
          <a href="/admin_home.php">NO</a>
        </div>
      </div>
    </section>

    <!--footer start-->
    <footer>
      <p>
        All reversed by <strong>arghabooks.com</strong>
      </p>
    </footer>
    <!--footer end-->

    <script src="" type="text/javascript"></script>
  </body>

</html>