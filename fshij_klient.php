<?php
session_start();
if(!isset($_SESSION['id']) && $_SESSION['roli'] != 'admin'){

header("Location: home.php");
}
  ?>
  
<?php
include 'inc/functions.php';


fshijKlient($_POST['klientiid']);
header("Location: klientet.php")
?>