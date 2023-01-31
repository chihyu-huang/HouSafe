<?php
session_start();
include_once 'inc/header.php';
//include("inc/function.php");
include("inc/connection.php");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HouSafe™ - Online Renting Page</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <div class="image">
      <br><br><br><h1 class="heading"> A rental website you can trust!! </h1>
      <img src=".\img\a.jpg" alt="living room">
    </div>
    <div class="content">
        <a href="signup.php" class="btn">become a member</a>
     </div>

    <img src=".\img\b.jpg" alt="bedroom">
    <div class="content">
        <a href="signup.php" class="btn">Best website to find a room!</a>
     </div>
  <!-- </section> -->
  </body>
</html>

<?php
include_once 'inc/footer.php';
?>
