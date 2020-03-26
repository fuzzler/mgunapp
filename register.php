<div class="container-fluid">
    <div class="row">

        <div class="col-2"></div>

        <div class="col-8">
        <h1>Registrazione</h1>

        <?php
        require_once 'template.php';


        if(isset($_POST['register'])) {

            $query = "INSERT INTO mgun_usrdata (email,domain,apikey) VALUES (:email,:domain,:apikey);";

            $stmt = $dbo->prepare($query);
            $stmt->bindParam(':email',$_POST['email']);
            $stmt->bindParam(':domain',$_POST['domain']);
            $stmt->bindParam(':apikey',$_POST['apikey']);
            $stmt->execute();

            // Se non ci sono dati nel DB chiedi registrazione

            if($stmt->rowCount() > 0) {
                
                echo "<p class=\"validmess txtcenter\">Dati salvati con successo nel Database!</p>";
                $_SESSION['err_mess_email'] =  "";
                //var_dump($_SESSION);
                header('Refresh: 3 url=base.php');
            }
            else {
                //var_dump($_POST);
                $_SESSION['err_mess_email'] = "ERRORE nel salvataggio dei dati: contatta l'amministratore!";
                header('Location: base.php');
            } 

            
            //echo "<h4>DEBUG:</h4><pre>"; var_dump($response); echo "</pre>";
        }
        else {
        ?>
        <form action="" method="POST">

            <table>
                <thead><h3>Salva i tuoi dati:</h3></thead>
                <tr>
                    <td>EMAIL:</td>
                    <td><input type="email" name="email" placeholder="Email destinatario" required></td>
                </tr>
                <tr>
                    <td>DOMAIN:</td>
                    <td><input type="texr" name="domain" placeholder="Domain" required></td>
                </tr>
                <tr>
                    <td>ApiKEY:</td>
                    <td><input type="text" name="apikey" placeholder="Private API KEY" required></td>
                </tr>
                <tr>
                    <td><button type="submit" name="register">INVIA</button></td>
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
</div> <!-- fine container -->
