<?php
session_start();
unset($_SESSION["kodu_admin_username"]);
unset($_SESSION["kodu_admin_usertype"]);
header("Location:index.php");
?>