<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/jquery.validate.js"></script>
<?php
include 'inc/functions.php';
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>IKGYM</title>
  <link rel="stylesheet" href="loginsignup.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="bg"></div>

<?php

if(isset($_POST['signup'])){
  $emri = $_POST['emri'];
  $mbiemri = $_POST['mbiemri'];
  $telefoni = $_POST['telefoni'];
  $email = $_POST['email'];
  $fjalekalimi = $_POST['password'];
  regjistrohu($emri , $mbiemri , $telefoni , $email , $fjalekalimi);
}

?>

<form method="post" id="commentForm">
  <div class="form-field">
    <input type="text" name="emri" placeholder="Emri" minlength = "2" required/>
  </div>
  <div class="form-field">
    <input type="text" name="mbiemri" placeholder="Mbiemri" required/>
  </div>
  <div class="form-field">
    <input type="email" name="email" placeholder="Email" required/>
  </div>
  <div class="form-field">
    <input type="text" name="telefoni" placeholder="Telefoni" required/>
  </div>
  <div class="form-field">
    <input type="password" name="password" placeholder="Password" minlength = "2" required/>                        
   </div>
  
  <div class="form-field">
    <button class="btn" name="signup" type="submit">Sign Up</button>
  </div>
  <div class="label">
    <label>Already a member?<a href="login.php" class="signup"> Log In</a></label>
  </div>
  <div class="home">
    <label><a href="home.php" class="signup">Home</a></label>
  </div>
</form>
<script>
  $("#commentForm").validate();
</script>
</body>
</html>
