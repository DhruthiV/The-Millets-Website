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
      $message[] = 'incorrect username or password!';
   }

}

?>
<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email,]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $message[] = 'email already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $cpass]);
         $message[] = 'registered successfully, login now please!';
      }
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
    <?php include 'components/user_header.php'; ?>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="authenticate.php" method="post" autocomplete="off" class="sign-in-form">
              <div class="logo">
                <img src="./images/logo-only.png" alt="easyclass" />
                <h4>Siri Flavors</h4>
              </div>

              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registered yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input type="email" name="email"
                    minlength="4" class="input-field" autocomplete="off" required/>
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input type="password" name="pass" minlength="4" class="input-field" autocomplete="off"  required/>
                  <label>Password</label>
                </div>

                <input type="submit" value="Sign In" class="sign-btn activebtn" name="submit" />

                <p class="text">
                  Forgotten your password or you login details?
                  <a href="#">Get help</a> signing in
                </p>
              </div>
            </form>

            <form action="register.php" method="post" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <img src="./images/logo-only.png" alt="easyclass" />
                <h4>Siri Flavors</h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text" name="name" minlength="4" class="input-field" autocomplete="off" required/>
                  <label>Name</label>
                </div>

                <div class="input-wrap">
                  <input type="email" name="email" class="input-field" autocomplete="off" required/>
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input type="password" name="pass" minlength="4" class="input-field" autocomplete="off" required/>
                  <label>Password</label>
                </div>
                <div class="input-wrap">
                  <input type="password" name="cpass" minlength="4" class="input-field" autocomplete="off" required/>
                  <label>Confirm Password</label>
                </div>

                <input type="submit" value="Sign Up" class="sign-btn activebtn" name="submit" />

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

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
    
<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

    <!-- Javascript file -->
    <script src="js/account.js"></script>
  </body>
</html>

