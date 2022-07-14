<?php
session_start();
session_destroy();
header("Location:choose_login.php");
?>