<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/jquery.validate.js"></script>
<?php
include 'inc/functions.php';
session_start();
?>
<?php
    if(isset($_SESSION['id'])){
        echo "<script>
        alert('You are already logged in!');
        window.location.href='home.php';
        </script>";
    }
    ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="loginsignup.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="bg"></div>

<?php
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  Login($email , $password);
}

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  LoginTrajner($email , $password);
}
?>

<form method="post" id="commentForm">
  <div class="form-field">
    <input type="email" name="email" placeholder="Email / Username" required/>
  </div>
  
  <div class="form-field">
    <input type="password" name="password" placeholder="Password" required/>                        
   </div>
  
  <div class="form-field">
    <button class="btn" name="login" type="submit">Log in</button>
  </div>
  <div class="label">
    <label>Not a member ? <a href="signup.php" class="signup">Sign up</a></label>
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
