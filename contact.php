<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if($select_message->rowCount() > 0){
      $message[] = 'already sent message!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg]);

      $message[] = 'sent message successfully!';

   }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="shortcut icon" type="x-icon" href="uploaded_img/TravelTrek.png">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">


   <style>
   *{ 
      margin: 0; 
      padding: 0; 
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
   }

   .map{
      width: 99%; 
      height: 50vh; 
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
   }

   iframe{
      width: 99%;
      height: 500px;
      /* filter: invert (100%); */
   }
      </style>
</head>
<body>
   
<?php include 'components/user_header.php'; ?>



<!-- contact us section starts ---->

<div class = "contact-bg">
        <h3>Get in Touch with Us</h3>
        <h2>contact us</h2>
        <div class = "line">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <p class = "text">Have questions or need assistance? We're here to help! Contact us via phone, email, or the form below. Stay connected through our social media for updates. Your feedback matters, and we'll respond as soon as possible. Let's connect and make things happen!</p>
      </div>

<section class = "contact-section">

     <!-- not working than contact-bg past here -->

      <div class = "contact-body">
        <div class = "contact-info">
          <div>
            <span><i class = "fas fa-mobile-alt"></i></span>
            <span>Phone No.</span>
            <span class = "text">+91 9316109130</span>
          </div>
          <div>
            <span><i class = "fas fa-envelope-open"></i></span>
            <span>E-mail</span>
            <span class = "text">tsolanki@rku.ac.in</span>
          </div>
          <div>
            <span><i class = "fas fa-map-marker-alt"></i></span>
            <span>Address</span>
            <span class = "text">Rajkot, Tramba, Gujarat 360020</span>
          </div>
          <div>
            <span><i class = "fas fa-clock"></i></span>
            <span>Opening Hours</span>
            <span class = "text">Monday - Friday (9:00 AM to 5:00 PM)</span>
          </div>
        </div>     

</section>

<!-- contact us section ends -->


<!-- contact form start -->
<section class="contact">
   <form action="" method="post" onsubmit="return validateForm()">
      <h3>Get in touch.</h3>

      <input type="text" id="name" name="name" placeholder="Enter your name" maxlength="20" class="box">
      <small id="nameError" class="error"></small>

      <input type="email" id="email" name="email" placeholder="Enter your email" maxlength="50" class="box">
      <small id="emailError" class="error"></small>

      <input type="tel" id="number" name="number" placeholder="Enter your 10-digit number" maxlength="10" class="box">
      <small id="numberError" class="error"></small>

      <textarea name="msg" id="msg" class="box" placeholder="Enter your message" cols="30" rows="10"></textarea>
      <small id="msgError" class="error"></small>

      <input type="submit" value="Send Message" name="send" class="btn">
   </form>
</section>

<style>
   .error {
      color: red;
      font-size: 14px;
      display: block;
      margin-top: 5px;
   }

</style>

<script>
   function validateForm() {
      let name = document.getElementById("name").value.trim();
      let email = document.getElementById("email").value.trim();
      let number = document.getElementById("number").value.trim();
      let msg = document.getElementById("msg").value.trim();

      let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      let numberPattern = /^\d{10}$/;

      let isValid = true;

      // Reset error messages
      document.getElementById("nameError").innerText = "";
      document.getElementById("emailError").innerText = "";
      document.getElementById("numberError").innerText = "";
      document.getElementById("msgError").innerText = "";

      if (name === "") {
         document.getElementById("nameError").innerText = "Please enter your name.";
         isValid = false;
      }

      if (email === "") {
         document.getElementById("emailError").innerText = "Please enter your email.";
         isValid = false;
      } else if (!emailPattern.test(email)) {
         document.getElementById("emailError").innerText = "Please enter a valid email address.";
         isValid = false;
      }

      if (number === "") {
         document.getElementById("numberError").innerText = "Please enter your phone number.";
         isValid = false;
      } else if (!numberPattern.test(number)) {
         document.getElementById("numberError").innerText = "Phone number must be exactly 10 digits.";
         isValid = false;
      }

      if (msg === "") {
         document.getElementById("msgError").innerText = "Please enter your message.";
         isValid = false;
      }

      return isValid;
   }
</script>
<br><br>
<!-- contact form end -->


<!-- map start -->
<div class="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58597.71203383134!2d70.88602369760082!3d22.236197494297247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959b4a660019ee9%3A0x3d6254f36ed0e794!2sRK%20University%20Main%20Campus!5e0!3m2!1sen!2sin!4v1743613469587!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- map end  -->
<br>



<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>


<!------------------------------------------------------------------------------->

