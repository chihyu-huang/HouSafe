<?php
  session_start();
  include_once 'inc/header.php';
  //include("inc/function.php");
  include("inc/connection.php");

  if (isset($_GET['Message'])) {
      print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
  }



  if(isset($_POST['signup'])){

    $email = $_POST['email'];

    $query = "SELECT * from signup where email = '$email'";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);


    if ($num > 0) {
      echo '<script>alert("Email has been registered, please log in or use another email.")</script>';
    }else{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $username = $_POST['username'];
      if($password != $confirm_password){
        echo '<script>alert("Passwords do not match!")</script>';
      }else {
      $query = "INSERT INTO signup(email, username, password)
                      values('$email','$username', '$password')";
      $data_check = mysqli_query($conn, $query) or die('query failed');
      $status = "";
      $_SESSION['status'] = $status;
      $Message = 'Registered Successfully';
      header("Location: login.php?Message=" . urlencode($Message));
      }
    }
  }

 ?>



 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="UTF-8">
     <title>HouSafe™ - Online Renting Page</title>
     <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
     <link rel="stylesheet" href="style.css">
   </head>
   <body>
     <section class="contact">
       <div class="update-profile">
         <form method="post">
         <h2>Time to feel like home,</h2>

         <div class="flex">
           <div class="inputBox">
             <label>
               <span>Email</span>
               <input type="email" placeholder="XXX@example.com"
                       name="email" size="50" required>
             </label>

             <label>
               <span>User Name</span>
               <input type="text" placeholder="housafe"
                       name="username" size="20" required>
             </label>

             <label>
               <span>Password</span>
               <input type="password" placeholder="******"
                       title="Password must contain 6 characters or more,
                             with at least 1 upper case, 1 lower case and 1 number."

                       id="password" name = "password"
                       size="20" required>
                       <!-- pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$" -->
             </label>
             <label>
               <span>Confirm Password</span>
               <input type="password" placeholder="******"
                       title="Confirm Password"
                       placeholder="Confirm Password"
                       id="confirm_password" name = "confirm_password"
                       size="20" required>
             </label>
           </div>
         </div>

         <button type="submit" class="submit" name="signup">Sign Up</button>
         <h4>Already have an account? <a href="login.php">Log In Here</a></h4>
       </form>
      </div>
     </section>
   </body>
 </html>

 <?php
 include_once 'inc/footer.php';
  ?>
