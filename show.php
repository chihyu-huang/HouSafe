<?php

session_start();
ini_set('display_errors', 1);

include_once 'inc/header.php';
include("inc/connection.php");


 ?>

 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quick view</title>

    <link rel="stylesheet" type="text/css" href='<%= ResolveUrl("~/css/style.css") %>' />
    <script type="text/javascript" src="<%= ResolveUrl("~/js/jquery-1.3.2.min.js") %>"></script>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

 </head>
 <body>


 <section class="quick-view">
   <h1 class="heading">quick view</h1>
   <?php
      $id = $_GET['id'];
      $email = $_SESSION['email'];
      $_SESSION['id'] = $id;

      //send input data to db named reservation
      if(isset($_POST['send'])){
        $b_name =  mysqli_real_escape_string($conn, $_POST['b_name']);
        $arrival =  mysqli_real_escape_string($conn, $_POST['arrival']);
        $departure =  mysqli_real_escape_string($conn, $_POST['departure']);
        $total_price =  mysqli_real_escape_string($conn, $_POST['total_price']);

        $query = "INSERT INTO reservation(b_name, arrival, departure, total_price) values ('$b_name', '$arrival', '$departure', '$total_price')";
        mysqli_query($conn, $query) or die('query failed');
      }

      $selected = mysqli_query($conn, "SELECT * FROM `room` WHERE id = '$id'");
      if(mysqli_num_rows($selected) > 0){
         while($row = mysqli_fetch_assoc($selected)){
    ?>
    <form action="" method="post" class="box">
       <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
       <input type="hidden" name="name" value="<?= $row['name']; ?>">
       <input type="hidden" name="price" value="<?= $row['price']; ?>">
       <input type="hidden" name="location" value="<?= $row['location']; ?>">
       <input type="hidden" name="photo" value="<?= $row['photo']; ?>">
       <div class="row">
          <div class="image-container">
             <div class="main-image">
                   <img src="img/<?= $row['photo']; ?>" alt="">
             </div>
             <div class="sub-image">
                <img src="img/<?= $row['photo']; ?>" alt="">
             </div>
          </div>
          <div class="content">
             <div class="name"><?= $row['name']; ?> in <?= $row['location']; ?></div>
             <div class="flex">
                <div class="price"><span>€</span><?= $row['price']; ?><span>/per week</span></div>
             </div >
             <br>
               <a href="detail.php?owner_id=<?php echo $row['owner_id']; ?>">
                   <div class="btn ">Click to know more about <?= $row['owner']; ?></div>
               </a>
               <a href="reservation.php?id=<?php echo $row['id']; ?>">
                  <div class="option-btn">Make a reservation</div>
               </a>
          </div>
       </div>
    </form>
    <?php
        }
       }else{
       echo '<p class="empty">no products added yet!</p>';
    }
    ?>
    <button type="button" class="submit" onclick=location.href="javascript:history.go(-1)" >previous page</button>
  </section>

  <script src="script.js"> </script>

  </body>
 </html>

 <?php
  include_once 'inc/footer.php';
 ?>
