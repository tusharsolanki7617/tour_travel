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

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="shortcut icon" type="x-icon" href="uploaded_img/TravelTrek.png">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- <section class="form-container">

   <form action="" method="post">
      <h3>Login Now</h3>
      <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="login now" class="btn" name="submit">
      <p>Don't have an account?</p>
      <a href="user_register.php" class="option-btn">Register Now.</a>
   </form>

</section> -->

<!-- login form start -->
<section class="form-container">
   <form action="" method="post" onsubmit="return validateLoginForm()">
      <h3>Login Now</h3>

      <input type="email" id="email" name="email" placeholder="Enter your email" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <small id="emailError" class="error"></small>

      <div class="password-container">
         <input type="password" id="pass" name="pass" placeholder="Enter your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <span class="toggle-password" onclick="togglePassword('pass', 'togglePassIcon')">
            <i id="togglePassIcon" class="fas fa-eye"></i>
         </span>
      </div>
      <small id="passError" class="error"></small>

      <input type="submit" value="Login Now" class="btn" name="submit">

      <p>Don't have an account?</p>
      <a href="user_register.php" class="option-btn">Register Now.</a>
   </form>
</section>

<style>
   .error {
      color: red;
      font-size: 14px;
      display: block;
      margin-top: 5px;
   }

   .password-container {
      position: relative;
   }

   .toggle-password {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #555;
   }

   .toggle-password i {
      font-size: 16px;
   }
</style>

<script>
   function validateLoginForm() {
      let email = document.getElementById("email").value.trim();
      let pass = document.getElementById("pass").value.trim();

      let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      let isValid = true;

      // Reset previous error messages
      document.getElementById("emailError").innerText = "";
      document.getElementById("passError").innerText = "";

      if (email === "") {
         document.getElementById("emailError").innerText = "Please enter your email.";
         isValid = false;
      } else if (!emailPattern.test(email)) {
         document.getElementById("emailError").innerText = "Please enter a valid email address.";
         isValid = false;
      }

      if (pass === "") {
         document.getElementById("passError").innerText = "Please enter your password.";
         isValid = false;
      }

      return isValid;
   }

   function togglePassword(inputId, iconId) {
      let input = document.getElementById(inputId);
      let icon = document.getElementById(iconId);

      if (input.type === "password") {
         input.type = "text";
         icon.classList.remove("fa-eye");
         icon.classList.add("fa-eye-slash");
      } else {
         input.type = "password";
         icon.classList.remove("fa-eye-slash");
         icon.classList.add("fa-eye");
      }
   }
</script>

<!-- Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- login form end -->










<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>


<!------        -------->


