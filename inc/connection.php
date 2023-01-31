<!-- connect front-end(html) to back-end(mysql) -->

<?php
//ß$conn = new mysqli('localhost', 'root', '', 'test');

$dbhost = "localhost";
$dbuser = "root";
$dbpsw = "";
$dbname = "test";

$conn = mysqli_connect($dbhost, $dbuser, $dbpsw, $dbname);

if(!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}
 ?>
