<!-- modal LOGIN -->
<article data-show="<?php if(count($error_login) > 0){echo "1";}else{echo "0";} ?>" class="modal-view" id="modale_login">
    <section>
    <div>
        <div class="titolo1_login">
            <h1 class="gowun-batang-regular bordo_login">Accedi</h1>
            <h3 class="gowun-batang-bold colore bordo_login"> Non hai un account? <a id="link_iscriviti" class="colore" href="#">Iscriviti</a></h3>
        </div>
        <div class="titolo2_login">
            <img id="x_modale_login" src="x.svg" width="30" height="30">
        </div>
    </div>
    <hr>
    <form id="id_form_login" class="gowun-batang-bold colore" method="post" action="">
        <?php
            foreach($error_login as $errore){
                echo "<p>".$errore."</p>";
            }
        ?>
        <div>
            <label for="inputemail_login">Email <span id="label_inputemail_login"></span></label>
            <input  type="email" id="inputemail_login" name="email_login" required>
        </div>
        <div>
            <label for="inputpassword_login">Password <span id="label_inputpassword_login"></span></label>
            <input type="password" id="inputpassword_login" name="password_login" required>
        </div>

        <input class="gowun-batang-bold bordo_login colore submit" type='submit' name="form_login" value="Accedi">

    </form>

    </section>
</article> 

<!-- modal ISCRIVITI -->
<article data-show="<?php if(count($error_registrazione) > 0){echo "1";}else{echo "0";} ?>" class="modal-view" id="modale_iscriviti" >
    <section>
    <div>
        <div class="titolo1_login">
            <h1 class="gowun-batang-regular bordo_login">Iscriviti!</h1>
            <h3 class="gowun-batang-bold colore bordo_login"> Hai già un account? <a id="link_accedi" class="colore" href="#">Accedi</a></h3>
        </div>
        <div class="titolo2_login">
            <img id="x_modale_iscriviti" src="x.svg" width="30" height="30">
        </div>
    </div>
    <hr>
    <form id="id_form_registrazione" class="gowun-batang-bold colore" method="post" action="">
        <?php
            foreach($error_registrazione as $errore){
                echo "<p>".$errore."</p>";
            }
        ?> 

        <div>
            <label for="inputnome">Nome <span id="label_nome_iscriviti"></span></label>
            <input  type="text" id="inputnome" name="nome">
        </div>
        <div>
            <label for="inputcognome">Cognome <span id="label_cognome_iscriviti"></span></label>
            <input type="text" id="inputcognome" name="cognome">
        </div>
        <div>
            <label for="inputemail">Email <span id="label_email_iscriviti"></span></label>
            <input type="email" id="inputemail" name="email">
        </div>
        <div>
            <label for="phone">Numero di cellulare <span id="label_phone_iscriviti"></span></label>
            <input type="tel" id="phone" name="phone">
        </div>
        <div>
            <label for="inputpassword">Password <span id="label_password_iscriviti"></span></label>
            <input type="password" id="inputpassword" name="password" >
        </div>
        <div>
            <label for="inputconfermapassword">Conferma Password <span id="label_conferma_password_iscriviti"></span></label>
            <input type="password" id="inputconfermapassword" name="conferma_password" >
        </div>
        <div>
            <div id="div_checkbox1">
                <div>
                    <input type="checkbox" id="inputcondizioni" name="condizioni" >
                </div>
                <label for="inputcondizioni">
                    Dichiaro di aver letto e accettato i <a href="">Termini e Condizioni</a> e la <a href="">Privacy Policy</a>.
                </label>
            </div>

        </div>
        <input id="submit_registrazione" type='submit' name="form_registrazione" class="gowun-batang-bold bordo_login colore submit" value="Iscriviti">

    </form>
    </section>
</article>

