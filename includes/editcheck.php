<?php
//Require database in this file & image helpers
require_once "database.php";


//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $userId = mysqli_real_escape_string($db, $_POST['id']);
    $first = mysqli_real_escape_string($db, $_POST['first']);
    $last = mysqli_real_escape_string($db, $_POST['last']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $email = mysqli_real_escape_string($db, $_POST['email']);

    //Require the form validation handling
    require_once "edit-validation.php";

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