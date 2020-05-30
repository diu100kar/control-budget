<?php
$var_con_host = "localhost:3308";
$var_con_user = "root";
$var_con_password = "";
$var_con_database = "controlbudget";

$var_con = mysqli_connect($var_con_host, $var_con_user, $var_con_password, $var_con_database) or die("Error connecting to the database. Please try reloading the page.");
?>