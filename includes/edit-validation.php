<?php
//Check if data is valid & generate error if not so
$errors = [];
if ($first == "") {
    $errors[] = 'Voornaam moet worden ingevuld'; //Alternative for errors behind input and not in summary
}
if ($last == "") {
    $errors[] = 'Achternaam moet worden ingevuld';
}
if ($email == "") {
    $errors[] = 'Email moet worden ingevuld';
}
if ($date == "") {
    $errors[] = 'geboortedatum moet worden ingevuld';
}