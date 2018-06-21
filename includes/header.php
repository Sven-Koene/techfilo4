<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
    <title>Document</title>
</head>
<body>
    <img src="images/header.jpg" class = slider>
<nav>
    <div class="nav-wrapper amber lighten-1">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Sven.php">Sven</a></li>
            <li><a href="aquarium.php">Aquarium</a></li>
            <?php if (isset($_SESSION['email'])){?>
                <li><a href="admin.php">Admin</a></li>
            <?php } ?>
            <li style="float: right"><a href="register.php">registreer</a></li>
            <?php if (isset($_SESSION['email'])){?>
                <li style="float: right"><a href="logout.php">Log uit</a></li>
            <?php } 
            else {?>
            <li style="float: right"><a href="login.php">Login</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>
<div class="padding">
