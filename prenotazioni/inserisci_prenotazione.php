<?php
    include './../auth.php';
    if(checkAuth()){
        // Connessione al database

        $conn = mysqli_connect($dbconfig["host"], $dbconfig["user"], $dbconfig["password"], $dbconfig["name"]);
        if ($conn === false){
            die(mysqli_connect_error());         
        }
        $id = $_SESSION["_agora_user_id"];
        $descrizione = mysqli_real_escape_string($conn, $_POST["descrizione"]);
        if(!isset($_POST["fascia_oraria"])){
            $fascia_oraria = "";
        }else{
            $fascia_oraria = mysqli_real_escape_string($conn, $_POST["fascia_oraria"]);
        }
        
        $note = mysqli_real_escape_string($conn, $_POST["note"]);
        $query = "INSERT INTO prenotazioni(utente, descrizione, fascia_oraria, note) VALUES('$id', '$descrizione', '$fascia_oraria', '$note')";
        if (mysqli_query($conn, $query)) {
            echo "1";
        } else {
            echo "0";
        }
        mysqli_close($conn);
    }else{
        echo "0";
    }

?>