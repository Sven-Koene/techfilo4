<?php
require_once "includes/header.php";

if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit;
}

include "includes/user-data.php";

?>

<table>
    <thead>
    <tr>
        <th>id</th>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Email</th>
        <th>Geboortedatum</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) { ?>
        <tr>
            <td><?= $user['id']; ?></td>
            <td><?= $user['first']; ?></td>
            <td><?= $user['last']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><?= $user['date']; ?></td>
            <td><a href="edit.php?id=<?= $user['id']; ?>">Edit</a></td>
            <td><a href="includes/delete.php?id=<?= $user['id']; ?>">Delete</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php
require_once "includes/footer.php";
?>

