<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>About Siri Flavors</h3>
         <p>           
                Siri Flavors is a pioneering millets company based in Bengaluru, founded in 2023 by Dhruthi Venkatesh, Chithrashree Nagaraj, and Chaithra Gangadhar. Our mission is to bring the rich tradition of millets to your doorstep. We source the finest millets from farmers across India and offer an extensive range of millet products, including raw millets, sweets, snacks, instant recipes, and celebration combos.
                <br>
                
                At Siri Flavors, we are passionate about the power of millets to nourish and sustain. These ancient grains are packed with essential nutrients and are an excellent source of fiber, protein, and vitamins. Our products are carefully crafted to showcase the unique flavors and textures of millets.
                <br>
                We are deeply committed to supporting local farmers and promoting sustainable agriculture. By choosing Siri Flavors, you are not only nourishing yourself and your loved ones but also making a positive impact on the livelihoods of farmers across India.
                <br>
                Join us on our journey to rediscover the goodness of millets. Thank you for choosing Siri Flavors. We hope our products bring joy and nourishment to your life.
               
                </p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>


  








<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>