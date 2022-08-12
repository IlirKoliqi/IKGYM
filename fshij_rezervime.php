<?php
include 'inc/functions.php';

fshijRezervimet($_POST['rezervimiid']);
header("Location: rezervimet.php");
?>