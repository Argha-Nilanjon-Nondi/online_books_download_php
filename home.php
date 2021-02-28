<?php
include("show_books.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/home.css">
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
          <li class="navbar-item active"><a href="/home.php">Home</a></li>
          <li class="navbar-item"><a href="collection.php">Collection</a></li>
          <li class="navbar-item"><a href="contact.php">Contact</a></li>
          <li class="navbar-item"><a href="about.html">About</a></li>
          <li class="navbar-item"><a href="/login.php">Login</a></li>
        </ul>
      </div>
    </nav>
  </section>
  <!--navbar end-->
  <!--slider start-->
  <section>
    <div id="slider">
      <div id="slider-con">
        <img src="img/slider/2.jpg" alt="">
      </div>
      <div id="slider-cap">
        <div id="slider-cap-cont">
          <img src="img/logo.png" alt="">
          <h1>Argha Book</h1>
          <p>
            Read book , See world
          </p>
        </div>
      </div>
    </div>
  </section>
  <!--slider end-->
  <!--intro start-->
  <section>
    <div class="intro">
      <h4>Our story</h4>
      <br><br>
      <div class="intro-1">
        <div class="intro-pic">
          <img src="img/author/1.jpg" alt="">
        </div>
        <div class="intro-story-1">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. A beatae quisquam praesentium sunt, non
            quidem accusantium recusandae cum impedit, similique inventore nisi minus at quo, ad dolores
            aperiam? Cupiditate, doloremque.
            Obcaecati acilis dicta! Non laboriosam earum aliquid architecto, officiis eligendi ratione eius
            quidem dolorem fugiat consectetur ipsa unde!
            Eius a reiciendis fugit, fuga eligendi obcaecati sequi impedit iusto laboriosam recusandae
            laudantium saepe aperiam mollitia aut itaque quidem nihil quisquam tenetur rerum ad
            necessitatibus incidunt ducimus! Voluptate, impedit cumque!
          </p>
        </div>
      </div>

    </div>
  </section>
  <!--intro end-->
  <!--recent start-->
  <section>
    <div class="recent">
      <h4>Recently uploaded</h4>
      <div class="recent-coll">
        <div class="recent-coll">

          <?php
          $obj = new SHOW_BOOKS(1, 5);
          $array = $obj->most_recent();
          foreach ($array as $elem) {
            $data1 = $elem['book_name'];
            $id = $elem['book'];
            $data2 = "/books/book_cover/$id.png";
            $data3 = $elem["no"];
            echo("<!--editable start--><div class='recent-coll-book'><img src='$data2' ><h3>$data1</h3><a target='_blank' href='/single_post.php?book=$data3'>View me</a></div><!--editable end-->");
          }
          ?>
        </div>
      </div>
    </section>
    <!--recent end-->

    <!--view start-->
    <section>
      <div class="overv-int">
        <h4>Books overview</h4>
        <!--editable start-->
        <div class="overv">
          <a href="#">
            <h4>Author name</h4>
          </a>
          <div class="overv-hold">
            <div class="overv-pic">

              <img src="img/author/1.jpg" alt="" />

            </div>
            <div class="overv-book">
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
            </div>
          </div>
        </div>
        <!--editable start-->
        <!--editable start-->
        <div class="overv">
          <a href="#">
            <h4>Author name</h4>
          </a>
          <div class="overv-hold">
            <div class="overv-pic">

              <img src="img/author/1.jpg" alt="" />

            </div>
            <div class="overv-book">
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
            </div>
          </div>
        </div>
        <!--editable start-->
        <!--editable start-->
        <div class="overv">
          <a href="#">
            <h4>Author name</h4>
          </a>
          <div class="overv-hold">
            <div class="overv-pic">

              <img src="img/author/1.jpg" alt="" />

            </div>
            <div class="overv-book">
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
              <!--editable start-->
              <div class="overv-book-box">
                <div>
                  <img src="img/books/1.jpg" alt="">
                </div>
              </div>
              <!--editable end-->
            </div>
          </div>
        </div>
        <!--editable start-->
      </div>
    </section>
    <!--view end-->

    <!--footer start-->
    <footer>
      <p>
        All reversed by <strong>arghabooks.com</strong>
      </p>
    </footer>
    <!--footer end-->
  </body>

</html>