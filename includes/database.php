<?php
$host       = "localhost";
$database   = "techfilo4";
$user       = "root";
$password   = "";

$db = mysqli_connect($host, $user, $password, $database)
    or die("Error: " . mysqli_connect_error());;
//code om een connectie te maken met de local sql database