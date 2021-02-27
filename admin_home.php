<?php

/*check for real user start*/
include "crypto.php";
include "config.php";
$error="";
session_start();
$obj = new Cryptography();
$de_log_var = $obj->decoding($_SESSION["login_user"]);
if (isset($_SESSION["login_user"])) {
  if ($de_log_var == $log_var) {

    /*Add a book satrt*/
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $book_name = $_POST["book_name"];
      $author_name = $_POST["author_name"];
      $subject = $_POST["subject"];
      $summary=$_POST["summary"];
      $book_cover = $_FILES['book_cover'];
      $book_pdf = $_FILES["book_pdf"];
      $target_path = "/sdcard/coding/project/online_books_download/books/";
      
      
      if(empty($book_name) || empty($author_name) || empty($subject) || empty($book_cover) || empty($book_pdf) || empty($summary)){
         $error='<div id="contact-known" style="background-color:red;">
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
        
  
      }
      
      else{
        
        $rand_num=rand();

      if (move_uploaded_file($book_cover['tmp_name'], $target_path."book_cover/".$rand_num.".png") and move_uploaded_file($book_pdf['tmp_name'], $target_path."book_main/".$rand_num.".pdf")) {
      
      $conn->query("INSERT INTO books(book_name,author_name,summary,book,subject) Values('$book_name','$author_name','$summary','$rand_num','$subject');");
      
        $error='<div id="contact-known">
          <div>
            <p>
              Book added successfully .
            </p>
          </div>
          <div id="contact-known-cancel">
            <p>
              X
            </p>
          </div>
        </div>';
      
      } else {
        $error='<div id="contact-known" style="background-color:red;">
          <div>
            <p style="color:black;">
              Can not add book 
            </p>
          </div>
          <div id="contact-known-cancel">
            <p style="color:black;">
              X
            </p>
          </div>
        </div>';
      
        
      }
      
      }
    
    }
    /*Add a book end*/

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
          <li class="navbar-item"><a href="#">Home</a></li>
          <li class="navbar-item"><a href="#">Collection</a></li>
          <li class="navbar-item"><a href="#">Contact</a></li>
          <li class="navbar-item"><a href="#">About</a></li>
          <li class="navbar-item active"><a href="#">Admin</a></li>
          <li class="navbar-item"><a href="#">Loguot</a></li>
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

        <h4>Add the Book</h4>
      </div>
      <div id="contact-form">
        <form action="" method="post" enctype="multipart/form-data">
          <input type="name" name="book_name" id="" placeholder="Type Book name">
          <input type="text" name="author_name" id="" placeholder="Author Name">
          <input type="text" name="subject" id="" placeholder="Type your subject">
          <input placeholder="Pdf Book"disabled="true" />
          <input type="file" name="book_pdf" placeholder="Book pdf" id="">
          <input placeholder="Book Cover" disabled="true" />
          <input type="file" name="book_cover" id="">
          <textarea name="summary" id="" cols="30" rows="10" placeholder="What is the Sammary"></textarea>
          <button type="submit">Add Book</button>
        </form>
      </div>
    </div>
  </section>
  <!--contact form end-->

  <!--admin edit start-->
  <section>
    <div class="recent">
      <h4>Admin Home</h4>
      <div class="recent-coll">

        <!--editable start-->
        <div class="recent-coll-book">
          <img src="img/books/1.jpg" alt="">
          <h3>Book name</h3>
          <a href="#">View me</a>
          <a href="#">Edit</a>
          <a href="#">Delete</a>
        </div>
        <!--editable end-->
        <!--editable start-->
        <div class="recent-coll-book">
          <img src="img/books/1.jpg" alt="">
          <h3>Book name</h3>
          <a href="#">View me</a>
          <a href="#">Edit</a>
          <a href="#">Delet</a>
        </div>
        <!--editable end-->
        <!--editable start-->
        <div class="recent-coll-book">
          <img src="img/books/1.jpg" alt="">
          <h3>Book name</h3>
          <a href="#">View me</a>
          <a href="#">Edit</a>
          <a href="#">Delet</a>
        </div>
        <!--editable end-->
        <!--editable start-->
        <div class="recent-coll-book">
          <img src="img/books/1.jpg" alt="">
          <h3>Book name</h3>
          <a href="#">View me</a>
          <a href="#">Edit</a>
          <a href="#">Delet</a>
        </div>
        <!--editable end-->
        <!--editable start-->
        <div class="recent-coll-book">
          <img src="img/books/1.jpg" alt="">
          <h3>Book name</h3>
          <a href="#">View me</a>
          <a href="#">Edit</a>
          <a href="#">Delet</a>
        </div>
        <!--editable end-->
        <!--editable start-->
        <div class="recent-coll-book">
          <img src="img/books/1.jpg" alt="">
          <h3>Book name</h3>
          <a href="#">View me</a>
          <a href="#">Edit</a>
          <a href="#">Delet</a>
        </div>
        <!--editable end-->
        <!--editable start-->
        <div class="recent-coll-book">
          <img src="img/books/1.jpg" alt="">
          <h3>Book name</h3>
          <a href="#">View me</a>
          <a href="#">Edit</a>
          <a href="#">Delet</a>
        </div>
        <!--editable end-->


      </div>
    </div>
  </section>
  <!--admin edit end-->
  <hr>
  <!--Pagenation start-->
  <section>
    <div class="pagenation">
      <div class="pagenation-pre">
        <a href="">&lt;</a>
      </div>
      <div class="pagenation-next">
        <a href="">&gt;</a>
      </div>
    </div>
  </section>
  <!--Pagenation end-->

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