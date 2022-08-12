<?php
include 'inc/functions.php';

fshijSubscribers($_POST['id']);
header("Location: subscribers.php");
?>