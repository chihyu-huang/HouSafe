<?php
session_start();
include_once 'inc/header.php';

//include("inc/function.php");
include("inc/connection.php");

ini_set('display_errors', 1);


//header("refresh: 3");

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  </head>
  <body>
    <img src=".\img\a.jpg" alt="living room">
    <section class="products">
      <h1 class="heading">latest rooms</h1>
      <div class="box-container">
      <?php
         $selected = mysqli_query($conn, "SELECT * FROM `room`");
         if(mysqli_num_rows($selected) > 0){
           $row = mysqli_fetch_assoc($selected);
            while($row = mysqli_fetch_assoc($selected)){
      ?>
      <form action="" method="post" class="box">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
        <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
        <input type="hidden" name="location" value="<?php echo $row['location']; ?>">
        <input type="hidden" name="photo" value="<?php echo $row['photo']; ?>">
        <?php
          if (isset($_SESSION['email'])) {
        ?>
          <a href="show.php?id=<?php echo $row['id']; ?>">
            <img  src="img/<?php echo $row['photo']; ?>" height="100" alt="">
          </a>
        <?php
          }else {
        ?>
          <a href="login.php">
            <img  src="img/<?php echo $row['photo']; ?>" height="100" alt="">
          </a>
        <?php
          }
        ?>

         <div class="name"><?php echo $row['name']?> in <?php echo $row['location']; ?></div>
         <div class="flex">
            <div class="price"><span>€</span><?php echo $row['price']; ?><span>/per week</span></div>
         </div>
      </form>
      <?php
          };
         }else{
            echo "<div class='empty'>no product found</div>";
         };
      ?>
      </div>
    </section>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>

<?php
  include_once 'inc/footer.php';
?>
