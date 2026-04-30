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
   <link rel="shortcut icon" type="x-icon" href="uploaded_img/TravelTrek.png">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>
 /* about css */     
* {
  font-family: Nunito, sans-serif;
}

.text-blk {
  padding-top: 0px;
  padding-right: 0px;
  padding-bottom: 0px;
  padding-left: 0px;
  line-height: 20px;
  color: white;
  font-size: 14px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 40px;
  margin-left: 0px;
}

.responsive-container-block {
  min-height: 75px;
  height: fit-content;
  width: 100%;
  padding-top: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
  display: flex;
  flex-wrap: wrap;
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 0px;
  margin-left: auto;
  justify-content: flex-start;
}

.responsive-container-block.bigContainer {
  background-image: initial;
  background-position-x: initial;
  background-position-y: initial;
  background-size: initial;
  background-repeat-x: initial;
  background-repeat-y: initial;
  background-attachment: initial;
  background-origin: initial;
  background-clip: initial;
  background-color: rgb(0, 0, 0);
  padding-top: 0px;
  padding-right: 20px;
  padding-bottom: 10px;
  padding-left: 20px;
  margin: 0 0 0 0;
}

.responsive-container-block.Container {
  max-width: 1320px;
  align-items: center;
  justify-content: center;
  margin-top: 80px;
  margin-right: auto;
  margin-bottom: 80px;
  margin-left: auto;
  padding-top: 10px;
  padding-right: 0px;
  padding-bottom: 10px;
  padding-left: 0px;
}

.responsive-container-block.leftSide {
  width: auto;
  align-items: flex-start;
  padding-top: 10px;
  padding-right: 0px;
  padding-bottom: 10px;
  padding-left: 0px;
  flex-direction: column;
  position: static;
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 0px;
  margin-left: auto;
  max-width: 300px;
}

.text-blk.heading {
  font-size: 30px;
  line-height: 40px;
  font-weight: 900;
  color: #00B2EB;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 100px;
  margin-left: 0px;
}

.text-blk.btn {
  color: rgb(0, 178, 235);
  background-image: initial;
  background-position-x: initial;
  background-position-y: initial;
  background-size: initial;
  background-repeat-x: initial;
  background-repeat-y: initial;
  background-attachment: initial;
  background-origin: initial;
  background-clip: initial;
  background-color: rgb(255, 255, 255);
  box-shadow: rgba(160, 121, 0, 0.2) 0px 12px 35px;
  border-top-left-radius: 100px;
  border-top-right-radius: 100px;
  border-bottom-right-radius: 100px;
  border-bottom-left-radius: 100px;
  padding-top: 20px;
  padding-right: 50px;
  padding-bottom: 20px;
  padding-left: 50px;
  cursor: pointer;
}

.responsive-container-block.rightSide {
  width: 675px;
  position: relative;
  padding-top: 0px;
  padding-right: 0px;
  padding-bottom: 0px;
  padding-left: 0px;
  display: flex;
  height: 700px;
  min-height: auto;
}

.number1img {
  margin-top: 39%;
  margin-right: 80%;
  margin-bottom: 29%;
  margin-left: 0px;
  height: 32%;
  width: 20%;
  position: absolute;
}

.number2img {
  margin-top: 19%;
  margin-right: 42%;
  margin-bottom: 42%;
  margin-left: 23%;
  width: 35%;
  height: 39%;
  position: absolute;
}

.number3img {
  width: 13%;
  height: 21%;
  position: absolute;
  margin-top: 62%;
  margin-right: 64%;
  margin-bottom: 30%;
  margin-left: 23%;
}

.number4vid {
  width: 34%;
  height: 33%;
  position: absolute;
  margin-top: 62%;
  margin-right: 27%;
  margin-bottom: 0px;
  margin-left: 39%;
}

.number5img {
  position: absolute;
  width: 13%;
  height: 21%;
  margin-top: 38%;
  margin-right: 27%;
  margin-bottom: 41%;
  margin-left: 60%;
}

.number6img {
  position: absolute;
  margin-top: 0px;
  margin-right: 3%;
  margin-bottom: 67%;
  margin-left: 62%;
  width: 35%;
  height: 33%;
}

