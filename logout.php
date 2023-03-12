<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['firstname']);
unset($_SESSION['lastname']);
unset($_SESSION['emailaddress']);
unset($_SESSION['phonenumber']);

header("Location:index.php");

?>