<?php
include 'inc/functions.php';
session_start();
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<script src="https://kit.fontawesome.com/6417ec9ef0.js" crossorigin="anonymous"></script>
  <title>ikGym</title>
</head>
<body>
<header>
  <!-- First container -->
  <div class="container container_solid">
    <div class="title_wrapper">
      <h1>IK GYM</h1>
    </div>
  </div>

  <!-- Second container -->
  <div class="container container_image" aria-hidden="true">
    <div class="title_wrapper">
      <h1>IK GYM</h1>
    </div>
  </div>

</header>

<section>
  <h2>WELCOME TO IK GYM.</h2>
  <p>IK GYM ka qenë Elite Fitness që nga viti 2015 dhe mund të përdoret për të përmbushur çdo qëllim, nga përmirësimi i shëndetit deri te performanca më e mirë.
     Programi funksionon për të gjithë — Njerëzit që nuk kanë stërvitur kurrë dhe ata që janë stërvitur për vite me radhë ndajnë në mënyrë të barabartë përfitimet e palestrës.</p>
  <p>
  Jemi të pajisur me pajisje moderne dhe jemi operativ 24/7 
  </p>
    <p>
    "It is a shame for a man to grow old without seeing the beauty and strength<br> of which his body is capable" - Socrates
  </p>
      <p class="important">Rezervo Trajnerin Online dhe fillo.
      <div class ="icons">
        <a href="https://www.instagram.com/ilir_koliqi/"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://www.facebook.com/Ilir1999Koliqi"><i class="fa-brands fa-facebook"></i></a>
       <i  title = "049582443"class="fa-solid fa-phone"></i></a>
      </div>
      <div class="form">
      <p style="margin-bottom:5px;"><strong>Subscribe to our Newsletter</strong></p>
     <?php
     if(isset($_POST['subscribe'])){
      $email = $_POST['email'];
      newsLetter($email);
     }
?>
      <form  method="POST">
		<input type="email" name="email" class="form__email" placeholder="Enter your email address" />
		<input type="submit" value="Subscribe" name ="subscribe"class="form__button"></input>
      </form>
	</div>
 
</section>
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

  <?php if(isset($_SESSION['tid']) && $_SESSION['roli'] == 'trajner'){ ?>
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

</body>
</html>