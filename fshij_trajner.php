<?php
session_start();
if(!isset($_SESSION['id']) && $_SESSION['roli'] != 'admin'){

header("Location: home.php");
}
  ?>
<?php
include 'inc/functions.php';


fshijTrajner($_POST['trajneriid']);
header("Location: trajneret.php")
?>