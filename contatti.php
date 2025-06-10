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
    <link rel="stylesheet" href="contatti.css">
    <link rel="stylesheet" href="modale_login_submit.css">
    <script src="hw1.js" defer></script>
    <script src="modale_login_submit.js" defer></script>
    <script src="prenotazioni/prenotazioni.js" defer></script>
    
</head>
<body>

    <?php
      require_once "barra_navigazione.php"; 
      require_once "modale_login_submit.php"; 
      require_once "area_riservata.php"; 
    ?>

    <div class="box">
        <h1 class="main">Contatti</h1>

        <h1 class="dentro">
            <strong>TikTok:</strong>
            <a href="https://www.tiktok.com/@viktor_v_?_t=8rG7J7C8XNh&_r=1">viktor_v_</a>
        </h1>

        <h1 class="dentro">
            <strong>Instagram:</strong>
            <a href="https://www.instagram.com/viktor_v_official/">viktor_v_official</a>
        </h1>

        <hr>

        <h1 class="main">Servizio Clienti e&nbsp;Management</h1>

        <h1 class="dentro"><strong>Email:</strong> commerciale@viktorv.it</h1>
        <h1 class="dentro"><strong>Cellulare:</strong> +39 XXX XXX XXXX</h1>
    </div>


    
    <?php
      require_once "footer.html";
    ?>


    

</body>
</html>
