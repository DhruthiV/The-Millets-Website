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
    <div class="header-brandname-div">
        <a class="header-brandname" href="home.php"> <h1>SF</h1></a>
    </div>
    <div class="header-nav">
        <nav class="header-nav-links navbar">
            <a class="header-a" href="shop.php">Shop</a>
            <a class="header-a" href="about.php">The Brand</a>
            <a class="header-a" href="contact.php">Write to us</a>
            
        </nav>
    </div>
    <div class="header-user-nav icons">

        <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>


        <div class="header-user-links">
            <nav class="navbar">
                <a class="header-a" href="search_page.php">
                    <i class="fa-solid fa-magnifying-glass">
                    </i>
                </a>
                
                <a class="header-a" href="#wishlist">
                    <i class="fa-solid fa-heart"></i>
                    <span class="header-span"><?= $total_wishlist_counts; ?></span>
                </a>
                <a class="header-a" href="#cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="header-span"><?= $total_cart_counts; ?></span>
                </a>

                <a class="header-a" href="#user">
                    <i class="fa-solid fa-user"></i>
                </a>
    
            </nav>
        </div>
            <div class="header-userprofile">
                <?php          
                $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                $select_profile->execute([$user_id]);
                if($select_profile->rowCount() > 0){
                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);?>

                <p>Hi <?= $fetch_profile["name"]; ?>
                </p>
                <a class="header-a-userprofilemenu" href="update_user.php" >Update your Profile</a>
                
                <a class="header-a-userprofilemenu"
                 href="components/user_logout.php" onclick="return confirm('logout from the website?');">Log Out</a> 
                <?php
                    }else{
                ?>
                
                <div class="active">
                <p>Did you Sign Up with Us?</p>
                <a class="header-a-userprofilemenu" href="user_register.php">Sign Up</a>
                <p>Already have an Account?</p>
                <a class="header-a-userprofilemenu" href="user_login.php" >Sign In</a>

                </div>
                
                <?php
                    }
                ?>      
                
            </div>
       

    </div>
   
</header>
