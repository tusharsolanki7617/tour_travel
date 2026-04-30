<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="shortcut icon" type="x-icon" href="uploaded_img/TravelTrek.png">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TravelTrek</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>



 <!----------- slider ------------->

 <div class="slider001">
        <!-- list Items -->
        <div class="list">
            <div class="item active">
                <img src="images/img1.jpg">
                <div class="content">
                    <p>design</p>
                    <h2>Bali</h2>
                    <p>
                    Bali can be a budget-friendly destination, especially when compared to other popular tourist spots, but the cost of your trip depends on your travel style and preferences, with options ranging from budget-friendly to luxurious.
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="images/img2.jpg">
                <div class="content">
                    <p>design</p>
                    <h2>Lombardy</h2>
                    <p>
                    Lombardy is a region in Northern Italy. Its capital, Milan, is a global hub of fashion and finance, with many high-end shops and restaurants. 
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="images/img3.jpg">
                <div class="content">
                    <p>design</p>
                    <h2>Ionian'Islands</h2>
                    <p>
                    The Ionian Islands are part of Greece and lie off the country's west coast, in the Ionian Sea. The northernmost island, Corfu, has an old town with Renaissance, baroque and classical architecture. 
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="images/img4.jpg">
                <div class="content">
                    <p>design</p>
                    <h2>Black'Forest</h2>
                    <p>
                    The Black Forest is a mountainous region in southwest Germany, bordering France. Known for its dense, evergreen forests and picturesque villages, it is often associated with the Brothers Grimm fairy tales. It's renowned for its spas and the cuckoo clocks produced in the region since the 1700s.
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="images/img5.jpg">
                <div class="content">
                    <p>design</p>
                    <h2>Rangiroa</h2>
                    <p>
                    Rangiroa or Te Kokōta is the largest atoll in the Tuamotus and one of the largest in the world. It is in French Polynesia and is part of the Palliser group. 
                    </p>
                </div>
            </div>
        </div>
        <!-- button arrows -->
        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <!-- thumbnail -->
        <div class="thumbnail">
            <div class="item active">
                <img src="images/img1.jpg">
                <div class="content">
                    Bali
                </div>
            </div>
            <div class="item">
                <img src="images/img2.jpg">
                <div class="content">
                  Lombardy
                </div>
            </div>
            <div class="item">
                <img src="images/img3.jpg">
                <div class="content">
                  Ionian'Islands
                </div>
            </div>
            <div class="item">
                <img src="images/img4.jpg">
                <div class="content">
                    Black'Forest
                </div>
            </div>
            <div class="item">
                <img src="images/img5.jpg">
                <div class="content">
                   Rangiroa
                </div>
            </div>
        </div>
    </div>

<!------- slider end ------->


<!-- 
<section class="category">

   <h1 class="heading">Shop by Category</h1>

   <div class="swiper category-slider">

   <div class="swiper-wrapper">

   <a href="category.php?category=laptop" class="swiper-slide slide">
      <img src="images/icon-1.png" alt="">
      <h3>Laptop</h3>
   </a>

   <a href="category.php?category=tv" class="swiper-slide slide">
      <img src="images/icon-2.png" alt="">
      <h3>Television</h3>
   </a>

   <a href="category.php?category=camera" class="swiper-slide slide">
      <img src="images/icon-3.png" alt="">
      <h3>Camera</h3>
   </a>

   <a href="category.php?category=mouse" class="swiper-slide slide">
      <img src="images/icon-4.png" alt="">
      <h3>Mouse</h3>
   </a>

   <a href="category.php?category=fridge" class="swiper-slide slide">
      <img src="images/icon-5.png" alt="">
      <h3>Fridge</h3>
   </a>

   <a href="category.php?category=washing" class="swiper-slide slide">
      <img src="images/icon-6.png" alt="">
      <h3>Washing machine</h3>
   </a>

   <a href="category.php?category=smartphone" class="swiper-slide slide">
      <img src="images/icon-7.png" alt="">
      <h3>Smartphone</h3>
   </a>

   <a href="category.php?category=watch" class="swiper-slide slide">
      <img src="images/icon-8.png" alt="">
      <h3>Watch</h3>
   </a>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section> -->

<!----- card start ----->
<!-- <section class="home-products">

   <h1 class="heading">Latest products</h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span>Nrs.</span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section> -->
<!------- card end ------>

