<?php
    include './../auth.php';
    if(checkAuth() && !empty($_GET["data_inserimento"])){
        // Connessione al database

        $conn = mysqli_connect($dbconfig["host"], $dbconfig["user"], $dbconfig["password"], $dbconfig["name"]);
        if ($conn === false){
            die(mysqli_connect_error());         
        }
        $id = $_SESSION["_agora_user_id"];
        $data_inserimento = mysqli_real_escape_string($conn, $_GET["data_inserimento"]);

        $query = "DELETE FROM prenotazioni WHERE utente = '$id' AND data_inserimento = '$data_inserimento'";
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