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

   $update_profile = $conn->prepare("UPDATE `users` SET name = ?, email = ? WHERE id = ?");
   $update_profile->execute([$name, $email, $user_id]);

   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $prev_pass = $_POST['prev_pass'];
   $old_pass = sha1($_POST['old_pass']);
   $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
   $new_pass = sha1($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   if($old_pass == $empty_pass){
      $message[] = 'please enter old password!';
   }elseif($old_pass != $prev_pass){
      $message[] = 'old password not matched!';
   }elseif($new_pass != $cpass){
      $message[] = 'confirm password not matched!';
   }else{
      if($new_pass != $empty_pass){
         $update_admin_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
         $update_admin_pass->execute([$cpass, $user_id]);
         $message[] = 'password updated successfully!';
      }else{
         $message[] = 'please enter a new password!';
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
   <title>Profile</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- <section class="form-container">

   <form action="" method="post">
      <h3>Update now</h3>
      <input type="hidden" name="prev_pass" value="<?= $fetch_profile["password"]; ?>">
      <input type="text" name="name" required placeholder="enter your username" maxlength="20"  class="box" value="<?= $fetch_profile["name"]; ?>">
      <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="<?= $fetch_profile["email"]; ?>">
      <input type="password" name="old_pass" placeholder="enter your old password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="new_pass" placeholder="enter your new password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cpass" placeholder="confirm your new password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="update now" class="btn" name="submit">
   </form>

</section> -->

<!-- update profile start -->

<!-- <section class="form-container">
   <form action="" method="post" onsubmit="return validateUpdateForm()">
      <h3>Update now</h3>

      <input type="hidden" name="prev_pass" value="<?= $fetch_profile['password']; ?>">

      <input type="text" id="name" name="name" placeholder="Enter your username" maxlength="20" class="box" value="<?= $fetch_profile['name']; ?>">
      <small id="nameError" class="error"></small>

      <input type="email" id="email" name="email" placeholder="Enter your email" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="<?= $fetch_profile['email']; ?>">
      <small id="emailError" class="error"></small>

      <input type="password" id="old_pass" name="old_pass" placeholder="Enter your old password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <small id="oldPassError" class="error"></small>

      <input type="password" id="new_pass" name="new_pass" placeholder="Enter your new password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <small id="newPassError" class="error"></small>

      <input type="password" id="cpass" name="cpass" placeholder="Confirm your new password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <small id="cpassError" class="error"></small>

      <input type="submit" value="Update Now" class="btn" name="submit">
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
   function validateUpdateForm() {
      let name = document.getElementById("name").value.trim();
      let email = document.getElementById("email").value.trim();
      let oldPass = document.getElementById("old_pass").value.trim();
      let newPass = document.getElementById("new_pass").value.trim();
      let cpass = document.getElementById("cpass").value.trim();

      let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      let passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      let isValid = true;

      // Reset previous error messages
      document.getElementById("nameError").innerText = "";
      document.getElementById("emailError").innerText = "";
      document.getElementById("oldPassError").innerText = "";
      document.getElementById("newPassError").innerText = "";
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

      if (oldPass === "") {
         document.getElementById("oldPassError").innerText = "Please enter your old password.";
         isValid = false;
      }

      if (newPass === "") {
         document.getElementById("newPassError").innerText = "Please enter your new password.";
         isValid = false;
      } else if (!passwordPattern.test(newPass)) {
         document.getElementById("newPassError").innerText = "Password must be at least 8 characters long, include 1 uppercase, 1 lowercase, 1 number, and 1 special character.";
         isValid = false;
      }

      if (cpass === "") {
         document.getElementById("cpassError").innerText = "Please confirm your new password.";
         isValid = false;
      } else if (cpass !== newPass) {
         document.getElementById("cpassError").innerText = "Passwords do not match.";
         isValid = false;
      }

      return isValid;
   }
</script> -->

<!-- update form end -->


<!-- update form start -->

<!-- Ensure Font Awesome is included -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<section class="form-container">
   <form action="" method="post" onsubmit="return validateUpdateForm()">
      <h3>Profile</h3>

      <input type="hidden" name="prev_pass" value="<?= $fetch_profile['password']; ?>">

      <input type="text" id="name" name="name" placeholder="Enter your username" maxlength="20" class="box" value="<?= $fetch_profile['name']; ?>">
      <small id="nameError" class="error"></small>

      <input type="email" id="email" name="email" placeholder="Enter your email" maxlength="50" class="box" value="<?= $fetch_profile['email']; ?>">
      <small id="emailError" class="error"></small>

      <div class="password-container">
         <input type="password" id="old_pass" name="old_pass" placeholder="Enter your old password" maxlength="20" class="box">
         <i class="fas fa-eye toggle-password" onclick="togglePassword('old_pass', this)"></i>
      </div>
      <small id="oldPassError" class="error"></small>

      <div class="password-container">
         <input type="password" id="new_pass" name="new_pass" placeholder="Enter your new password" maxlength="20" class="box" oninput="checkPasswordStrength()">
         <i class="fas fa-eye toggle-password" onclick="togglePassword('new_pass', this)"></i>
      </div>
      <small id="newPassError" class="error"></small>
      <small id="passwordStrength" class="strength"></small>

      <div class="password-container">
         <input type="password" id="cpass" name="cpass" placeholder="Confirm your new password" maxlength="20" class="box">
         <i class="fas fa-eye toggle-password" onclick="togglePassword('cpass', this)"></i>
      </div>
      <small id="cpassError" class="error"></small>

      <input type="submit" value="Update Now" class="btn" name="submit">
   </form>
</section>

<style>
   .error {
      color: red;
      font-size: 14px;
      display: block;
      margin-top: 5px;
   }
   .strength {
      font-size: 14px;
      font-weight: bold;
      display: block;
      margin-top: 5px;
   }
   .weak {
      color: red;
   }
   .medium {
      color: orange;
   }
   .strong {
      color: green;
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
      font-size: 18px;
      color: gray;
   }
   .toggle-password:hover {
      color: black;
   }
</style>

<script>
   function validateUpdateForm() {
      let name = document.getElementById("name").value.trim();
      let email = document.getElementById("email").value.trim();
      let oldPass = document.getElementById("old_pass").value.trim();
      let newPass = document.getElementById("new_pass").value.trim();
      let cpass = document.getElementById("cpass").value.trim();

      let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      let passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      let isValid = true;

      // Reset previous error messages
      document.getElementById("nameError").innerText = "";
      document.getElementById("emailError").innerText = "";
      document.getElementById("oldPassError").innerText = "";
      document.getElementById("newPassError").innerText = "";
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

      if (oldPass === "") {
         document.getElementById("oldPassError").innerText = "Please enter your old password.";
         isValid = false;
      }

      if (newPass === "") {
         document.getElementById("newPassError").innerText = "Please enter your new password.";
         isValid = false;
      } else if (!passwordPattern.test(newPass)) {
         document.getElementById("newPassError").innerText = "Password must be at least 8 characters, include 1 uppercase, 1 lowercase, 1 number, and 1 special character.";
         isValid = false;
      }

      if (cpass === "") {
         document.getElementById("cpassError").innerText = "Please confirm your new password.";
         isValid = false;
      } else if (cpass !== newPass) {
         document.getElementById("cpassError").innerText = "Passwords do not match.";
         isValid = false;
      }

      return isValid;
   }

   function togglePassword(fieldId, element) {
      let field = document.getElementById(fieldId);
      if (field.type === "password") {
         field.type = "text";
         element.classList.remove("fa-eye");
         element.classList.add("fa-eye-slash");
      } else {
         field.type = "password";
         element.classList.remove("fa-eye-slash");
         element.classList.add("fa-eye");
      }
   }

   function checkPasswordStrength() {
      let password = document.getElementById("new_pass").value;
      let strengthText = document.getElementById("passwordStrength");
      
      if (password.length < 8) {
         strengthText.innerText = "Weak (Too short)";
         strengthText.className = "strength weak";
      } else if (password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/)) {
         strengthText.innerText = "Medium (Add special characters)";
         strengthText.className = "strength medium";
      } else if (password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/)) {
         strengthText.innerText = "Strong";
         strengthText.className = "strength strong";
      } else {
         strengthText.innerText = "";
      }
   }
</script>
<!-- update form end -->

























<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>