<!---- demo card strat ------>

    <section class="section__container popular__container">
        <h2 class="section__header">Popular Hotels</h2>
        <div class="popular__grid">

          <div class="popular__card">
            <img src="assets/hotel-1.jpg" alt="popular hotel" />
            <div class="popular__content">
              <div class="popular__card__header">
                <h4>The Plaza Hotel</h4>
                <h4>$499</h4>
              </div>
              <p>New York City, USA</p>
            </div>
          </div>

          <div class="popular__card">
            <img src="assets/hotel-2.jpg" alt="popular hotel" />
            <div class="popular__content">
              <div class="popular__card__header">
                <h4>Ritz Paris</h4>
                <h4>$549</h4>
              </div>
              <p>Paris, France</p>
            </div>
          </div>

          <div class="popular__card">
            <img src="assets/hotel-3.jpg" alt="popular hotel" />
            <div class="popular__content">
              <div class="popular__card__header">
                <h4>The Peninsula</h4>
                <h4>$599</h4>
              </div>
              <p>Hong Kong</p>
            </div>
          </div>
          <div class="popular__card">
            <img src="assets/hotel-4.jpg" alt="popular hotel" />
            <div class="popular__content">
              <div class="popular__card__header">
                <h4>Atlantis The Palm</h4>
                <h4>$449</h4>
              </div>
              <p>Dubai, United Arab Emirates</p>
            </div>
          </div>
          <div class="popular__card">
            <img src="assets/hotel-5.jpg" alt="popular hotel" />
            <div class="popular__content">
              <div class="popular__card__header">
                <h4>The Ritz-Carlton</h4>
                <h4>$649</h4>
              </div>
              <p>Tokyo, Japan</p>
            </div>
          </div>
          <div class="popular__card">
            <img src="assets/hotel-6.jpg" alt="popular hotel" />
            <div class="popular__content">
              <div class="popular__card__header">
                <h4>Marina Bay Sands</h4>
                <h4>$549</h4>
              </div>
              <p>Singapore</p>
            </div>
          </div>
        </div>
      </section>

<!--------- demo card end ------->


<!--- 2 slider start ---->
<!-- 
<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/home-img-1.png" alt="">
         </div>
         <div class="content">
            <span>Upto 50% Off</span>
            <h3>Latest Smartphones</h3>
            <a href="category.php?category=smartphone" class="btn">Shop Now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/home-img-2.png" alt="">
         </div>
         <div class="content">
            <span>Upto 50% off</span>
            <h3>Latest Watches</h3>
            <a href="category.php?category=watch" class="btn">Shop Now.</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/home-img-3.png" alt="">
         </div>
         <div class="content">
            <span>upto 50% off</span>
            <h3>Latest headsets</h3>
            <a href="shop.php" class="btn">Shop Now.</a>
         </div>
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div> -->

<!---- 2 slider end ----->


<!-- 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
      .slider{
    width: 1300px;
    max-width: 100vw;
    height: 700px;
    margin: auto;
    position: relative;
    overflow: hidden;
}
.slider .list{
    position: absolute;
    width: max-content;
    height: 100%;
    left: 0;
    top: 0;
    display: flex;
    transition: 1s;
}
.slider .list img{
    width: 1300px;
    max-width: 100vw;
    height: 100%;
    object-fit: cover;
}
.slider .buttons{
    position: absolute;
    top: 45%;
    left: 5%;
    width: 90%;
    display: flex;
    justify-content: space-between;
}
.slider .buttons button{
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #fff5;
    color: #fff;
    border: none;
    font-family: monospace;
    font-weight: bold;
}
.slider .dots{
    position: absolute;
    bottom: 10px;
    left: 0;
    color: #fff;
    width: 100%;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
}
.slider .dots li{
    list-style: none;
    width: 10px;
    height: 10px;
    background-color: #fff;
    margin: 10px;
    border-radius: 20px;
    transition: 0.5s;
}
.slider .dots li.active{
    width: 30px;
}
@media screen and (max-width: 768px){
    .slider{
        height: 400px;
    }
}
      </style>
</head>
<body>
    
    <div class="slider">
        <div class="list">
            <div class="item">
                <img src="https://cdn.pixabay.com/photo/2024/03/04/14/56/pagoda-8612554_1280.jpg" alt="">
            </div>
            <div class="item">
                <img src="https://cdn.pixabay.com/photo/2024/03/04/14/56/pagoda-8612554_1280.jpg" alt="">
            </div>
            <div class="item">
                <img src="https://cdn.pixabay.com/photo/2024/03/04/14/56/pagoda-8612554_1280.jpg" alt="">
            </div>
            <div class="item">
                <img src="https://cdn.pixabay.com/photo/2024/03/04/14/56/pagoda-8612554_1280.jpg" alt="">
            </div>
            <div class="item">
                <img src="https://cdn.pixabay.com/photo/2024/03/04/14/56/pagoda-8612554_1280.jpg" alt="">
            </div>
        </div>
        <div class="buttons">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <ul class="dots">
            <li class="active"></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>

    <script>let slider = document.querySelector('.slider .list');
let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let dots = document.querySelectorAll('.slider .dots li');

let lengthItems = items.length - 1;
let active = 0;
next.onclick = function(){
    active = active + 1 <= lengthItems ? active + 1 : 0;
    reloadSlider();
}
prev.onclick = function(){
    active = active - 1 >= 0 ? active - 1 : lengthItems;
    reloadSlider();
}
let refreshInterval = setInterval(()=> {next.click()}, 3000);
function reloadSlider(){
    slider.style.left = -items[active].offsetLeft + 'px';
    // 
    let last_active_dot = document.querySelector('.slider .dots li.active');
    last_active_dot.classList.remove('active');
    dots[active].classList.add('active');

    clearInterval(refreshInterval);
    refreshInterval = setInterval(()=> {next.click()}, 3000);

    
}

dots.forEach((li, key) => {
    li.addEventListener('click', ()=>{
         active = key;
         reloadSlider();
    })
})
window.onresize = function(event) {
    reloadSlider();
};</script>
</body>
</html> -->








<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>