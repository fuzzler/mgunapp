<?php
require_once 'template.php';
//require '../conn2db.php';

$email = $_POST['email'];

$query = "SELECT * FROM mgun_usrdata WHERE email = :email;";

$stmt = $dbo->prepare($query);
$stmt->bindParam(':email',$email);
$stmt->execute();

// Se non ci sono dati nel DB chiedi registrazione

if($stmt->rowCount() > 0) {
    $usrData = $stmt->fetchAll(PDO::FETCH_ASSOC); // dati grezzi utente
    
    $_SESSION['domain'] = $usrData[0]['domain'];
    $_SESSION['apikey'] = $usrData[0]['apikey'];
    $_SESSION['email'] = $email;

    //var_dump($_SESSION);
    header('Location: mailgun.php');
}
else {
    //var_dump($_POST);
    $_SESSION['err_mess_email'] = "Non hai dati salvati nel Database! Registrati cliccando ";
    $_SESSION['err_mess_email'].= "<a href=\"register.php\">QUI</a>";
    header('Location: base.php');
} 

