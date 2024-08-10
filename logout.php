<?php 
session_start();
session_destroy();

echo "<script>alert('your successfully logged out alert by watson');</script>";
header("Refresh:2 url=login.php");
?>

