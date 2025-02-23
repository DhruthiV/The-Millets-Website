<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">
    
    
    </div>
    <div class="header-nav">
        <nav class="navbar">
            <a class="header-a" href="shop.php">Shop</a>
            <a class="header-a" href="about.php">The Brand</a>
            <a class="header-a" href="contact.php">Write to us</a>
                
        </nav>
        <a class="header-brandname" href="home.php"> <h1>Siri Flavors</h1>
      <div class="flex">
      <div class="icons">
         <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="search_page.php"><i class="fas fa-search"></i></a>
         <a href="wishlist.php"><i class="fas fa-heart"></i><span><?= $total_wishlist_counts; ?></span></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span><?= $total_cart_counts; ?></span></a>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p style="font-size:3rem;">Hi! <?= $fetch_profile["name"]; ?></p>
         <!-- <a href="update_user.php" class="btn" style="visibility: hidden;">Update Your Profile</a> -->
         <div class="flex-btn">
             <a href="user_login.php" class="option-btn">Sign In | Sign Up</a>
         </div>
         <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">Sign Out</a> 
         <?php
            }else{
         ?>
        <div class="flex-btn">
         <div>
            <img src="images\sweet.jpg" alt="">
            <p style="font-size:2rem;">Greetings from Siri Flavors</p>
            <a  href="user_login.php" class="option-btn sign">Sign In | Sign Up</a>
            

        </div>
        </div>
         <?php
            }
         ?>      
         
         
      </div>

        </div>
        </div>
</header>