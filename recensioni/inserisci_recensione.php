<?php
    include './../auth.php';
    if(checkAuth() && !empty($_POST["voto"]) && !empty($_POST["testo"]) && is_numeric($_POST["voto"]) && $_POST["voto"] >= 0 && $_POST["voto"] <= 5){
        // Connessione al database

        $conn = mysqli_connect($dbconfig["host"], $dbconfig["user"], $dbconfig["password"], $dbconfig["name"]);
        if ($conn === false){
            die(mysqli_connect_error());         
        }
        $id = $_SESSION["_agora_user_id"];
        $voto = mysqli_real_escape_string($conn, $_POST["voto"]);
        $testo = mysqli_real_escape_string($conn, $_POST["testo"]);
        $query = "INSERT INTO recensioni(utente, voto, testo) VALUES('$id', '$voto', '$testo')";
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