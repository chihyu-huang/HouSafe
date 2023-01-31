<?php
session_start();
include_once 'inc/header.php';

//include("inc/function.php");
include("inc/connection.php");


$email = $_SESSION['email'];

if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
}


if(!isset($_SESSION['email']))
{
  header('location: login.php');
  echo "You've been logged out.";
}

if(isset($_GET['logout'])){
   unset($email);
   session_destroy();
   header('location:login.php');
}

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>HouSafe™ - Online Renting Page</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
    <section class="quick-view">
      <form class="box">
        <div class="row">
          <div class="image-container">
            <div class="main-image">
              <?php
                 $select = mysqli_query($conn, "SELECT * FROM `signup` WHERE email = '$email'") or die('query failed');
                 if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                 }

                 if($fetch['userImage'] == ''){
                    echo '<img src="img/default-avatar.png" " width="250" height="250">';
                 }else{
                    echo '<img src="img/'.$fetch['userImage'].'" width="250" height="250"">';
                 }
              ?>
              <br><h1 class="heading">Hello, <?php echo $fetch['username']; ?></h1>
            </div>
          </div>

          <div class="content">
            <a href="profile.php"><div class="btn ">update profile</div></a><br>
            <a href="password.php"><div class="btn ">change password</div></a><br>

            <?php
              if($fetch['status'] != ''){
             ?>

             <a href="room.php"><div class="btn ">manage rooms</div></a>

            <?php
              }else{
            ?>
                <a href="profile.php"><div class="btn ">Upload your ID card or passport to start listing house for rent.</div></a>
            <?php
              }
             ?>
          </div>
        </div>
      </form>
    </section>
  </body>
</html>

<?php
include_once 'inc/footer.php';
?>
