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




<!-- curser start -->
<head>
<style>
        *, *::before, *::after {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

.link {
  text-decoration: none;
  color: #f7f7f7;
}

.cursor {
  position: absolute;
  height: 25px;
  width: 25px;
  border-radius: 50%;
  transform: translate(-50%, -50%);
  pointer-events: none;
}

.outer {
  border: 1px solid #f7f7f770;
}

.inner {
  background: #f7f7f720;
  transition: 250ms ease-out;
}

.cursor.hover {
  transform: translate(-50%, -50%) scale(4);
  transition: transform 250ms ease-in-out;
}

.inner.hover {
  background: #f7f7f7;
  mix-blend-mode: difference;
}

    </style>
</head>
<body>
<div class="cursor outer"></div>
<div class="cursor inner"></div>
<script>
    const cursor = document.querySelectorAll(".cursor");
const links = document.querySelectorAll(".link");

window.addEventListener("mousemove", (e) => {
  
  let x = e.pageX;
  let y = e.pageY;
  
  cursor.forEach(el => {
    el.style.left = `${x}px`;
    el.style.top = `${y}px`;
    
    links.forEach(link => {
      link.addEventListener("mouseenter", () => {
        el.classList.add("hover");
      })
      link.addEventListener("mouseleave", () => {
        el.classList.remove("hover");
      })
    })
    
  })
  
})
</script>

<div class="loader"></div>

</body>

<!-- curser end ---->



<header class="header">

   <section class="flex">

      <a href="home.php" class="logo">TravelTrek<span><!---.Com ---></span></a>

      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="about.php">About Us</a>
         <a href="gallery.php">Gallery</a>
         <a href="orders.php">Orders</a>
         <a href="packages.php">Packages</a>
         <a href="contact.php">Contact Us</a>
      </nav>

      <div class="icons">
         <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
    
         <div id="menu-btn" class="fa-solid fa-reorder"></div>
         <a href="search_page.php"><i class="fas fa-search"></i><!--- Search ---></a>
         <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?= $total_wishlist_counts; ?>)</span></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_counts; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile["name"]; ?></p>
         <a href="update_user.php" class="btn">Update Profile.</a>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">Register.</a>
            <a href="user_login.php" class="option-btn">Login.</a>
         </div>
         <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
         <?php
            }else{
         ?>
         <p>Kindly log in or register to continue.</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">Register</a>
            <a href="user_login.php" class="option-btn">Login</a>
         </div>
         <?php
            }
         ?>      
         
         
      </div>

   </section>

</header>

       