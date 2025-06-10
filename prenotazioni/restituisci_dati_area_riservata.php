<?php
    include './../auth.php';
    if(checkAuth()){
        $conn = mysqli_connect($dbconfig["host"], $dbconfig["user"], $dbconfig["password"], $dbconfig["name"]);
        if ($conn === false){
            die(mysqli_connect_error());         
        }
        $id = $_SESSION["_agora_user_id"];
        // Costruiamo ed eseguiamo la query 1 per i dati utente
        $query1 = "SELECT nome, cognome, email, phone FROM utenti WHERE id = ".$id;
        $res1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
        $dati_utente = mysqli_fetch_assoc($res1);
        // Costruiamo ed eseguiamo la query 2 per le prenotazioni
        $query2 = "SELECT data_inserimento FROM prenotazioni WHERE utente = '$id' ORDER BY data_inserimento DESC";
        $res2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
        $prenotazioni = array();
        // estraiamo tutte le prenotazioni
        while($riga = mysqli_fetch_assoc($res2)){
            array_push($prenotazioni, $riga);
        }
        $dati_utente["prenotazioni"] = $prenotazioni;
        mysqli_free_result($res1);
        mysqli_free_result($res2);
        mysqli_close($conn);
        // converti in stringa json e invia al client
        echo json_encode($dati_utente);
    }

?>