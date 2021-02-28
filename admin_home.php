<?php
include("show_books.php");
$page = 1;
if (isset($_REQUEST["page"])) {
  global $conn;
  $page_no = htmlspecialchars($_REQUEST["page"]);
  $page_no = number_format($page_no);
  $page = $page_no;
} else {
  $page = 1;
}
?>


<?php

/*check for real user start*/
include "crypto.php";
include "config.php";
$error = "";
$test = login_check();
if ($test == true) {

  /*Add a book satrt*/
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_name = $_POST["book_name"];
    $author_name = $_POST["author_name"];
    $subject = $_POST["subject"];
    $summary = $_POST["summary"];
    $book_cover = $_FILES['book_cover'];
    $book_pdf = $_FILES["book_pdf"];
    $target_path = "/sdcard/coding/project/online_books_download/books/";
    $mydate = getdate(date("U"));
    $str_date = "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";


    if (empty($book_name) || empty($author_name) || empty($subject) || empty($book_cover) || empty($book_pdf) || empty($summary)) {
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

      $rand_num = rand();

      if (move_uploaded_file($book_cover['tmp_name'], $target_path."book_cover/".$rand_num.".png") and move_uploaded_file($book_pdf['tmp_name'], $target_path."book_main/".$rand_num.".pdf")) {

        $conn->query("INSERT INTO books(book_name,author_name,summary,book,subject,upload_date) Values('$book_name','$author_name','$summary','$rand_num','$subject','$str_date');");

        $error = '<div id="contact-known">
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
        $error = '<div id="contact-known" style="background-color:red;">
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
        <?php
        $obj = new SHOW_BOOKS($page, 5);
        $array = $obj->all_books();
        foreach ($array as $elem) {
          $data1 = $elem['book_name'];
          $id = $elem['book'];
          $data2 = "/books/book_cover/$id.png";
          $data3 = $elem["no"];
          echo("<!--editable start-->
          <div class='recent-coll-book'>
          <img src='$data2' >
          <h3>$data1</h3>
          <a target='_blank' href='/single_post.php?book=$data3'>View me</a>
           <a target='_blank' href='/admin_update.php?book=$data3'>Edit</a>
            <a target='_blank' href='/admin_delete.php?book=$data3'>Delete</a>
          </div><!--editable end-->");
        }
        ?>
      </div>
    </div>
  </section>
  <!--admin edit end-->
  <hr>
  <!--Pagenation start-->
  <?php
  $a=SHOW_BOOKS::page_direction($page,"admin_home");
  $pre_link=$a[0];
  $next_link=$a[1];
  ?>
  <section>
    <div class="pagenation">
      <div class="pagenation-pre">
        <a href="<?php echo $pre_link; ?>">&lt;</a>
      </div>
      <div class="pagenation-next">
        <a href="<?php echo $next_link; ?>">&gt;</a>
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