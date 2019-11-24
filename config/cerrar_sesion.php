<?php
session_start();
$_SESSION['isLogged'] = FALSE;
session_destroy();
header("Location:../publica/vista/login.html");
?>