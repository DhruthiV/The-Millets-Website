<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }else{
      echo'<script> alert("Incorrect username or password!");
      window.location.href="User_login.php"; </script>';
   }

}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Siri Flavours|Accounts</title>
    <link rel="stylesheet" href="css/account.css">
    
   
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="" method="post" autocomplete="off" class="sign-in-form">


              <div class="logo">
                <img src="./images/logo-only.png" alt="easyclass" />
                <h4>Siri Flavors</h4>
              </div>

              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registered yet?</h6>
                <a href="user_register.php" >Sign up</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input type="email" name="email"
                    minlength="4" class="input-field" autocomplete="off" required oninput="this.value = this.value.replace(/\s/g, '')"/>
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input type="password" name="pass" minlength="4" class="input-field" autocomplete="off"  required oninput="this.value = this.value.replace(/\s/g, '')"/>
                  <label>Password</label>
                </div>

                <input type="submit" value="Sign In" class="sign-btn activebtn" name="submit" />

                <p class="text">
                  Forgotten your password or you login details?
                  <a href="#">Get help</a> signing in
                </p>
              </div>
           </form>
           <div class="carousel">
            <div class="images-wrapper">
              <img src="./images/image1.jpg" class="image img-1 show" alt="" />
              <img src="./images/image2.jpg" class="image img-2" alt="" />
              <img src="./images/image3.jpg" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Make Instant Millet Recipes</h2>
                  <h2>Find your way to Better Living</h2>
                  <h2>Help Local Farmers</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          
           </div>
           </div>
           </div>

          
    </main>
    




    <!-- Javascript file -->
    <script src="js/account.js"></script>
  </body>
</html>

