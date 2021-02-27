<?php

 

$server_name = "localhost";
$username = "root";
$password = "root";
$db = "online_books";   
$conn =new mysqli($server_name,$username,$password,$db);
if($conn->connect_errno){
  die("Connection is dead , ");
}


/*$sql_code="Select username,password from autho";

$result=$conn->query($sql_code);

echo var_dump($result->fetch_assoc());
echo $result->num_rows;*/


?>
