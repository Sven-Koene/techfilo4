<?php
//Require music data & image helpers to use variable in this file
require_once "database.php";

//Retrieve the GET parameter from the 'Super global'
$albumId = $_GET['id'];

//Remove from the database
$query = "DELETE FROM users WHERE id = " . mysqli_real_escape_string($db, $albumId);

mysqli_query($db, $query) or die ('Error: '.mysqli_error($db));

//Close connection
mysqli_close($db);

//Redirect to adminpage after deletion & exit script
header("Location: ../admin.php");
exit;
