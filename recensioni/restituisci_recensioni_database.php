<?php
    include './../auth.php';
    $conn = mysqli_connect($dbconfig["host"], $dbconfig["user"], $dbconfig["password"], $dbconfig["name"]);
    if ($conn === false){
        die(mysqli_connect_error());         
    }
    // Costruiamo la query
    $query = "SELECT nome, cognome, voto, testo, data_inserimento FROM recensioni INNER JOIN utenti ON recensioni.utente = utenti.id ORDER BY data_inserimento DESC";
    // Esecuzione
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $righe = [];
    while($entry = mysqli_fetch_assoc($res)){
        array_push($righe, $entry);
    }
    

    mysqli_free_result($res);
    mysqli_close($conn);
    // converti in stringa json e invia al client
    echo json_encode($righe);
?>