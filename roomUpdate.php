<?php
session_start();
include_once 'inc/header.php';
include("inc/connection.php");

ini_set('display_errors', 1);

$id = $_GET['id'];
$email = $_SESSION['email'];

if(isset($_POST['update'])){
  $name =  mysqli_real_escape_string($conn, $_POST['name']);
  $location =  mysqli_real_escape_string($conn, $_POST['location']);
  $price =  mysqli_real_escape_string($conn, $_POST['price']);

  $query = "UPDATE `room` SET name = '$name', location = '$location', price = '$price' WHERE id = '$id' limit 1";

  mysqli_query($conn, $query) or die('query failed');
  $Message = 'Update Successfully';
  header("Location: room.php?Message=" . urlencode($Message));
}

if (isset($_FILES['photo']['name'])) {
  $photo = $_FILES['photo']['name'];
  $userImage_size = $_FILES['photo']['size'];
  $userImage_tmp_name = $_FILES['photo']['tmp_name'];
  $userImage_folder = 'img/'.$photo;

  if(!empty($photo)){
     if($userImage_size > 2000000){
        $message[] = 'image is too large';
     }else{
        $image_update_query = mysqli_query($conn, "UPDATE `room` SET photo = '$photo' WHERE id = '$id'") or die('query failed');
     }
  }
}

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
    <section class="quick-view">
      <h1 class="heading">Update Room Detail</h1>
      <form class="box" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="image-container">
            <div class="main-image">
              <?php
                 $select = mysqli_query($conn, "SELECT * FROM `room` WHERE id = '$id'") or die('query failed');
                 if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                 }
              ?>

              <?php
                 if($fetch['photo'] == ''){
                    echo '<img src="img/house.jpeg"" width="250" height="250">';
                 }else{
                    echo '<img src="img/'.$fetch['photo'].'" width="250" height="250"">';
                 }

                 if(isset($message)){
                    foreach($message as $message){
                       echo '<div class="message">'.$message.'</div>';
                    }
                 }
              ?>
            </div>
          </div>

          <div class="content">
            <br>
            <label>
              <span>upload pic:</span>
              <input class="box" type="file" name="photo" accept="image/jpg, image/jpeg, image/png">
            </label>


            <label>
              <span>Name</span>
              <input class="box" type="text" name="name" value="<?php echo $fetch['name']; ?>" required>
            </label>

            <label>
              <span>Location</span>
              <input class="box" type="text" name="location" value="<?php echo $fetch['location']; ?>" required>
            </label>

            <label>
              <span>Price</span>
              <input class="box" type="text" name="price" value="<?php echo $fetch['price']; ?>" required>
            </label>


            <div class="flex-btn">
              <button type="submit" class="submit" name="update" onclick="return confirm('Update succesfully!')";>Save update</button>
              <button type="button" class="submit" onclick="window.location.href='room.php';" >cancel</button>
            </div>
          </div>
        </div>
      </form>
    </section>
  </body>
</html>

<?php
include_once 'inc/footer.php';
?>
