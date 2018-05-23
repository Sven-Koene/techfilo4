<?php
session_start();
//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Require database in this file & image helpers
    require_once "includes/database.php";

    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $first = mysqli_real_escape_string($db, $_POST['first']);
    $last = mysqli_escape_string($db, $_POST['last']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = $_POST['password'];
    $date = mysqli_escape_string($db, $_POST['date']);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    //Require the form validation handling
    require_once "includes/registerValidation.php";

    if (empty($errors)) {

        //Save the record to the database
        $query = "INSERT INTO users
                  (first, last, email, password, date)
                  VALUES ('$first', '$last', '$email', '$hashedPassword', '$date')";
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
    <script type="text/javascript" src="javascript/main.js"></script>
</head>
<body>
    <!--check if there are any errors and print them to the screen -->
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
<table>
    <form method="post" action=<?= $_SERVER['REQUEST_URI']; ?> enctype="multipart/form-data" name="registerForm" onsubmit="return(validate());"<br>
        <tr>
            <td>Voornaam:</td>
            <td><input type="text" name="first" placeholder="Voornaam" value="<?= (isset($first) ? $first : ''); ?>"/></td><br>
        </tr>
        <tr>
            <td>Achternaam</td>
            <td><input type="text" name="last" placeholder="Achternaam" value="<?= (isset($last) ? $last : ''); ?>"/></td><br>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input type="email" name="email" placeholder="E-mail"value="<?= (isset($email) ? $email : ''); ?>"/></td><br>
        </tr>
        <tr>
            <td>Wachtwoord</td>
            <td><input type="password" name= "password"><br>
        </tr>
        <tr>
            <td>Geboorte datum</td>
            <td><input type="date" name="date" min="<?php date("d/m/y") ?>"value="<?= (isset($date) ? $date : ''); ?>"/></td><br>
        </tr>
        <tr>
            <td><button type="submit" name="submit">Registreer</button></td>
        </tr>
    </form>
</table>
</body>
</html>

