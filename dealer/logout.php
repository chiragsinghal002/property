<?php
session_start();

unset($_SESSION['dealer_id']);
unset($_SESSION['dealer_email']);

session_destroy();

header("location:index.php");
?>