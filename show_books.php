<?php

include "config.php";

function access_todata($obj) {

  $final_result = array();
  if ($obj->num_rows > 0) {
    while ($data = $obj->fetch_assoc()) {
      array_push($final_result, $data);
    }
  }
  return $final_result;
}

class SHOW_BOOKS {
  public $page;
  public $post_no;
  public function __construct($page, $post_no) {
    $this->page = $page;
    $this->post_no = $post_no;
  }

  public function simple_sum() {
    $sum = ($this->page*$this->post_no)-($this->post_no);
    return $sum;
  }

  public function most_recent() {
    global $conn;
    $sum = $this->simple_sum();
    $sql_code = "Select no,book_name,book_cover,book_pdf from books order by upload_date desc limit $sum,$this->post_no;";
    $result1 = $conn->query($sql_code);

    return access_todata($result1);

  }
  public function all_books() {
    global $conn;
    $sum = $this->simple_sum();
    $sql_code = "Select no,book_name,book_cover,book_pdf from books order by upload_date limit $sum,$this->post_no;";
    $result1 = $conn->query($sql_code);
    $result1 = $conn->query($sql_code);
    return access_todata($result1);
  }

  public function single_book($book) {
    global $conn;
    $sum = $this->simple_sum();
    $sql_code = "Select book_name,book_cover,book_pdf,author_name,summary,upload_date,subject from books where no = $book;";
    $result1 = $conn->query($sql_code);

    return access_todata($result1);
  }
  
    public function delete_book($book) {
    global $conn;
    $sql_code = "DELETE from books where no=$book;";
    $result1 = $conn->query($sql_code);
    return true;
  }

  static public function page_direction($current_page, $url) {
    $pre = 0;
    $next = 0;
    if ($current_page == 0 || $current_page == 1) {
      $pre = 1;
      $next = 2;
    } else {
      $pre = $current_page-1;
      $next = $current_page+1;
    }


    $pre_text = "/$url.php?page=$pre";
    $next_text = "/$url.php?page=$next";

    return array($pre_text, $next_text);
  }
}

/*$obj = new SHOW_BOOKS(1, 10);
echo($obj->simple_sum());
echo(json_encode($obj->most_recent()));*/
/*echo("<br>");
echo(json_encode($obj->all_books()));
echo(json_encode(SHOW_BOOKS::page_direction(1)));
echo(json_encode($obj->single_book(1)));*/
?>