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
    echo'<script> alert("email already exists!");
      window.location.href="User_login.php"; </script>';
      
   }else{
      if($pass != $cpass){
        echo'<script> alert("confirm password not matched!");
      window.location.href="User_login.php"; </script>';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $cpass]);
         echo'<script> alert("You have successfully Signed up with us, Sign in to continue!");
      window.location.href="User_login.php"; </script>';
      
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/account.css">

</head>
<body>


<main>
<div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            
          <form action="" method="post" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <img src="./images/logo-only.png" alt="easyclass" />
                <h4>Siri Flavors</h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="user_login.php" >Sign in</a>
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

<script src="js/account.js"></script>

</body>
</html>