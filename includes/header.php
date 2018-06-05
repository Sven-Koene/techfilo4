<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Document</title>
</head>
<body>

<!-- misschien met javascript een fotoslider met een foto van iedereen die mee doet? -->
    <img src="images/download.jpg" class = slider>
    
<!-- navbar kan beter gestyled worden als er ideeën zijn -->
    <div class="navbar">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="Sven.php">Sven</a></li>
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
