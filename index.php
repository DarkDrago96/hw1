<!-- http://192.168.1.111:12345/1_progetto_php/hw1/index.php -->

<?php
    require_once "init_db.php";
?>


<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Batang:wght@400;700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicoin.ico">

    <link rel="stylesheet" href="hw1.css">
    <link rel="stylesheet" href="area_riservata.css">
    <link rel="stylesheet" href="recensioni/recensioni.css">
    <link rel="stylesheet" href="modale_login_submit.css">
    <script src="hw1.js" defer></script>
    <script src="api/spotify.js" defer></script>

    <script src="api/openai.js" defer></script>
    <script src="modale_login_submit.js" defer></script>
    <script src="recensioni/recensioni.js" defer></script>

    

</head>
<body>


    <!-- navbar  -->
    <?php
      require_once "barra_navigazione.php"; 
      require_once "modale_login_submit.php"; 
      require_once "area_riservata.php"; 
    ?>


    <article class="contenitore">
      <section>
        <h1 class="gowun-batang-regular colore" id="titolo1">Impara a Cantare come un Professionista con Viktor</h1>
        <p class="" >Prima di raccontarti di più sulle mie lezioni, voglio condividere con te un momento speciale: Il video della mia esibizione a cappella su Rai1.</p>
      </section>

      <section>
        <video controls width="100%" poster="immagine_video1.jpg">
          <source src="Vittorio.mp4" type="video/mp4">
          Il tuo browser non supporta la riproduzione video.
        </video>
      </section>


      <section class="" id="div1">
        <p>
          Essere su quel palco, davanti a milioni di telespettatori, è stato uno dei momenti più intensi della mia vita. 
          Quando Marco Liorni ha annunciato il mio nome, il cuore mi batteva fortissimo. 
          Di fronte a me c’erano personaggi importanti come Gugliermo Mariotto, Platinette, Dada Loi..
        </p>
        <p>
          A quel punto ho chiuso gli occhi per un istante ed ho cantato, lasciando che l'emozione mi guidasse. 
          Ogni nota era carica di passione, e quando ho terminato, gli applausi e l'entusiasmo del pubblico sono stati così travolgenti che quasi non riuscivo a crederci.
          Quello è stato uno dei momenti in cui ho compreso più profondamente quanto la musica possa toccare l'anima e far vibrare il cuore.
        </p>
        <p>
          Ed è proprio questa connessione profonda che desidero farti vivere attraverso le mie lezioni. Voglio aiutarti a scoprire e liberare la tua voce, per esprimere emozioni profonde e autentiche.
          Ogni lezione sarà costruita attorno a te e ai tuoi obiettivi, sia che tu abbia bisogno di:
        </p>

        <ul class="classefont" id="ul1">
          <li>Espandere l’estensione e la tecnica vocale</li>
          <li>Valorizzare al meglio la tua timbrica</li>
          <li>Imparare a proteggere la voce e migliorare la resistenza vocale</li>
          <li>Esprimere meglio le tue emozioni attraverso la musica</li>
          <li>Migliorare la tua presenza scenica e trasmettere il tuo carisma</li>
          <li>Migliorare la tua immagine e il tuo stile artistico</li>
        </ul>

        <p class="" id="p1">
          Se senti il desiderio di migliorare questi aspetti, sappi che non sei solo. Molti, come te, hanno affrontato le stesse difficoltà, me compreso, e la buona notizia è che esiste una soluzione.
          So bene cosa significa avere una passione profonda per il canto ma sentirsi come un diamante grezzo, con tanto potenziale ancora da scoprire. 
          Quando ho iniziato il mio percorso musicale, anche io affrontavo queste difficoltà ma attraverso dedizione, pratica costante e sopratutto la giusta guida sono riuscito a superare quegli ostacoli.
        </p>
        <p>
          Nel corso del mio viaggio, mi sono esibito in concerti in tutta Italia e ho avuto l'onore di apparire su Rai1. Condivido regolarmente la mia musica con una comunità di oltre 100.000 persone su TikTok, che seguono i miei video di canto. Queste esperienze mi hanno permesso di comprendere a fondo ciò che realmente funziona nell'arte del canto e nell'insegnamento.
        </p>
        <p>
          Ora tocca a te. Immagina di poter sentire quella stessa emozione! La gioia di liberare la tua voce e di conquistare il pubblico. La sicurezza di sapere che ogni nota che canti viene dal cuore! Autentica, potente e in grado di toccare l’anima di chi ti ascolta. Sentirai la tua voce crescere, prendere forma e colore, diventare uno strumento che comunica chi sei davvero.
          Prova l’euforia di salire su un palco, o semplicemente di cantare davanti a chi ami, sapendo di possedere il controllo completo della tua voce. Ogni esercizio, ogni lezione ti avvicinerà sempre di più alla tua versione migliore, rendendoti capace di esprimere ogni sfumatura delle tue emozioni con grazia e padronanza.
        </p>


        <div class="" id="div_button">
          <a class="classefont" id="a_button" type="button" href="prenotazione.php" >Prenota Ora la tua Lezione!!</a>
        </div>
        <h1 class="gowun-batang-regular" id="titolo2">Il Cammino di un Sogno: Come la Musica Mi Ha Guidato</h1>
      </section>


      <section class="peroverlay" >
        <video class="" controls width="100%" poster="sfondo2.png">
          <source src="video2.mp4" type="video/mp4">
          Il tuo browser non supporta la riproduzione video.
        </video>
        <div class="overlay">overlay testo su video (vale lo stesso per immagini)</div>
      </section>
      
      <!-- Spotify -->
      <section id="spotify">
        <h1 class="gowun-batang-regular colore" id="titolo3">La mia musica su Spotify!</h1>      
      </section>
      <hr style="margin: 15px 0;">

      <!-- Sezione recensioni -->
      <section id="sezione_recensioni">
        <h2>Recensioni</h2>       
        <!-- lista recensioni -->
        <div id="lista_recensioni">

        </div>
        <hr>
        <!-- form -->
        <?php if(checkAuth()){
                  echo '<h3>Scrivi anche tu la tua recensione</h3>
                        <form id="scrivi_recensione">
                          <input name="voto" type="number" id="input_voto" placeholder="Voto (1-5)" min="1" max="5" required>
                          <textarea name="testo" id="text" placeholder="Scrivi la tua recensione..." required></textarea>
                          <span id="info_upload_recensione"></span>
                          <input class="submit_recensione" id="azione_recensione" data-login="1" type="submit" value="Invia la tua Recensione">
                        </form>';
        
              }else{echo '<div id="div_accedi_recensione">
                              <button id="azione_recensione" data-login="0" >Accedi per scrivere la tua recensione</button>
                          </div>';
                    }  
        ?>
      </section>
    </article>





    <section id="assistente" class="assistenteAperto">
      <div id="assistente-figlio">
        <div id="titoloAssistente">
          <h3>Hai bisogno di aiuto?<br>Chiedi al nostro Assistente</h3>
          <span id="chiudiAssistente"><h1>-</h1></span>
        </div>
        <hr>
        <div id="messaggi">
          <h4 class="assistenza">Ciao come posso aiutarti?</h4>
        </div>
        <div id="chat" >
          <textarea name="" id=""></textarea>
          <button>Invia</button>
        </div>
      </div>
      <img id="icoAssistente" src="icoAssistente.png" alt="">
    </section>


    <?php
      require_once "footer.html";
    ?>











</body>
</html>

