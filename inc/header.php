
<?php
include("connection.php");
ini_set('display_errors', 1);

if(isset($message)){
   foreach($message as $message){
      echo '
      <script>
         alert('.$message.')
      </script>
      ';
   }
}

 ?>



<!DOCTYPE html>
<html>
<header class="header">
  <section class="flex">

  <title>TEST</title>
  <link rel="stylesheet" href="..\style.css">
  <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <?php
          if(!isset($_SESSION['email'])){
          ?>
          <a href="about.php" class="logo">HouSafe™</a>
          <?php
          }else{
            ?>
            <a href="search.php" class="logo">HouSafe™</a>
            <?php
            }
            ?>
      <nav class="navbar">
        <div class="header-right">

        <?php
          if(!isset($_SESSION['email'])){
          ?>
              <a href="about.php">About Us</a>
              <a href="search.php">Search</a>
              <a href="signup.php">Sign up</a>
              <a href="login.php">Log in</a>

            <?php
          }else if(isset($_SESSION['email'])){
                ?>
              <a href="home.php">Hi, <?php echo $_SESSION['email'] ?></a>
              <a href="profile.php">Profile</a>
              <a href="password.php">Password</a>

              <?php

              // if($fetch['status'] != ''){
              //       ?>
              <!-- //     <a href="room.php">Room</a> -->
              //     <?php
              //     }
              ?>
              <a href="inc/logout.php">Log out</a>
              <?php


              }
              ?>

          </div>

    </nav>
    <!-- <div class="icons">
       <div id="menu-btn" class="fas fa-bars"></div>
       <div id="user-btn" class="fas fa-user"></div>
    </div> -->

    <div class="profile">

       <a href="profile.php" class="btn">update profile</a>
       <div class="flex-btn">
          <a href="login.php" class="option-btn">register/login</a>
       </div>
       <a href="../logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a>


     </div>


    <script src="script_inc.js"></script>


  </section>
</header>
