<?php
session_start();



session_unset();
session_destroy();
header('Location: index.php');
?>
<!-- <a href="index.php">Home</a> -->