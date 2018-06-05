<?php

session_start();

if (isset($_POST['submit'])) {

    include 'includes/database.php';

    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = $_POST['password'];
    
    //error handlers
    //check if input are empty

    if (empty($email) || empty($password)) {
        header("Location: index.php?login=empty");
        exit();
    } 
    else {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($db, $sql);

        $user = mysqli_fetch_assoc($result);

        if($user) {
            if(password_verify($password, $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['first'] = $user['first'];
                $_SESSION['last'] = $user['last'];
                $_SESSION['email'] = $user['email'];
                header("Location: index.php?login=success");
                exit();
            }
            else {
                $error = "Email and password do not match";
            }
        }
        else {
            $error = "This email does not appear to exist";
        }
    }
}
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
        <input id="email" type="text" name="email" value="<?= isset($email) ? $email : ''?>">
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
<div>
<?= isset($error) ? $error : '' ?>
</div>
</body>
</html>


