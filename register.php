<?php
//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Require database in this file & image helpers
    require_once "includes/database.php";

    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $first = mysqli_real_escape_string($db, $_POST['first']);
    $last = mysqli_escape_string($db, $_POST['last']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = mysqli_escape_string($db, $_POST['password']);
    $date = mysqli_escape_string($db, $_POST['date']);

    //Require the form validation handling
    require_once "includes/registerValidation.php";

    if (empty($errors)) {

        //Save the record to the database
        $query = "INSERT INTO users
                  (first, last, email, password, date)
                  VALUES ('$first', '$last', '$email', '$password', '$date')";
        $result = mysqli_query($db, $query);

        if ($result) {
            //Set success message & empty all variables for new form
            $first = '';
            $last = '';
            $email = '';
            $password = '';
            $date = '';
            $success = true;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }

        //Close connection
        mysqli_close($db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php if (isset($errors) && !empty($errors)) { ?>
    <ul class="errors">
        <?php for ($i = 0; $i < count($errors); $i++) { ?>
            <li><?= $errors[$i]; ?></li>
        <?php } ?>
    </ul>
<?php } ?>

<?php if (isset($success)) { ?>
    <p class="success">Je bent geregistreerd log nu in op de inlog pagina</p>
<?php } ?>
<form method="post" action=<?= $_SERVER['REQUEST_URI']; ?> enctype="multipart/form-data"<br>
        <input type="text" name="first" placeholder="Voornaam" value="<?= (isset($first) ? $first : ''); ?>"/><br>
        <input type="text" name="last" placeholder="Achternaam" value="<?= (isset($last) ? $last : ''); ?>"/><br>
        <input type="email" name="email" placeholder="E-mail"value="<?= (isset($email) ? $email : ''); ?>"/><br>
        <input type="password" name= "password"><br>
        <input type="date" name="date" min="<?php date("d/m/y") ?>"value="<?= (isset($date) ? $date : ''); ?>"/><br>
        <button type="submit" name="submit">Registreer</button>
    </form>
</body>
</html>