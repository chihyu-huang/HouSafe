<?php
session_start();
include_once 'inc/header.php';
//include("inc/function.php");
include("inc/connection.php");

ini_set('display_errors', 1);


$email = $_SESSION['email'];

$select = mysqli_query($conn, "SELECT * from signup where email = '$email' ; ");

//to make username owner name
if(mysqli_num_rows($select) > 0){
   $row = mysqli_fetch_assoc($select);
   $owner = $row['username'];
   $id = $row['id'];
}else{
   $message[] = 'wrong!';
}

// to add items to page
if(isset($_POST['add']))
{

  $photo = mysqli_real_escape_string($conn, $_POST['photo']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $location = mysqli_real_escape_string($conn, $_POST['location']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);

  $query = "INSERT INTO room(photo, name, location, price, owner, email, owner_id)
            values ('$photo', '$name', '$location', '$price', '$owner', '$email', '$id');";
  mysqli_query($conn, $query) or die('query failed');

  $Message = 'Added Successfully';
  header("Location: room.php?Message=" . urlencode($Message));



};


 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>add</title>
     <link rel="stylesheet" href="style.css">

   </head>
   <body>

    <section class="contact">
      <h1 class="heading">Upload your house for rent</h1>

       <form class="" method="post">
         <div class="row">
           <div class="content">
             <?php
                if(mysqli_num_rows($select) > 0){
                   $fetch = mysqli_fetch_assoc($select);
                }
             ?>
             <label>
               <span>upload Photo</span>
               <input type="file" class="box" name="photo" accept="image/jpg, image/jpeg, image/png">
             </label>

             <label>
               <span>Name</span>
               <input type="text" class="box" name="name" required>
             </label>

             <label>
               <span>Location</span>
               <input type="text" class="box" name="location"required>
             </label>

             <label>
               <span>Price</span>
               <input type="text" class="box" name="price" required>
             </label>
             <label>
               <input type="hidden"  name="email" value=" <?php echo $email ; ?>" required>
               <input type="hidden" name="owner" value=" <?php echo $owner ; ?>" required>
               <input type="hidden" name="owner_id" value=" <?php echo $id ; ?>" required>

             </label>
             <div class="flex-btn">
               <button type="submit" class="submit" name="add" > add</button>
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
