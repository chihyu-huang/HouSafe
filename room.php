<?php
session_start();
include_once 'inc/header.php';
//include("inc/function.php");
include("inc/connection.php");

ini_set('display_errors', 1);



$email = $_SESSION['email'];

if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
}



// to delete items
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `room` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:room.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:room.php');
      $message[] = 'product could not be deleted';
   };
};



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="style.css">

  </head>
  <body>
    <h1 class="heading">Manage rooms</h1>

    <section class="products">
      <div class="box-container">
      <form class="" method="post">
          <a href="roomAdd.php" >
            <div class="delete-btn">add a room </div>
          </a>
          <a href="home.php">
              <div class="btn ">go back to profile</div>
          </a>
        </div>
      </form>
      <br><br><br>

      <div class="box-container">
        <?php
           $selected = mysqli_query($conn, "SELECT * FROM `room` where email = '$email'");
           if(mysqli_num_rows($selected) > 0){
             $row = mysqli_fetch_assoc($selected);
              while($row = mysqli_fetch_assoc($selected)){
        ?>

        <form class="box" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
          <img src="img/<?php echo $row['photo']; ?>" height="100" alt="">
          <div class="name"><?php echo $row['name']?> in <?php echo $row['location']; ?></div>
          <div class="price"><span>€</span><?php echo $row['price']; ?><span>/per week</span></div>
          <div class="flex-btn">
            <a href="room.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
            <a href="roomUpdate.php?id=<?php echo $row['id']; ?>" name="id" class="option-btn"> <i class="fas fa-edit"></i> update </a>
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
    <script src="js/script.js"></script>
  </body>
</html>

<?php
include_once 'inc/footer.php';
//echo $id;
?>
