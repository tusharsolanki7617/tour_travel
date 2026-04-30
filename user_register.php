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
      $message[] = 'email already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $cpass]);
         $message[] = 'registered successfully, login now please!';
      }
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
   <title>Register</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- <section class="form-container">

   <form action="" method="post">
      <h3>Register Now.</h3>
      <input type="text" name="name" required placeholder="enter your username" maxlength="20"  class="box">
      <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cpass" required placeholder="confirm your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="register now" class="btn" name="submit">
      <p>Already have an account?</p>
      <a href="user_login.php" class="option-btn">Login Now.</a>
   </form>

</section> -->



<!-- register form start -->

<section class="form-container">
   <form action="" method="post" onsubmit="return validateRegisterForm()">
      <h3>Register Now.</h3><br>

      <input type="text" id="name" name="name" placeholder="Enter your username" maxlength="20" class="box">
      <small id="nameError" class="error"></small>

      <input type="email" id="email" name="email" placeholder="Enter your email" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <small id="emailError" class="error"></small>

      <div class="password-container">
         <input type="password" id="pass" name="pass" placeholder="Enter your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <span class="toggle-password" onclick="togglePassword('pass', 'togglePassIcon')">
            <i id="togglePassIcon" class="fas fa-eye"></i>
         </span>
      </div>
      <small id="passError" class="error"></small>

      <div class="password-container">
         <input type="password" id="cpass" name="cpass" placeholder="Confirm your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <span class="toggle-password" onclick="togglePassword('cpass', 'toggleCpassIcon')">
            <i id="toggleCpassIcon" class="fas fa-eye"></i>
         </span>
      </div>
      <small id="cpassError" class="error"></small>

      <input type="submit" value="Register Now" class="btn" name="submit">

      <p>Already have an account?</p>
      <a href="user_login.php" class="option-btn">Login Now.</a>
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
   function validateRegisterForm() {
      let name = document.getElementById("name").value.trim();
      let email = document.getElementById("email").value.trim();
      let pass = document.getElementById("pass").value.trim();
      let cpass = document.getElementById("cpass").value.trim();

      let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      let passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      let isValid = true;

      // Reset previous error messages
      document.getElementById("nameError").innerText = "";
      document.getElementById("emailError").innerText = "";
      document.getElementById("passError").innerText = "";
      document.getElementById("cpassError").innerText = "";

      if (name === "") {
         document.getElementById("nameError").innerText = "Please enter your username.";
         isValid = false;
      }

      if (email === "") {
         document.getElementById("emailError").innerText = "Please enter your email.";
         isValid = false;
      } else if (!emailPattern.test(email)) {
         document.getElementById("emailError").innerText = "Please enter a valid email address.";
         isValid = false;
      }

      if (pass === "") {
         document.getElementById("passError").innerText = "Please enter a password.";
         isValid = false;
      } else if (!passwordPattern.test(pass)) {
         document.getElementById("passError").innerText = "Password must be at least 8 characters, include 1 uppercase, 1 lowercase, 1 number, and 1 special character.";
         isValid = false;
      }

      if (cpass === "") {
         document.getElementById("cpassError").innerText = "Please confirm your password.";
         isValid = false;
      } else if (cpass !== pass) {
         document.getElementById("cpassError").innerText = "Passwords do not match.";
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

<!-- register form end -->






<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>