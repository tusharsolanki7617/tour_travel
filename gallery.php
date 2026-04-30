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
   <title>Gallery</title>
   
   <!-- custom css file link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- normalize css -->
    <link rel = "stylesheet" href = "css/normalize.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "css/utility.css">
    <link rel = "stylesheet" href = "css/style.css">
    <link rel = "stylesheet" href = "css/stylee.css">
    <link rel = "stylesheet" href = "css/responsive.css">
    
 </head>  
 <body>
    <?php include 'components/user_header.php'; ?>


     <!-- gallery section -->
        <div id = "gallery" class = "py-4">
            <div class = "container">
                <div class = "gallery-row">
                    <div class = "gallery-item shadow">
                        <img src = "images/gallery-1.jpg" alt = "gallery img">
                        <span class = "zoom-icon">
                            <i class = "fas fa-search-plus"></i>
                        </span>
                    </div>
                    <div class = "gallery-item shadow">
                        <img src = "images/gallery-2.jpg" alt = "gallery img">
                        <span class = "zoom-icon">
                            <i class = "fas fa-search-plus"></i>
                        </span>
                    </div>
                    <div class = "gallery-item shadow">
                        <img src = "images/gallery-3.jpg" alt = "gallery img">
                        <span class = "zoom-icon">
                            <i class = "fas fa-search-plus"></i>
                        </span>
                    </div>
                    <div class = "gallery-item shadow">
                        <img src = "images/gallery-4.jpg" alt = "gallery img">
                        <span class = "zoom-icon">
                            <i class = "fas fa-search-plus"></i>
                        </span>
                    </div>
                    <div class = "gallery-item shadow">
                        <img src = "images/gallery-5.jpg" alt = "gallery img">
                        <span class = "zoom-icon">
                            <i class = "fas fa-search-plus"></i>
                        </span>
                    </div>
                    <div class = "gallery-item shadow">
                        <img src = "images/gallery-6.jpg" alt = "gallery img">
                        <span class = "zoom-icon">
                            <i class = "fas fa-search-plus"></i>
                        </span>
                    </div>
                    <div class = "gallery-item shadow">
                        <img src = "images/gallery-7.jpg" alt = "gallery img">
                        <span class = "zoom-icon">
                            <i class = "fas fa-search-plus"></i>
                        </span>
                    </div>
                    <div class = "gallery-item shadow">
                        <img src = "images/gallery-8.jpg" alt = "gallery img">
                        <span class = "zoom-icon">
                            <i class = "fas fa-search-plus"></i>
                        </span>
                    </div>
                    <div class = "gallery-item shadow">
                        <img src = "images/gallery-9.jpg" alt = "gallery img">
                        <span class = "zoom-icon">
                            <i class = "fas fa-search-plus"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of gallery section -->



        <!-- popular places section -->
        <section id = "popular" class = "py-4">
            <div class = "title-wrap">
                <span class = "sm-title">know about some coo destination</span>
                <h2 class = "lg-title">Popular Places</h2>
            </div>

            <div class = "popular-row">
                <div class = "popular-item shadow">
                    <img src = "images/popular-1.jpg" alt = "">
                    <div>
                        <span>Eiffel Tower, Paris</span>
                        <ul class = "rating flex">
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star-half-alt"></i></li>
                            <li>&nbsp;400 reviews</li>
                        </ul>
                        <p class = "text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, quia!</p>
                    </div>
                </div>

                <div class = "popular-item shadow">
                    <img src = "images/popular-2.jpg" alt = "">
                    <div>
                        <span>Machu Picchu, Peru</span>
                        <ul class = "rating flex">
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star-half-alt"></i></li>
                            <li>&nbsp;400 reviews</li>
                        </ul>
                        <p class = "text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, quia!</p>
                    </div>
                </div>

                <div class = "popular-item shadow">
                    <img src = "images/popular-3.jpg" alt = "">
                    <div>
                        <span>Acropolis, Athens</span>
                        <ul class = "rating flex">
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star-half-alt"></i></li>
                            <li>&nbsp;400 reviews</li>
                        </ul>
                        <p class = "text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, quia!</p>
                    </div>
                </div>

                <div class = "popular-item shadow">
                    <img src = "images/popular-4.jpg" alt = "">
                    <div>
                        <span>Bali, Indonesia</span>
                        <ul class = "rating flex">
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star-half-alt"></i></li>
                            <li>&nbsp;400 reviews</li>
                        </ul>
                        <p class = "text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, quia!</p>
                    </div>
                </div>

                <div class = "popular-item shadow">
                    <img src = "images/popular-5.jpg" alt = "">
                    <div>
                        <span>Dubai, United Arab Emirates</span>
                        <ul class = "rating flex">
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star-half-alt"></i></li>
                            <li>&nbsp;400 reviews</li>
                        </ul>
                        <p class = "text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, quia!</p>
                    </div>
                </div>

                <div class = "popular-item shadow">
                    <img src = "images/popular-6.jpg" alt = "">
                    <div>
                        <span>Bhutan</span>
                        <ul class = "rating flex">
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star-half-alt"></i></li>
                            <li>&nbsp;400 reviews</li>
                        </ul>
                        <p class = "text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, quia!</p>
                    </div>
                </div>

                <div class = "popular-item shadow">
                    <img src = "images/popular-7.jpg" alt = "">
                    <div>
                        <span>Havana, Cuba</span>
                        <ul class = "rating flex">
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star-half-alt"></i></li>
                            <li>&nbsp;400 reviews</li>
                        </ul>
                        <p class = "text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, quia!</p>
                    </div>
                </div>

                <div class = "popular-item shadow">
                    <img src = "images/popular-8.jpg" alt = "">
                    <div>
                        <span>Moskva, Russia</span>
                        <ul class = "rating flex">
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star"></i></li>
                            <li><i class = "fas fa-star-half-alt"></i></li>
                            <li>&nbsp;400 reviews</li>
                        </ul>
                        <p class = "text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, quia!</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of popular places section -->
        

     <script src="js/script.js"></script>

     
<?php include 'components/footer.php'; ?>
 </body>   
 </html>