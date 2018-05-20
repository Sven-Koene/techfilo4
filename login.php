<?php
session_start(); 

if(isset($_SESSION) && $_SESSION['lastActive']>time()+60*15){ // er is een sessie EN je bent in laatste 15 min actief geweest 
    $_SESSION['lastActive']=time(); // Je klikte, dus laatst actief updaten 
    header("Location: index.php"); // Doorverwijzen naar je ingelogde pagina 
    exit; //en netjes je header sluiten 
    }

    if(isset($_POST['submit'])){ // er is op de loginknop gedrukt 
        if(empty($_POST['email'])){echo"Je hebt geen e-mail ingevuld!";} 
    elseif (empty($_POST['password'])){echo"Je hebt geen wachtwoord ingevuld!";} 
    else{ //dus netjes ingevuld 
      $sLid = mysql_query("SELECT id,email FROM users  
                           WHERE email='".$_POST['email']."' AND password='".md5($_POST['password'])."' 
                           LIMIT 1") or die(mysql_error()); 
    if(mysql_num_rows($sLid)==0){echo"Deze inlog gevens zijn incorrect!";}/// Niet vertellen wat er fout is, alleen dat het fout is, ivm 'hackers' 
    else{ 
      $fLid = mysql_fetch_assoc($sLid); //haal de gegevens op van het lid  
      $_SESSION['user_id'] = $fLid['id']; // De id die we hebben gevonden doorgeven aan een sessie waarde, want die onthoud het 
      $_SESSION['user_naam'] = $fLid['naam']; // Ook een naam mee geven, niet verplicht,wel handig 
      $_SESSION['lastActive'] = time(); // je bent actief, dus tijd opslaan 
      header("Location: main.php"); // je bent ingelogd nu, dus door verwijzen naar de ingelogd pagina 
      exit; // en weer netjes je header sluiten  
      }//--einde wel bestaan  
    }//--einde netjes ingevuld  
  }//--einde van de if inlogsubmit
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=	, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    E-mail<input type="text" name="email" placeholder="email"><br>
    Wachtwoord<input type="password" name="password"><br>
    <button type="submit" name="submit">Login</button>
</form>
</body>
</html>
