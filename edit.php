<?php
require_once "includes/header.php";
require_once "includes/editcheck.php";
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
<?php
require_once "includes/footer.php";
?>