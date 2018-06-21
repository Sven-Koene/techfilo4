<?php
require_once "includes/header.php";
require_once "includes/checkregister.php";
?>
    <!--check if there are any errors and print them to the screen -->
<?php if (isset($errors) && !empty($errors)) { ?>
    <ul class="errors">
        <?php for ($i = 0; $i < count($errors); $i++) { ?>
            <li><?= $errors[$i]; ?></li>
        <?php } ?>
    </ul>
<?php }

if (isset($success)) { ?>
    <p class="success">Je bent geregistreerd log nu in op de inlog pagina</p>
<?php } ?>
<br>
<table>
    <form method="post" action="" enctype="multipart/form-data" name="registerForm" onsubmit="return(validate());"<br>
        <tr>
            <td>Voornaam:</td>
            <td><input type="text" name="first" placeholder="Voornaam" value="<?= (isset($first) ? $first : ''); ?>"required/></td>
        </tr>
        <tr>
            <td>Achternaam</td>
            <td><input type="text" name="last" placeholder="Achternaam" value="<?= (isset($last) ? $last : ''); ?>"required/></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input type="email" name="email" placeholder="E-mail"value="<?= (isset($email) ? $email : ''); ?>"required/></td>
        <tr>
            <td>Wachtwoord</td>
            <td><input type="password" name= "password"required>
        </tr>
        <tr>
            <td>Geboorte datum</td>
            <td><input type="date" name="date" min="<?php date("d/m/y") ?>"value="<?= (isset($date) ? $date : ''); ?>"required/></td>
        </tr>
        <tr>
            <td>Captcha</td>
            <td><img id="captcha" src="./securimage/securimage_show.php" alt="CAPTCHA Image" /></td>
        </tr>
        <tr>
            <td>Captcha antwoord</td>
            <td><input type="text" name="captcha_code" size="10" maxlength="6"required /></td>
            <td><a href="#" onclick="document.getElementById('captcha').src = './securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a></td>

        </tr>
        <tr>
            <td><button type="submit" name="submit">Registreer</button></td>
        </tr>
    </form>
</table>
<script type="text/javascript" src="javascript/main.js"></script>
<?php
require_once "includes/footer.php";
?>