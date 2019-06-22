<?php
session_start();
session_destroy();
unset($SESSION['uid']);
unset($SESSION['password']);
header("location:loginform.php");


?>