<?php
require_once "includes/header.php";
require_once "includes/checklogin.php";

?>

<div><span><?= isset($errors['general']) ? $errors['general'] : '' ?></span></div>
<form action=<?= $_SERVER['REQUEST_URI']; ?> method="post">
    <div>
        <label for="email">Email</label>
        <input id="email" type="text" name="email" value="<?= isset($email) ? $email : ''?>" required>
        <span><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
    </div>
    <div>
        <label for="password">password</label>
        <input id="password" type="password" name="password" value="" required>
        <span><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
    </div>
    <div>
        <input type="submit" name="submit" value="login">
    </div>
</form>
<div>
<?= isset($error) ? $error : '' ?>
</div>
<?php
require_once "includes/footer.php";
?>
