<?php
include("show_books.php");
$book = 1;
if (isset($_REQUEST["book"])) {
  $book_no = htmlspecialchars($_REQUEST["book"]);
  $book_no = number_format($book_no);
  $book = $book_no;
} else {
  $book = 1;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/single_book.css">
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
          <li class="navbar-item active"><a href="collection.php">Collection</a></li>
          <li class="navbar-item"><a href="contact.php">Contact</a></li>
          <li class="navbar-item"><a href="about.html">About</a></li>
          <li class="navbar-item"><a href="login.php">Login</a></li>
        </ul>
      </div>
    </nav>
  </section>
  <!--navbar end-->

  <!--book info start-->
  <section>
    <?php
    $obj = new SHOW_BOOKS(0, 0);
    $main_data = $obj->single_book($book)[0];
    $url_cover = $main_data["book_cover"];
    $url_download = $main_data["book_pdf"];
    $book_name = $main_data["book_name"];
    $summary = $main_data["summary"];
    $upload_date = $main_data["upload_date"];
    $author_name = $main_data["author_name"];
    ?>
    <div id="single-book">
      <div id="single-book-image">
        <img src="/books/book_cover/<?php echo $url_cover; ?>.png" alt="">
        <h3><?php echo $book_name; ?></h3>
      </div>
      <div id="single-book-des">
        <table>
          <tr>
            <th>Writer Name</th>
            <td><?php echo $author_name; ?></td>
          </tr>
          <tr>
            <th>Catagory</th>
            <td>Science</td>
          </tr>
          <tr>
            <th>Uploaded Date</th>
            <td>2 Jan , 2000</td>
          </tr>
          <tr>
            <th>Sammary</th>
            <td><?php echo $summary; ?></td>
          </tr>
        </table>
      </div>
      <div id="single-book-download">
        <a href="/books/book_main/<?php echo $url_download; ?>.pdf">Download</a>
      </div>
    </div>
  </section>
  <!--book info end-->


  <!--footer start-->
  <footer>
    <p>
      All reversed by <strong>arghabooks.com</strong>
    </p>
  </footer>
  <!--footer end-->

  <script src="js/collection.js" type="text/javascript"></script>
</body>
</html>