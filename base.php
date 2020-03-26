<?php
require_once 'template.php';

?>
<body>

    <div class="container-fluid">
        <div class="row">

            <div class="col-2"></div>

            <div class="col-8">
            
                <h1>MailGun Dev Tools</h1>

                <details>
                    <summary>
                        <h3>HowTo: Mandare e-mail con Postman</h3>
                    </summary>
                    <ol>
                        <li>
                            <p class="args">Authorization</p>
                            <ul>
                                <li>Username: api</li>
                                <li>Password: &lt;YOUR_API_KEY&gt;</li>
                            </ul>
                        </li>

                        <li>
                            <p class="args">Url:</p> 
                            <p> https://api.mailgun.net/v3/&lt;DOMAIN&gt;/messages (DOMAIN = <code>sandboxc74835c...49.mailgun.org</code> ) </p>
                                    
                        </li>
                        <li><span class="args">Method: </span> POST</li>
                        <li>
                            <p class="args">form-url-encoded (body)</p>
                            <ul>
                                <li>from:  &lt; Inserire email anche fasulla &gt; </li>
                                <li>to:  &lt; Inserire email dell'account MailGun (a meno che non sia utente Premium ) &gt; </li>
                                <li>subject:  &lt; Soggetto della email &gt; </li>
                                <li>text:  &lt; Testo del messaggio &gt; </li>
                            </ul>
                        </li>
                    </ol>
                </details>
            
            </div>

            <div class="col-2"></div>
        
        </div> <!-- Fine DIV ROW 1 -->

        <!-- ROW 2 ----------------------------------------------------------------------- -->
        <div class="row"> 

            <div class="col-2"></div> <!-- Fine DIV Col-2 -->

            <div class="col-8">

            <?php

            if(isset($_SESSION['email'])) {
                ?>
                <h2>Bentornato, sei loggato con <span style="color:green;"><?=$_SESSION['email']?></span></h2>
                <p>Per inviare e-mail con MailGun clicca 
                <a href="mailgun.php">QUI</a>
                </p>
                <p>Per effettuare il logout invece clicca  
                <a href="reset.php">QUI</a>
                </p>
                <?php
            }
            else {
                ?>
                <p class="redbold"><?=(isset($_SESSION['err_mess_email']))?$_SESSION['err_mess_email']:""?></p>
                <h3>Hai un account MailGun?</h3>
                <p>Inserisci la tua email:</p>
                
                <form action="login.php" method="POST">
                    <input type="text" name="email" placeholder="Inserisci email" required>
                    <button type="submit" name="login">VAI!</button>
                </form>
                <p>
                Non sei registrato? Puoi farlo da 
                <a href="register.php">QUI</a>
                </p>
                <?php
            }

                
            ?>

            </div> <!-- Fine DIV Col-8 -->

            <div class="col-2"></div> <!-- Fine DIV Col-2 -->

        </div> <!-- Fine DIV Row (2) -->



    </div> <!-- Fine DIV Container -->

</body>