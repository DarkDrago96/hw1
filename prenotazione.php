<?php

    require_once "init_db.php"; // Necessario per il collegamento con il database e per login/register
 
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prenota Lezione con Viktor</title>
    <link rel="icon" type="image/x-icon" href="favicoin.ico">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Batang:wght@400;700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicoin.ico">

    <link rel="stylesheet" href="hw1.css">
    <link rel="stylesheet" href="area_riservata.css">
    <link rel="stylesheet" href="modale_login_submit.css">
    <script src="hw1.js" defer></script>
    <script src="modale_login_submit.js" defer></script>
    <script src="prenotazioni/prenotazioni.js" defer></script>
    

    <style>
        #form_prenotazione_lezione *{
            margin: 3px 0;
        }
        #form_prenotazione_lezione label{
            margin-top: 8px;
            margin-left: 8px;
            font-size: 1.2rem;
        }

    </style>
</head>
<body>

    <?php
      require_once "barra_navigazione.php"; 
      require_once "modale_login_submit.php"; 
      require_once "area_riservata.php"; 
    ?>
    
    <h2 class="gowun-batang-regular colore" style="text-align:center; margin: 20px 0;">Prenota la tua prima lezione di canto</h2>
    <section style="padding:24px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,.1); max-width:600px; margin:auto;">
        <!-- PRENOTAZIONE LEZIONE DI CANTO -->


        <p style="margin:0 auto 12px auto;">
        Compila il modulo qui sotto: verrai ricontattato dal nostro staff
        entro <strong>24&nbsp;ore</strong> al numero di telefono che hai fornito in fase
        di registrazione. Potrai concordare giorno, orario e obiettivi
        della tua lezione introduttiva.
        </p>

        <form id="form_prenotazione_lezione" style="display:flex; flex-direction:column; ">
            <!-- PRESENTAZIONE -->
            <label for="descrizione" style="font-weight:600;">Parlaci un po’ di te</label>
            <textarea <?php if(!checkAuth()){ echo "disabled"; } ?>
                name="descrizione"
                placeholder="Raccontaci la tua esperienza musicale, gli stili che ami e cosa vorresti migliorare…"
                required
                rows="6"
                style="font-size:1rem;padding:10px 12px;border:1px solid #ccc;border-radius:12px;resize:vertical;"></textarea>

            <!-- FASCIA ORARIA -->
            <label for="fascia" style="font-weight:600;">Fascia oraria</label>
            <select name="fascia_oraria" required <?php if(!checkAuth()){ echo "disabled"; } ?>
                    style="font-size:1rem;padding:10px 12px;border:1px solid #ccc;border-radius:12px;">
                <option value="1" disabled selected>Seleziona un intervallo</option>
                <option>09:00 – 12:00</option>
                <option>12:00 – 15:00</option>
                <option>15:00 – 18:00</option>
                <option>18:00 – 21:00</option>
            </select>

            <!-- NOTE AGGIUNTIVE -->
            <label for="note" style="font-weight:600;">Note aggiuntive (facoltative)</label>
            <textarea <?php if(!checkAuth()){ echo "disabled"; } ?>
                name="note"
                placeholder="Es. Disponibile solo nel weekend, preferisco lezione online…"
                rows="3"
                style="font-size:1rem;padding:10px 12px;border:1px solid #ccc;border-radius:12px;resize:vertical;"></textarea>

            <!-- SUBMIT -->
            <input 
                id="submit_prenotazione" 
                type="submit" 
                style="font-size:1rem;padding:10px 12px;border:none;border-radius:12px;background:#e63946;color:#fff;cursor:pointer;"
                <?php if(checkAuth()){ echo "data-login='1' value='Invia richiesta di prenotazione'"; }else{ echo "data-login='0' value='Accedi per effettuare una prenotazione'"; } ?> >
            
            <!-- INFO / ERRORI -->
            <span id="info_prenotazione" style="text-align:center; color:red;"></span>        
        </form>
    </section>

    
    <?php
      require_once "footer.html";
    ?>


    

</body>
</html>
