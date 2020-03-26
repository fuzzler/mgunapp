<div class="container-fluid">
    <div class="row">

        <div class="col-2"></div>

        <div class="col-8">
        <h1>Invia E-Mail con MailGun</h1>

<?php
// Here starts Program PHP code ########################################################

require 'vendor/autoload.php';
require 'template.php';

use Mailgun\Mailgun;




if(isset($_SESSION['apikey']) && isset($_SESSION['domain'])) {
    // Per rendere le stringhe illeggibili in chiaro
    //$apikey = substr($_SESSION['apikey'],0,3)."...".substr($_SESSION['apikey'],-3); 
    //$domain = substr($_SESSION['domain'],0,3)."...".substr($_SESSION['domain'],-3);
    
    $email = $_SESSION['email'];
    $domain = $_SESSION['domain'];
    $apikey = $_SESSION['apikey'];

}
else {
    // Per richiedere l'autenticazione
    //$_SESSION['err_mess_email'] = "Devi essere autenticato per inviare email con MailGun!";
    //header('Location: base.php');

    $email = "";
    $domain = "";
    $apikey = "";
}

//echo "<h4>DEBUG:</h4><pre>"; var_dump($_SESSION); echo "</pre>";

if(isset($_POST['sendmail'])) {

    // Instantiate the client.
    $mgClient = Mailgun::create($_SESSION['apikey'], 'https://api.mailgun.net/v3/');
    //$mgClient = new Mailgun ($_SESSION['apikey']);
    $domain = $_SESSION['domain'];
    
    $params = array(
    'from'    => $_POST['from'],
    'to'      => $_POST['to'],
    'subject' => $_POST['sub'],
    'text'    => $_POST['mess']
    );
    

    // Make the call to the client.
    $response = $mg->messages()->send($domain, $params);
    //$response = $mgClient->sendMessage($domain, $params); // conf indicata n

    echo "<h4>DEBUG:</h4><pre>"; var_dump($response); var_dump($mg); echo "</pre>";
}
else {

?>
<form action="" method="POST">

    <table>
        <thead><h3>Invia Email con MailGun:</h3></thead>
        <tr>
            <td>DOMAIN:</td>
            <td><input type="texr" name="domain" placeholder="Domain" value="<?= $domain ?>" required></td>
        </tr>
        <tr>
            <td>ApiKEY:</td>
            <td><input type="text" name="apikey" placeholder="Private API KEY" value="<?= $apikey ?>" required></td>
        </tr>
        <tr>
            <td>FROM:</td>
            <td><input type="email" name="from" placeholder="Email mittente" required></td>
        </tr>
        <tr>
            <td>TO:</td>
            <td><input type="email" name="to" placeholder="Email destinatario" value="<?= $email ?>" required></td>
        </tr>
        <tr>
            <td>SUBJECT:</td>
            <td><input type="text" name="sub" placeholder="Soggetto" ></td>
        </tr>
        <tr>
            <td> MESSAGE: </td>
            <td><textarea name="mess" rows="4" cols="50">Il tuo messaggio </textarea></td>
        </tr>
        <tr>
            <td><button type="submit" name="sendmail">INVIA</button></td>
            <td></td>
        </tr>
    </table>

</form>

<?php
} // fine else sendmail
?>
        
        </div>

        <div class="col-2"></div>

    </div> <!-- Fine DIV ROW 1 -->

    <div class="row">

            <div class="col-2">
                <a href="base.php">Torna indietro</a>
            </div>

            <div class="col-8"></div>

        <div class="col-2"></div>

    </div> <!-- Fine DIV ROW 1 -->
</div> <!-- fine container -->
