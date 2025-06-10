<header id="barra_navigazione" <?php if(checkAuth()){ echo "data-login='1'"; }else{ echo "data-login='0'"; } ?>>
    <nav class="navbar">
        <div class="navbar-logo" >
        <a class="gowun-batang-regular" href="index.php">VIKTOR</a>
        <!-- pulsante “leggi di più”, che mostra o nasconde dinamicamente alcuni elementi; -->
        <!-- 6) utilizzare attributi data-* -->
        <div class="hamburger" data-poggia-mouse="0" id="apri_menu"> 
            <span></span>
            <span></span>
            <span></span>
        </div>
        </div>
        <ul class="navbar-menu invisibile_mobile">
            <li><a class="gowun-batang-bold" href="index.php">Lezioni Di Canto</a></li>
            <li><a class="gowun-batang-bold" href="prenotazione.php">Prenota la tua Lezione</a></li>
            <li><a class="gowun-batang-bold" href="contatti.php">Contatti</a></li>
        </ul>
        <?php
            // Verifica se l'utente è autenticato
            if (isset($_SESSION['_agora_user_id'])) {
                echo '
                    <div class="navbar-accesso invisibile_mobile">
                        <a id="pulsante_area_riservata" class="gowun-batang-bold" href="#">Area Riservata</a>
                        <a id="pulsante_logout" class="gowun-batang-bold" href="logout.php">Esci</a>
                    </div>
                ';
            }else{
                echo '
                    <div class="navbar-accesso invisibile_mobile">
                        <a id="pulsante_accedi" class="gowun-batang-bold" href="#">Accedi</a>
                        <a id="pulsante_registrati" class="gowun-batang-bold" href="#">Registrati</a>
                    </div>
                ';
            }
        ?>

    </nav>
</header>  

