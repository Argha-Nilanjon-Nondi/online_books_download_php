<?php
$book = 1;
if (isset($_REQUEST["book"])) {
  $book_no = htmlspecialchars($_REQUEST["book"]);
  $book_no = number_format($book_no);
  $book = $book_no;
} else {
  $book = 1;
}

?>

<?php

/*check for real user start*/
include "crypto.php";
include "config.php";
$error = "";
$test = login_check();
if ($test == true) {

  /*update a book start*/
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_name = $_POST["book_name"];
    $author_name = $_POST["author_name"];
    $subject = $_POST["subject"];
    $summary = $_POST["summary"];

    $target_path = "/sdcard/coding/project/online_books_download/books/";


    if (empty($book_name) || empty($author_name) || empty($subject) || empty($summary)) {
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

      $sub_sql = " ";

      $rand_num = rand();

      if (empty($_FILES["book_cover"]) == false) {
        $book_cover = $_FILES['book_cover'];
        move_uploaded_file($book_cover['tmp_name'], $target_path."book_cover/".$rand_num.".png");
        $sub_sql .= ",book_cover=$rand_num";
      }

      if (empty($_FILES["book_pdf"]) == false) {
        $book_pdf = $_FILES["book_pdf"];
        move_uploaded_file($book_pdf['tmp_name'], $target_path."book_main/".$rand_num.".pdf");
        $sub_sql .= ",book_pdf=$rand_num";
      }

      $conn->query("UPDATE books SET book_name='$book_name',author_name='$author_name',subject='$subject',summary='$summary' $sub_sql where no=$book ;");
      
      

      $error = '<div id="contact-known">
          <div>
            <p>
              Book updated successfully .
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

}
/*update a book end*/
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
  <?php
  include "show_books.php";

  $obj = new SHOW_BOOKS(0, 0);
  $main_data = $obj->single_book($book)[0];
  $book_name = $main_data["book_name"];
  $summary = $main_data["summary"];
  $upload_date = $main_data["upload_date"];
  $author_name = $main_data["author_name"];
  $subject = $main_data["subject"];
  ?>
  <!--contact form start-->
  <section>
    <div id="contact">
      <div id="contact-welcome">
        <?php echo($error); ?>
        <h4>Update the Book</h4>
      </div>
      <div id="contact-form">
        <form action="" method="post"  enctype="multipart/form-data">
          <input name="book_name" id="" placeholder="Type Book name" value="<?php  echo($book_name); ?>" required>
          <input name="author_name" id="" placeholder="Author Name" value="<?php  echo($author_name); ?>" required>
          <input type="text" name="subject" id="" placeholder="Type your subject" value="<?php  echo($subject); ?>" required>
          <input placeholder="Pdf Book"disabled="true" />
          <input type="file" name="book_pdf" placeholder="Book pdf" id="" />
          <input placeholder="Book Cover" disabled="true" />
          <input type="file" name="book_cover" id="" />
          <textarea name="summary" id="" cols="30" rows="10" placeholder="What is the Sammary" required> <?php  echo($summary); ?></textarea>
          <button type="submit">Update the Book</button>
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