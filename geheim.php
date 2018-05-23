<?php
session_start()
if ($_SESSION['email'] == 'email') {

require_once 'includes/database.php';

$query = "SELECT * FROM users";
$result = mysqli_query($db, $query);

if (isset($_GET['delete'])) {
    $delete = "DELETE FROM users WHERE id =" . $_GET['delete'];
    mysqli_query($db, $delete);
    header('location:geheim.php');
//print_r($delete);
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
        <h1>hoi</h1>
    </body>
</html>
<?php
}
?>