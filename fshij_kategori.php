<?php
session_start();
if(!isset($_SESSION['id']) && $_SESSION['roli'] != 'admin'){

header("Location: home.php");
}
  ?>
<?php
include 'inc/functions.php';


fshijKategori($_POST['kategoriaiid']);
header("Location: kategorite.php")
?>