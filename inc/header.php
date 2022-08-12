<?php
  include 'functions.php';
  session_start();
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<script src="https://kit.fontawesome.com/6417ec9ef0.js" crossorigin="anonymous"></script>
  <title>IKGYM</title>
</head>

<nav class="navbar">
    
  <div class="logo">
    <a href="home.php"><img src="images/logo.png" alt="logo"></a>
  </div>
  <ul>
  <?php if(isset($_SESSION['id']) && $_SESSION['roli'] == 'klient'){ ?>
    <!-- <li><a href="klientet.php">Klientet</a></li> -->
    <li><a href="trajneret.php">Trajneret</a></li>
    <li><a href="kategorite.php">Kategorite</a></li>
    <li><a href="rezervimet.php">Rezervo</a></li>
    <li><a href="logout.php">Log out</a></li>
    <li><i class="fa fa-user"></i><?php echo $_SESSION['emri'] . " ". $_SESSION['mbiemri']; ?></li>
    <!-- <li><a  class="active" href="signup.php">Regjistrohu</a></li> -->
  <?php } ?>

  <?php if(!isset($_SESSION['roli'])){ ?>
    <!-- <li><a href="klientet.php">Klientet</a></li> -->
    <li><a href="trajneret.php">Trajneret</a></li>
    <li><a href="kategorite.php">Kategorite</a></li>
    <!-- <li><a href="rezervimet.php">Rezervo</a></li> -->
    <!-- <li><a href="logout.php">Log out</a></li> -->
    <li><a  class="active" href="signup.php">Regjistrohu</a></li>
  <?php } ?>

  <?php if(isset($_SESSION['id']) && $_SESSION['roli'] == 'admin'){ ?>
    <li><a href="klientet.php">Klientet</a></li>
    <li><a href="trajneret.php">Trajneret</a></li>
    <li><a href="kategorite.php">Kategorite</a></li>
    <li><a href="rezervimet.php">Rezervimet</a></li>
    <li><a href="subscribers.php">Subscribers</a></li>
    <li><a href="logout.php">Log out</a></li>
    <li><i class="fa fa-user"></i><?php echo $_SESSION['emri'] . " ". $_SESSION['mbiemri']; ?></li>
    <!-- <li><a  class="active" href="signup.php">Regjistrohu</a></li> -->
  <?php } ?>

  <?php if(isset($_SESSION['tid']) && $_SESSION['roli'] == "trajner"){ ?>
    <!-- <li><a href="klientet.php">Klientet</a></li> -->
    <li><a href="trajneret.php">Trajneret</a></li>
    <li><a href="kategorite.php">Kategorite</a></li>
    <li><a href="rezervimet.php">Rezervimet</a></li>
    <li><a href="logout.php">Log out</a></li>
    <li><i class="fa fa-user"></i><?php echo $_SESSION['emri'] . " ". $_SESSION['mbiemri']; ?></li>
    <!-- <li><a  class="active" href="signup.php">Regjistrohu</a></li> -->
  <?php } ?>
    
  </ul>
</nav>