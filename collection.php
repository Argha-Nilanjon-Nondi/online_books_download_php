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


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/collection.css">
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
          <li class="navbar-item"><a href="vontact.php">Contact</a></li>
          <li class="navbar-item"><a href="about.html">About</a></li>
          <li class="navbar-item"><a href="login.php">Login</a></li>
        </ul>
      </div>
    </nav>
  </section>
  <!--navbar end-->

  <!--directory start-->
  <section>
    <div id="directory">
      <!--edit start-->
      <div class="directory-sub">
        <div class="directory-sub-head">
          <h3 class="directory-sub-head-button">+</h3>
          <p>
            Horror
          </p>
        </div>
        <div class="directory-sub-collaspe">
          <div class="directory-sub-call">
            <div>
              <a href="#">Name 1</a>
            </div>
          </div>
          <div class="directory-sub-call">
            <div>
              <a href="#">Name 1</a>
            </div>
          </div>
          <div class="directory-sub-call">
            <div>
              <a href="#">Name 1</a>
            </div>
          </div>

        </div>
      </div>
      <!--edit end-->
      <!--edit start-->
      <div class="directory-sub">
        <div class="directory-sub-head">
          <h3 class="directory-sub-head-button">+</h3>
          <p>
            Horror
          </p>
        </div>
        <div class="directory-sub-collaspe">
          <div class="directory-sub-call">
            <div>
              <a href="#">Name 1</a>
            </div>
          </div>
          <div class="directory-sub-call">
            <div>
              <a href="#">Name 1</a>
            </div>
          </div>
          <div class="directory-sub-call">
            <div>
              <a href="#">Name 1</a>
            </div>
          </div>

        </div>
      </div>
      <!--edit end-->
      <!--edit start-->
      <div class="directory-sub">
        <div class="directory-sub-head">
          <h3 class="directory-sub-head-button">+</h3>
          <p>
            Horror
          </p>
        </div>
        <div class="directory-sub-collaspe">
          <div class="directory-sub-call">
            <div>
              <a href="#">Name 1</a>
            </div>
          </div>
          <div class="directory-sub-call">
            <div>
              <a href="#">Name 1</a>
            </div>
          </div>
          <div class="directory-sub-call">
            <div>
              <a href="#">Name 1</a>
            </div>
          </div>

        </div>
      </div>
      <!--edit end-->
    </div>
  </section>
  <!--directory end-->

  <!--recent start-->
  <section>
    <div class="recent">
      <h4>Recently uploaded</h4>
      <div class="recent-coll">

        <?php
        $obj = new SHOW_BOOKS(1, 5);
        $array = $obj->most_recent();
        foreach ($array as $elem) {
          $data1 = $elem['book_name'];
          $id = $elem['book_cover'];
          $data2 = "/books/book_cover/$id.png";
          $data3 = $elem["no"];
          echo("<!--editable start--><div class='recent-coll-book'><img src='$data2' ><h3>$data1</h3><a target='_blank' href='/single_post.php?book=$data3'>View me</a></div><!--editable end-->");
        }
        ?>



      </div>
    </div>
  </section>
  <!--recent end-->
  <hr>
  <!--all boks start-->
  <section>
    <div class="recent">
      <h4>View Our Books</h4>
      <div class="recent-coll">


        <?php
        $obj = new SHOW_BOOKS($page, 5);
        $array = $obj->all_books();
        foreach ($array as $elem) {
          $data1 = $elem['book_name'];
          $id = $elem['book_cover'];
          $data2 = "/books/book_cover/$id.png";
          $data3 = $elem["no"];
          echo("<!--editable start--><div class='recent-coll-book'><img src='$data2' ><h3>$data1</h3><a target='_blank' href='/single_post.php?book=$data3'>View me</a></div><!--editable end-->");
        }
        ?>


      </div>
    </div>
  </section>
  <!--all boks end-->

  <!--Pagenation start-->
  <?php
  $a = SHOW_BOOKS::page_direction($page, "collection");
  $pre_link = $a[0];
  $next_link = $a[1];
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

  <script src="js/collection.js" type="text/javascript"></script>
</body>
</html>