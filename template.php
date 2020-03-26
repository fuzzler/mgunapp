<!DOCTYPE html>
<?php

error_reporting(1); // per debug
ini_set('display_errors', 2); // per il debug (potrebbe essere deprecata in php7)

// PHP Requirements
require_once '../conn2db.php';

session_start();

// Reperimento dati dal DB se presenti
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ICON -->
    <link rel="icon" type="image/ico" href="../favicon.ico">
    <!-- BOOTSTRAP STYLE -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- CUSTOM STYLE -->
	<link rel="stylesheet" href="style.css">

    <title>MailGun API Sndr</title>

</head>