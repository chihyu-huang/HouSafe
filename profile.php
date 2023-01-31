 <?php
 session_start();
 include_once 'inc/header.php';
 //include("inc/function.php");
 include("inc/connection.php");

 ini_set('display_errors', 1);


$email = $_SESSION['email'];
$status = '';



if(isset($_POST['update'])){

  $username =  mysqli_real_escape_string($conn, $_POST['username']);
  //$userImage = mysqli_real_escape_string($conn, $_POST['userImage']); userImage = '$userImage',
  $bio = mysqli_real_escape_string($conn, $_POST['bio']);

  $query = "UPDATE `signup` SET username = '$username', bio = '$bio' WHERE email = '$email' ";

  mysqli_query($conn, $query) or die('query failed');
  $Message = 'Update Successfully';
  header("Location: home.php?Message=" . urlencode($Message));

}

if (isset($_FILES['userImage']['name'])) {
  $userImage = $_FILES['userImage']['name'];
  $userImage_size = $_FILES['userImage']['size'];
  $userImage_tmp_name = $_FILES['userImage']['tmp_name'];
  $userImage_folder = 'img/'.$userImage;

  $id_pic = $_FILES['id_pic']['name'];
  $id_pic_size = $_FILES['id_pic']['size'];
  $id_pic_tmp_name = $_FILES['id_pic']['tmp_name'];
  $id_pic_folder = 'img/'.$id_pic;

  if(!empty($userImage)){
     if($userImage_size > 2000000){
        $message[] = 'image is too large';
     }else{
        mysqli_query($conn, "UPDATE `signup` SET userImage = '$userImage' WHERE email = '$email'") or die('query failed');
        // if($image_update_query){
        //    move_uploaded_file($userImage_tmp_name, $userImage_folder);
        // }
        // $message[] = 'image updated succssfully!';
     }
  }
  if(!empty($id_pic)){
     if($id_pic_size > 2000000){
        $message[] = 'image is too large';
     }else{
        $status = 'ok';
        mysqli_query($conn, "UPDATE `signup` SET id_pic = '$id_pic', status = '$status' WHERE email = '$email'") or die('query failed');
     }
  }
}
$_SESSION['status'] = $status;

echo $_SESSION['status'];


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile - HouSafe™</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>

    <section class="quick-view">
      <h1 class="heading">Update Profile</h1>
      <form class="box" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="image-container">
          <div class="main-image">
            <?php
               $select = mysqli_query($conn, "SELECT * FROM `signup` WHERE email = '$email'") or die('query failed');
               if(mysqli_num_rows($select) > 0){
                  $fetch = mysqli_fetch_assoc($select);
               }
            ?>

            <?php
               if($fetch['userImage'] == ''){
                  echo '<img src="img/default-avatar.png"" width="250" height="250">';
               }else{
                  echo '<img src="img/'.$fetch['userImage'].'" width="250" height="250"">';
               }
            ?>
            </div>
          </div>

          <div class="content">
            <br>
            <label>
              <span>upload your user picture:</span>
              <input class="box" type="file" name="userImage" accept="image/jpg, image/jpeg, image/png" value="<?php echo $fetch['username']; ?>" >
            </label>

            <label>
              <span>User Name</span>
              <input class="box" type="text" name="username" value="<?php echo $fetch['username']; ?>" required>
            </label>

            <label>
              <span>Email</span>
              <input class="box" type="email" name="email" value="<?php echo $_SESSION['email']; ?>" required>
            </label>

            <label>
              <span>Bio</span>
              <br>
              <textarea name="bio" rows="4" cols="50" maxlength="500" class="box"><?php echo $fetch['bio']; ?></textarea>
            </label>

            <label>
              <span>upload your ID card/passport:</span>
              <br>After you upload your ID card or passport, you can start list a room for rent.
              <input class="box" type="file" name="id_pic" accept="image/jpg, image/jpeg, image/png" >
            </label>

          <div class="flex-btn">
            <button type="submit" class="submit" name="update">Save Profile</button>
            <button type="button" class="submit" onclick=location.href="javascript:history.go(-1)" >cancel</button>
          </div>
          </div>
        </div>
        </form>

      </div>
    </section>
  </body>
</html>



<?php
include_once 'inc/footer.php';
?>
