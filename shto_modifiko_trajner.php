<?php
session_start();
if(!isset($_SESSION['id']) && $_SESSION['roli'] != 'admin'){

header("Location: home.php");
}
  ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page with Background Image Example</title>
  <?php
    include 'inc/functions.php';
  ?>
  <link rel="stylesheet" href="loginsignup.css">
  <?php
  if(isset($_POST['shto'])){
    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $telefoni = $_POST['telefoni'];
    $email = $_POST['email'];
    $passowrdi = $_POST['password'];
    $roli = $_POST['roli'];
    $res = shtoTrajner($emri , $mbiemri , $telefoni , $email , $passowrdi , $roli);
    if($res){
        header("Location: trajneret.php");
    }
  }
  if(isset($_POST['modifiko'])){
    $trajneriid = $_GET['trajneriid'];
    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $telefoni = $_POST['telefoni'];
    $email = $_POST['email'];
    $passowrdi = $_POST['password'];
    $roli = $_POST['roli'];
    $res = modifikoTrajneret($trajneriid , $emri , $mbiemri , $telefoni , $email , $passowrdi , $roli);
    if($res){
        header("Location: trajneret.php");
    }
  }
  ?>    

</head>
<body>
<!-- partial:index.partial.html -->
<div id="bg"></div>
<form method="post">
<?php if(isset($_GET['trajneriid'])) {
        $trajneri = mysqli_fetch_assoc(merrTrajneriID($_GET['trajneriid']));   }  ?>
  <div class="form-field">
    <input type="text" placeholder="Emri" name="emri" required value="<?php if(isset($_GET['trajneriid'])) echo $trajneri['emri'];  ?>" />
  </div>
  <div class="form-field">
    <input type="text" placeholder="Mbiemri" name="mbiemri" value="<?php if(isset($_GET['trajneriid'])) echo $trajneri['mbiemri'];  ?>" required/>
  </div>
  <div class="form-field">
    <input type="text" placeholder="Telefoni" name="telefoni" value="<?php if(isset($_GET['trajneriid'])) echo $trajneri['telefoni'];  ?>" required/>
  </div>
  <div class="form-field">
    <input type="email" placeholder="Email" name="email" value="<?php if(isset($_GET['trajneriid'])) echo $trajneri['email'];  ?>" required/>
  </div>
  <div class="form-field">
    <input type="password" placeholder="Password" name="password" value="<?php if(isset($_GET['trajneriid'])) echo $trajneri['fjalekalimi'];  ?>" required/>
  </div>
  <?php if(isset($_GET['trajneriid'])){ ?>
  <div class="form-field">
    <button class="btn" type="submit" name="modifiko">Modifiko</button>
  </div>
    <?php  }else{ ?>
  <div class="form-field">
    <button class="btn" type="submit" name="shto">Shto</button>
  </div>
  <?php    } ?>
  <?php if(isset($_GET['trajneriid'])) { ?>
  <div class="label">
    <label style="font-size:20px;">Modifikimi per Trajner</a></label>
  </div>
  <?php }else{ ?>
  <div class="label">
    <label style="font-size:20px;">Shtimi per Trajner</a></label>
  </div>
  <?php } ?>
  <div class="home">
    <label><a href="home.php" class="signup">Home</a></label>
  </div>
</form>
<!-- partial -->
</body>
</html>
