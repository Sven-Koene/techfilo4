<?php
require_once "includes/header.php";
//Require database in this file & image helpers
require_once "includes/database.php";


//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $userId = mysqli_real_escape_string($db, $_POST['id']);
    $first = mysqli_real_escape_string($db, $_POST['first']);
    $last = mysqli_real_escape_string($db, $_POST['last']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $email = mysqli_real_escape_string($db, $_POST['email']);

    //Require the form validation handling
    require_once "includes/edit-validation.php";

    //Save variables to array so the form won't break
    $user = [
        'first' => $first,
        'last' => $last,
        'date' => $date,
        'email' => $email
    ];

    if (empty($errors)) {
        //Update the record in the database
        $query = "UPDATE users
                  SET `first` = '$first',
                  `last` = '$last',
                  `date` = '$date',
                  `email` = '$email'
                  WHERE `id` = '$userId'";
        $result = mysqli_query($db, $query);

        if ($result) {
            //Set success message
            $success = true;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }
    }
} else {
    //Retrieve the GET parameter from the 'Super global'
    $userId = $_GET['id'];

    //Get the record from the database result
    $query = "SELECT * FROM users WHERE id = " . mysqli_escape_string($db, $userId);
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
}

//Close connection
mysqli_close($db);
?>

<h1>Edit "<?= $user['first'] . ' ' . $user['last']; ?>"</h1>
<?php if (isset($errors) && !empty($errors)) { ?>
    <ul class="errors">
        <?php for ($i = 0; $i < count($errors); $i++) { ?>
            <li><?= $errors[$i]; ?></li>
        <?php } ?>
    </ul>
<?php } ?>

<?php if (isset($success)) { ?>
    <p class="success">De user is bijgewerkt</p>
<?php } ?>

<form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
    
    <div class="data-field">
        <label for="first">Voornaam</label>
        <input id="first" type="text" name="first" value="<?= $user['first']; ?>"/>
    </div>
    <div class="data-field">
        <label for="last">Achternaam</label>
        <input id="last" type="text" name="last" value="<?= $user['last']; ?>"/>
    </div>
    <div class="data-field">
        <label for="date">Geboortedatum</label>
        <input id="date" type="text" name="date" value="<?= $user['date']; ?>"/>
    </div>
    <div class="data-field">
        <label for="email">Email adres</label>
        <input id="email" type="email" name="email" value="<?= $user['email']; ?>"/>
    </div>

    <div class="data-submit">
        <input type="hidden" name="id" value="<?= $userId; ?>"/>
        <input type="submit" name="submit" value="Save"/>
    </div>
</form>
<div>
    <a href="admin.php">Terug naar het overzicht.</a>
</div>
</body>
</html>