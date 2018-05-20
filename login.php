<?php
session_start();
require_once 'includes/database.php';
if (isset($_POST['submit'])) {
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);

$errors = [];
if ($email == '') {
    $errors['email'] = 'Email mag niet leeg zijn';
}
if ($password == '') {
    $errors['password'] = 'Password mag niet leeg zijn';
}

$query = "SELECT * FROM users WHERE email = '$email'"; // AND password = '$password'
$result = mysqli_query($db, $query);

$user = mysqli_fetch_assoc($result);

if ($user) {
    $hash = $user['password'];
    // $isAdmin = $row['isAdmin'];

    if (password_verify($_POST['password'], $hash)) {
        $_SESSION['email'] = $_POST['email'];
        // doorsturen naar welkomspagina
        header('location: secure.php');
        exit;
    }
    } else {
        echo 'Login failed';
    }
}
   if ($user) {
       $_SESSION['email'] = $email['email'];
       // doorsturen naar welkomspagina
       header('location: geheim.php');
       exit;
   }
//    else {
//        $errors ['general'] = 'combinatie email en password klopt niet';
//    }
// }     

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
<div><span><?= isset($errors['general']) ? $errors['general'] : '' ?></span></div>
<form action="" method="post">
    <div>
        <label for="email">Email</label>
        <input id="email" type="text" name="email" value="">
        <span><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
    </div>
    <div>
        <label for="password">password</label>
        <input id="password" type="password" name="password" value="">
        <span><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
    </div>
    <div>
        <input type="submit" name="submit" value="login">
    </div>
</form>
</body>
</html>