.number7img {
  position: absolute;
  width: 25%;
  margin-top: 40%;
  margin-right: 0px;
  margin-bottom: 18%;
  margin-left: 75%;
  height: 42%;
}

.text-blk.subHeading {
  font-size: 20px;
  line-height: 25px;
}

@media (max-width: 1024px) {
  .responsive-container-block.Container {
    flex-direction: column-reverse;
  }

  .text-blk.heading {
    text-align: center;
    max-width: 370px;
  }

  .text-blk.subHeading {
    text-align: center;
  }

  .responsive-container-block.leftSide {
    align-items: center;
    max-width: 480px;
  }

  .responsive-container-block.rightSide {
    margin-top: 0px;
    margin-right: auto;
    margin-bottom: 100px;
    margin-left: auto;
  }

  .responsive-container-block.rightSide {
    margin: 0 auto 70px auto;
  }
}

@media (max-width: 768px) {
  .responsive-container-block.rightSide {
    width: 450px;
    height: 450px;
  }

  .responsive-container-block.leftSide {
    max-width: 450px;
  }
}

@media (max-width: 500px) {
  .number1img {
    display: none;
  }

  .number2img {
    display: none;
  }

  .number3img {
    display: none;
  }

  .number5img {
    display: none;
  }

  .number6img {
    display: none;
  }

  .number7img {
    display: none;
  }

  .responsive-container-block.rightSide {
    width: 100%;
    height: 250px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 100px;
    margin-left: 0px;
  }

  .number4vid {
    position: static;
    margin-top: 0px;
    margin-right: auto;
    margin-bottom: 0px;
    margin-left: auto;
    width: 100%;
    height: 100%;
  }

  .text-blk.heading {
    font-size: 25px;
    line-height: 40px;
    max-width: 370px;
    width: auto;
  }

  .text-blk.subHeading {
    font-size: 14px;
    line-height: 25px;
  }

  .responsive-container-block.leftSide {
    width: 100%;
  }
}


 /*-------------------- team css -------------------*/

.text-blk {
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  line-height: 25px;
}

.responsive-cell-block {
  min-height: 75px;
}

.responsive-container-block {
  min-height: 75px;
  height: fit-content;
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 0px;
  margin-left: auto;
  justify-content: space-evenly;
}

.outer-container {
  padding-top: 10px;
  padding-right: 50px;
  padding-bottom: 10px;
  padding-left: 50px;
  background-color: rgb(0, 0, 0);
}

.inner-container {
  max-width: 1320px;
  flex-direction: column;
  align-items: center;
  margin-top: 50px;
  margin-right: auto;
  margin-bottom: 50px;
  margin-left: auto;
}

.section-head-text {
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 5px;
  margin-left: 0px;
  font-size: 35px;
  font-weight: 700;
  line-height: 48px;
  color: rgb(0, 135, 177);
  margin: 0 0 10px 0;
}

.section-subhead-text {
  font-size: 25px;
  color: rgb(153, 153, 153);
  line-height: 35px;
  max-width: 470px;
  text-align: center;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 60px;
  margin-left: 0px;
}

.img-wrapper {
  width: 100%;
}

