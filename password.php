<?php

session_start();
include_once 'inc/header.php';

//include("inc/function.php");
include("inc/connection.php");
ini_set('display_errors', 1);


$email = $_SESSION['email'];


if(isset($_POST['saveP'])){
  $old_pass =mysqli_real_escape_string($conn, $_POST['old_pass']);
//$_POST['old_pass']; md5()
  $update_pass = mysqli_real_escape_string($conn, $_POST['update_pass']);
  $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
  $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);

  if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
     if($update_pass != $old_pass){
       echo '<script>alert("old password not matched!")</script>';
     }elseif($new_pass != $confirm_pass){
        echo '<script>alert("confirm password not matched!")</script>';
     }else{
        mysqli_query($conn, "UPDATE `signup` SET password = '$confirm_pass' WHERE email = '$email'") or die('query failed');
        $Message = 'Update Successfully';
        header("Location: home.php?Message=" . urlencode($Message));

     }
  }
}


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>HouSafe™</title>
     <link rel="stylesheet" href="style.css">
   </head>
   <body>
     <section class="contact">
     <div class="update-profile">
       <form action="" method="post" enctype="multipart/form-data">
         <?php
            $select = mysqli_query($conn, "SELECT * FROM `signup` WHERE email = '$email'") or die('query failed');
            if(mysqli_num_rows($select) > 0){
               $fetch = mysqli_fetch_assoc($select);
            }
         ?>
         <br><h1 class="heading">Hello, <?php echo $fetch['username']; ?>! <br></h1>
         <h1>Would like to change your password?</h1>

         <div class="flex">
           <div class="inputBox">
              <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
              <label>
                <span>old password :</span>
                <input type="password" name="update_pass" placeholder="enter previous password" class="box" required>
              </label>
              <label>
                <span>new password :</span>
                <input type="password" name="new_pass" placeholder="enter new password" class="box" required>
              </label>
              <label>
                <span>confirm password :</span>
                <input type="password" name="confirm_pass" placeholder="confirm new password" class="box" required>
              </label>
           </div>
          </div>
          <div class="flex-btn">
            <button type="submit" class="submit" name="saveP">Save Password</button>
            <button type="button" class="submit" onclick=location.href="javascript:history.go(-1)" >cancel</button>
          </div>
        </form>
      </div>
    </section>
   </body>
 </html>

 <?php
 include_once 'inc/footer.php';
 ?>
