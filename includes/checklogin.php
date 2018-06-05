<?php
if (isset($_POST['submit'])) {

include 'database.php';

$email = mysqli_real_escape_string($db, $_POST['email']);
$password = $_POST['password'];

//error handlers
//check if input are empty

if (empty($email) || empty($password)) {
    header("Location: ./login.php?login=empty");
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
            header("Location: ./index.php?login=success");
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