.team-card {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.social-media-links {
  width: 125px;
  display: flex;
  justify-content: space-between;
}

.name {
  font-size: 25px;
  font-weight: 700;
  color: rgb(102, 102, 102);
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 5px;
  margin-left: 0px;
}

.position {
  font-size: 25px;
  font-weight: 700;
  color: rgb(0, 135, 177);
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 50px;
  margin-left: 0px;
}

.team-img {
  width: 100%;
  height: 100%;
}

.team-card-container {
  width: 280px;
  margin: 0 0 40px 0;
}

@media (max-width: 500px) {
  .outer-container {
    padding: 10px 20px 10px 20px;
  }

  .section-head-text {
    text-align: center;
  }
}
      </style>

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- abour start -->
<div class="responsive-container-block bigContainer">
  <div class="responsive-container-block Container">
    <div class="responsive-container-block leftSide">
      <p class="text-blk heading">
      Welcome to TravelTrek, your trusted travel companion
      </p>
      <p class="text-blk subHeading">
      We are passionate about making travel easy, enjoyable, and hassle-free. Whether you're looking for an adventurous getaway, a relaxing vacation, or a well-planned business trip, we are here to provide the best travel solutions.
      </p>
    </div>
    <div class="responsive-container-block rightSide">
      <img class="number1img" src="https://cdn.pixabay.com/photo/2023/09/25/20/38/lisbon-8275994_1280.jpg">
      <img class="number2img" src="https://cdn.pixabay.com/photo/2021/09/05/19/55/sea-6600306_1280.jpg">
      <img class="number3img" src="https://cdn.pixabay.com/photo/2023/09/29/14/58/road-8284023_1280.jpg">
      <img class="number5img" src="https://cdn.pixabay.com/photo/2020/06/01/13/02/mountains-5246545_1280.jpg">
      <iframe allowfullscreen="allowfullscreen" class="number4vid" poster="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/b242.png" src="https://cdn.pixabay.com/video/2020/04/24/37088-413229662_tiny.mp4">
      </iframe>
      <img class="number7img" src="https://cdn.pixabay.com/photo/2020/03/25/12/41/beach-4967176_1280.jpg">
      <img class="number6img" src="https://cdn.pixabay.com/photo/2023/03/10/20/36/kitesurfing-7843135_1280.jpg">
    </div>
  </div>
</div>
 <!-- about end -->

 
<!--------------------------- team ----------------------------->
<div class="responsive-container-block outer-container">
  <div class="responsive-container-block inner-container">
    <p class="text-blk section-head-text">
      Meet Our Expert Instructors
    </p>
    <p class="text-blk section-subhead-text">
    Our Instructors
    </p>
    <div class="responsive-container-block">
      <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 team-card-container">
        <div class="team-card">
          <div class="img-wrapper">
            <img class="team-img" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/eourInstructors1.svg">
          </div><br>
          <p class="text-blk name">
            Alex Voyager
          </p>
          <p class="text-blk position">
             Budget Planning
          </p>
          <div class="social-media-links">
            <a href="" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-twitter.svg">
            </a>
            <a href="" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-fb.svg">
            </a>
            <a href="" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-insta.svg">
            </a>
            <a href="" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-mail.svg">
            </a>
          </div>
        </div>
      </div>
      <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 team-card-container">
        <div class="team-card">
          <div class="img-wrapper">
            <img class="team-img" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/ft13.svg">
          </div><br>
          <p class="text-blk name">
             Liam Wanderlust
          </p>
          <p class="text-blk position">
             Route Planner
          </p>
          <div class="social-media-links">
            <a href="" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-twitter.svg">
            </a>
            <a href="" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-fb.svg">
            </a>
            <a href="" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-insta.svg">
            </a>
            <a href="" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-mail.svg">
            </a>
          </div>
        </div>
      </div>
      <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 team-card-container">
        <div class="team-card">
          <div class="img-wrapper">
            <img class="team-img" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/eourInstructors3.svg">
          </div><br>
          <p class="text-blk name">
           Zara Adventura
          </p>
          <p class="text-blk position">
              Stay Recommender
          </p>
          <div class="social-media-links">
            <a href="" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-twitter.svg">
            </a>
            <a href="" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-fb.svg">
            </a>
            <a href="" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-insta.svg">
            </a>
            <a href="" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-mail.svg">
            </a>
          </div>
        </div>
      </div>
      <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 team-card-container">
        <div class="team-card">
          <div class="img-wrapper">
            <img class="team-img" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/ft14.svg">
          </div>
          <br>
          <p class="text-blk name">
            Leo Drifter
          </p>
          <p class="text-blk position">
            Survival Hacks
          </p>
          <div class="social-media-links">
            <a href="" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-twitter.svg">
            </a>
            <a href="" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-fb.svg">
            </a>
            <a href="" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-insta.svg">
            </a>
            <a href="" target="_blank">
              <img src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-mail.svg">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!---------------------------- team end  ------------------------->




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