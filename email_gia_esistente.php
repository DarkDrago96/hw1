<?php
    require_once 'dbconfig.php';
    // controlla se l'email del login o della registrazione sono state inviate, e scegli quella corretta
    if (!empty($_POST["email"]) ){
        $email = $_POST["email"];
    }else if(!empty($_POST["email_login"])){
        $email = $_POST["email_login"];
    }else{
        echo "-1";
    }

    // CONTROLLA IL FORMATO DELL'EMAIL
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "0"; // EMAIL NON VALIDA
    }else{
        // CONNESSIONE AL DATABASE
        $conn = mysqli_connect($dbconfig["host"], $dbconfig["user"], $dbconfig["password"], $dbconfig["name"]);
        
        $email = mysqli_real_escape_string($conn, $email);
        // ID e Username per sessione, password per controllo
        $query = "SELECT * FROM utenti WHERE email = '".$email."'";
        // Esecuzione
        $res = mysqli_query($conn, $query) or die("-1");
        $num_email = mysqli_num_rows($res);
        if ($num_email === 0) {
            echo "0";
        }elseif ($num_email > 0){
            echo "1";
        }
    }


        
?>