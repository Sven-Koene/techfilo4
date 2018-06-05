<?php
//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Require database in this file & image helpers
    require_once "database.php";

    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $first = mysqli_real_escape_string($db, $_POST['first']);
    $last = mysqli_escape_string($db, $_POST['last']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['email']);
    $date = mysqli_escape_string($db, $_POST['date']);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    //Require the form validation handling
    require_once "register-validation.php";

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