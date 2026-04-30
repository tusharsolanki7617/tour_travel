<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:user_login.php');
};

if(isset($_POST['order'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $address = 'flat no. '. $_POST['flat'] .', '. $_POST['street'] .', '. $_POST['city'] .', '. $_POST['state'] .', '. $_POST['country'] .' - '. $_POST['pin_code'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];

   $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $check_cart->execute([$user_id]);

   if($check_cart->rowCount() > 0){

      $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?,?)");
      $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_products, $total_price]);

      $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
      $delete_cart->execute([$user_id]);

      $message[] = 'order placed successfully!';
   }else{
      $message[] = 'your cart is empty';
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
   <title>checkout</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- <section class="checkout-orders">

   <form action="" method="POST">

   <h3>Your Orders</h3>

      <div class="display-orders">
      <?php
         $grand_total = 0;
         $cart_items[] = '';
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
               $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '. $fetch_cart['quantity'].') - ';
               $total_products = implode($cart_items);
               $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
      ?>
         <p> <?= $fetch_cart['name']; ?> <span>(<?= '$'.$fetch_cart['price'].'/- x '. $fetch_cart['quantity']; ?>)</span> </p>
      <?php
            }
         }else{
            echo '<p class="empty">your cart is empty!</p>';
         }
      ?>
         <input type="hidden" name="total_products" value="<?= $total_products; ?>">
         <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
         <div class="grand-total">Grand Total : <span>Nrs.<?= $grand_total; ?>/-</span></div>
      </div>

      <h3>place your orders</h3>

      <div class="flex">
         <div class="inputBox">
            <span>Tapaiko subh nam :</span>
            <input type="text" name="name" placeholder="enter your name" class="box" maxlength="20" required>
         </div>
         <div class="inputBox">
            <span>Your Number :</span>
            <input type="number" name="number" placeholder="enter your number" class="box" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" required>
         </div>
         <div class="inputBox">
            <span>Your Email :</span>
            <input type="email" name="email" placeholder="enter your email" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>kasari halnuhunx paisa? :</span>
            <select name="method" class="box" required>
               <option value="cash on delivery">g pay</option>
               <option value="credit card">Credit Card</option>
               <option value="paytm">eSewa</option>
               <option value="paypal">Khalti</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Address line 01 :</span>
            <input type="text" name="flat" placeholder="e.g. Flat number" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>Address line 02 :</span>
            <input type="text" name="street" placeholder="Street name" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>City :</span>
            <input type="text" name="city" placeholder="Kathmandu" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>Province:</span>
            <input type="text" name="state" placeholder="Bagmati" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>Country :</span>
            <input type="text" name="country" placeholder="Nepal" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>ZIP CODE :</span>
            <input type="number" min="0" name="pin_code" placeholder="e.g. 56400" min="0" max="999999" onkeypress="if(this.value.length == 6) return false;" class="box" required>
         </div>
      </div>

      <input type="submit" name="order" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="place order">

   </form>

</section>

 -->



<section class="checkout-orders">

   <form id="orderForm" action="" method="POST">

   <h3>Your Orders</h3>

      <div class="display-orders">
      <?php
         $grand_total = 0;
         $cart_items[] = '';
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
               $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '. $fetch_cart['quantity'].') - ';
               $total_products = implode($cart_items);
               $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
      ?>
         <p> <?= $fetch_cart['name']; ?> <span>(<?= '$'.$fetch_cart['price'].'/- x '. $fetch_cart['quantity']; ?>)</span> </p>
      <?php
            }
         }else{
            echo '<p class="empty">your cart is empty!</p>';
         }
      ?>
         <input type="hidden" name="total_products" value="<?= $total_products; ?>">
         <input type="hidden" name="total_price" value="<?= $grand_total; ?>">
         <div class="grand-total">Grand Total : <span>Nrs.<?= $grand_total; ?>/-</span></div>
      </div>

      <h3>Place Your Order</h3>

      <div class="flex">
         <div class="inputBox">
            <span>Tapaiko subh nam :</span>
            <input type="text" name="name" placeholder="enter your name" class="box" maxlength="20">
         </div>
         <div class="inputBox">
            <span>Your Number :</span>
            <input type="text" name="number" placeholder="enter your number" class="box" maxlength="10">
         </div>
         <div class="inputBox">
            <span>Your Email :</span>
            <input type="email" name="email" placeholder="enter your email" class="box" maxlength="50">
         </div>
         <div class="inputBox">
            <span>kasari halnuhunx paisa? :</span>
            <select name="method" class="box">
               <option value="">Select Payment Method</option>
                <option value="gpay">G Pay</option>
               <option value="credit card">Credit Card</option>
               <option value="esewa">eSewa</option>
               <option value="khalti">Khalti</option>
               
            </select>
         </div>
         <div class="inputBox">
            <span>Address line 01 :</span>
            <input type="text" name="flat" placeholder="e.g. Flat number" class="box" maxlength="50">
         </div>
         <div class="inputBox">
            <span>Address line 02 :</span>
            <input type="text" name="street" placeholder="Street name" class="box" maxlength="50">
         </div>
         <div class="inputBox">
            <span>City :</span>
            <input type="text" name="city" placeholder="Kathmandu" class="box" maxlength="50">
         </div>
         <div class="inputBox">
            <span>Province:</span>
            <input type="text" name="state" placeholder="Bagmati" class="box" maxlength="50">
         </div>
         <div class="inputBox">
            <span>Country :</span>
            <input type="text" name="country" placeholder="Nepal" class="box" maxlength="50">
         </div>
         <div class="inputBox">
            <span>ZIP CODE :</span>
            <input type="text" name="pin_code" placeholder="e.g. 56400" class="box" maxlength="6">
         </div>
      </div>

      <input type="submit" name="order" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="place order">

   </form>

   <script>
       document.getElementById("orderForm").addEventListener("submit", function(event) {
           let isValid = true;
           document.querySelectorAll(".box").forEach(field => {
               field.style.border = "1px solid #ccc"; // Reset border
           });

           function validateField(selector, errorMessage) {
               let field = document.querySelector(selector);
               if (field.value.trim() === "") {
                   field.style.border = "2px solid red";
                   isValid = false;
               }
           }

           validateField("input[name='name']", "Please enter your name.");
           validateField("input[name='number']", "Please enter a valid phone number (10 digits).");
           validateField("input[name='email']", "Please enter a valid email address.");
           validateField("select[name='method']", "Please select a payment method.");
           validateField("input[name='flat']", "Please enter your address (Flat/House No)." );
           validateField("input[name='street']", "Please enter your street name.");
           validateField("input[name='city']", "Please enter your city.");
           validateField("input[name='state']", "Please enter your province.");
           validateField("input[name='country']", "Please enter your country.");
           validateField("input[name='pin_code']", "Please enter a valid ZIP code (6 digits)." );

           let numberField = document.querySelector("input[name='number']");
           if (!/^[0-9]{10}$/.test(numberField.value)) {
               numberField.style.border = "2px solid red";
               isValid = false;
           }

           let emailField = document.querySelector("input[name='email']");
           let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
           if (!emailPattern.test(emailField.value)) {
               emailField.style.border = "2px solid red";
               isValid = false;
           }

           let zipField = document.querySelector("input[name='pin_code']");
           if (!/^[0-9]{6}$/.test(zipField.value)) {
               zipField.style.border = "2px solid red";
               isValid = false;
           }

           if (!isValid) {
               event.preventDefault();
           }
       });
   </script>

</section>








<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>