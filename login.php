<?php
  session_start();
  include_once 'inc/header.php';
  include("inc/connection.php");


  //Log in
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {

    $email1 = $_POST['email1'];
    $password1 = $_POST['password1'];

    if(!empty($email1) && !empty($password1))
    {
      // read from database
      $query = "select * from signup where email = '$email1' limit 1";
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);

      if($result)
      {
        if($result && $num > 0)
        {
          $user_data = mysqli_fetch_assoc($result);

          if($user_data['password'] === $password1)
          {
            $_SESSION['email'] = $user_data['email'];
            header("Location: search.php");
            die();
          }
        }
      }echo '<script>alert("Wrong email address or password")</script>';
      header("Location: login.php");
    }
  }
 ?>


 <!DOCTYPE html>
 <html lang="en" >
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
     <h2>Welcome back, <br> we've missed you...</h2>

     <div class="flex">
       <div class="inputBox">
         <label>
           <span>Email</span>
           <input type="email" placeholder="XXX@example.com"
                   title="Please enter valid email address"
                   name="email1" size="50" required>
         </label>

         <label>
           <span>Password</span>
           <input type="password" placeholder="********"
                   title=
                   "Password must contain:
                   ∙ 6 characters or more
                   ∙ at least 1 upper case and 1 lower case
                   ∙ at least 1 number"

                   id="password1" name="password1" size="20" required>
                   <!-- pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$" -->
         </label>
        </div>
      </div>

      <button type="submit" class="submit">Log in</button>
      <h4>Haven't got an account? <a href="signup.php">Sign Up Here</a></h4>
     </form>
   </div>
  </section>
 </body>
 <script src="script.js"></script>

 </html>

<?php
include_once 'inc/footer.php';

 ?>
