<?php

session_start();
include_once 'inc/header.php';
include("inc/connection.php");

//ini_set('display_errors', 1);



 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Host detail - HouSafe™</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  </head>
  <body>
    <?php
    $id = $_GET['owner_id'];
    $select = mysqli_query($conn, "SELECT * FROM `signup` WHERE id = '$id'")or die('query failed');
    if(mysqli_num_rows($select) > 0){
      $fetch = mysqli_fetch_assoc($select);

    };

    ?>
    <button type="button" class="submit" onclick=location.href="javascript:history.go(-1)" >previous page</button>

<section class="quick-view">
  <h1 class="heading">Landlord Details</h1>

      <form class="box">
        <div class="row">
          <div class="image-container">
            <div class="main-image">
              <?php
                echo '<img src="img/'.$fetch['userImage'].'" width="500" height="500" radius="10px"">';
              ?>
            </div>
          </div>

          <div class="content">

            <div class="name"> Name: <?= $fetch['username']; ?></div>
            <div class="name"> Email: <?= $fetch['email']; ?></div>
            <div class="name"> Bio: <?= $fetch['bio']; ?></div>
            <a href="message.php">
                <div class="btn ">Message <?= $fetch['username']; ?></div>
            </a>
          </div>
        </div>
      </form>

</section>

<section class="products">

   <h1 class="heading">more from this landlord</h1>


     <div class="box-container">

      <?php
         $selected = mysqli_query($conn, "SELECT * FROM `room` where owner_id = '$id'");
         if(mysqli_num_rows($selected) > 0){
            while($row = mysqli_fetch_assoc($selected)){

      ?>

      <form action="" method="post" class="box">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
        <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
        <input type="hidden" name="location" value="<?php echo $row['location']; ?>">
        <input type="hidden" name="photo" value="<?php echo $row['photo']; ?>">


        <a href="show.php?id=<?php echo $row['id']; ?>">
          <img  src="img/<?php echo $row['photo']; ?>" height="100" alt="">
        </a>


        <div class="name"><?php echo $row['name']; ?></div>
        <div class="location"><?php echo $row['location']; ?></div>
        <div class="flex">
          <div class="price"><span>€</span><?php echo $row['price']; ?><span>/per week</span></div>
        </div>
      </form>

    <?php
       };
       }else{
          echo "<div class='empty'>no product added</div>";
       };
    ?>

  </div>


</section>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>


  </body>
</html>

<?php
include_once 'inc/footer.php';
?>
