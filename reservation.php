<?php

session_start();
ini_set('display_errors', 1);

include_once 'inc/header.php';
//include("inc/function.php");
include("inc/connection.php");

//echo $_SESSION['id'];
$room_id = $_SESSION['id'];

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

$email = $_SESSION['email'];

if(isset($_POST['send'])){
  $b_name =  mysqli_real_escape_string($conn, $_POST['b_name']);
  $arrival =  mysqli_real_escape_string($conn, $_POST['arrival']);
  $departure =  mysqli_real_escape_string($conn, $_POST['departure']);
  $b_email = $_POST['b_email'];
  //$total_price =  mysqli_real_escape_string($conn, $_POST['total_price']);


  $query = "INSERT INTO reservation(b_name, arrival, departure, email) values ('$b_name', '$arrival', '$departure', '$b_email')";
  mysqli_query($conn, $query) or die('query failed');

  $Message = 'Book Successfully';
  header("Location: profile.php?Message=" . urlencode($Message));

}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Book - HouSafe™</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <script src="script.js">    </script>

  </head>
  <body>
    <section class="quick-view">
      <h1 class="heading">Booking</h1>

      <?php
         $selected = mysqli_query($conn, "SELECT * FROM `room` where id = '$room_id' ");
         if(mysqli_num_rows($selected) > 0){
           $row = mysqli_fetch_assoc($selected);
         }
      ?>

      <form action="" method="post" class="box">
        <br><br>
        <div class="row">
          <div class="image-container">
            <div class="main-image">
              <img  src="img/<?php echo $row['photo']; ?>" height="100" alt="">
              <h1><?php echo $row['name']; ?> in <?php echo $row['location']; ?></h1>
            </div>
          </div>

          <div class="content">
            <h2>Fill in your details</h2> <br><br><br><br>
            <h4>Full Name: </h4>
            <input type="text" name="b_name" maxlength="20" class="box" required>
            <h4>Arrival Date:</h4>
            <input type="date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any"
                     data-link-format="yyyy-mm-dd" name="arrival" id="date_pickerfrom"
                       class="date_pickerfrom input-sm form-control">
           <h4>Departure Date:</h4>
           <input type="date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any"
                    data-link-format="yyyy-mm-dd" name="departure" id="date_pickerfrom"
                      class="date_pickerfrom input-sm form-control">
           <input type="hidden" name="b_email" maxlength="100" class="box" value=<?php echo $email ?> required>

           <input type="submit" value="Checkout" name="send" class="btn">
          </div>
        </div>
      </form>
    </section>
  </body>
</html>

<?php
  include_once 'inc/footer.php';
?>
