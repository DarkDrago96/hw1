<!-- Meccanismo di registrazione, login, logout degli utenti, con opportuna validazione dei dati (sia lato client che lato server) -->
<?php
    include 'auth.php';



    // Gestisci login o registrazione
    $error_login = array();
    $error_registrazione = array();

    if(isset($_POST["form_login"])){
            // Se email e password sono stati inviati
        if (!empty($_POST["email_login"]) && !empty($_POST["password_login"]) ){
            // CONTROLLA IL FORMATO DELL'EMAIL
            if (!filter_var($_POST['email_login'], FILTER_VALIDATE_EMAIL)) {
                $error_login[] = "Email non valida";
            }else{
                // CONNESSIONE AL DATABASE
                $conn = mysqli_connect($dbconfig["host"], $dbconfig["user"], $dbconfig["password"], $dbconfig["name"]);
                if ($conn === false){
                    die(mysqli_connect_error());         
                }
                $email = mysqli_real_escape_string($conn, $_POST['email_login']);
                // ID e Username per sessione, password per controllo
                $query = "SELECT * FROM utenti WHERE email = '".$email."'";
                // Esecuzione
                $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;

                if (mysqli_num_rows($res) > 0) {
                    // Ritorna una sola riga, il che ci basta perché l'utente autenticato è solo uno
                    $entry = mysqli_fetch_assoc($res);
                    if (password_verify($_POST['password_login'], $entry['password'])) {

                        // Imposto una sessione dell'utente
                        $_SESSION["_agora_email"] = $email;
                        $_SESSION["_agora_user_id"] = $entry['id'];
                        $_SESSION["nome"] = $entry['nome'];
                        $_SESSION["cognome"] = $entry['cognome'];
                        header('Location: '.$_SERVER['REQUEST_URI']);
                        mysqli_free_result($res);
                        mysqli_close($conn);
                        exit;
                    }
                }
                // Se l'utente non è stato trovato o la password non ha passato la verifica
                $error_login[] = "Username e/o password errati.";
            }

        }
        else if (isset($_POST["username"]) || isset($_POST["password"])) {
            // Se solo uno dei due è impostato
            $error = "Inserisci username e password.";
        }

        // REGISTRAZIONE IN CORSO
    }elseif(isset($_POST["form_registrazione"])){
        // CONTROLLO CHE I DATI ESISTANO
        if (!empty($_POST["nome"]) && !empty($_POST["cognome"]) && !empty($_POST["email"]) && !empty($_POST["phone"]) && 
        !empty($_POST["password"]) && !empty($_POST["conferma_password"])){
            // CONNESSIONE AL DATABASE
            $conn = mysqli_connect($dbconfig["host"], $dbconfig["user"], $dbconfig["password"], $dbconfig["name"]);   
            if ($conn === false){
                die(mysqli_connect_error());         
            }
            # VERIFICA CHE L'EMAIL NON ESISTA GIA'
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error_registrazione[] = "Email non valida";
            } else {
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                // Cerco se l'username esiste già o se appartiene a una delle 3 parole chiave indicate
                $query = "SELECT email FROM utenti WHERE email = '$email'";
                $res = mysqli_query($conn, $query);
                if (mysqli_num_rows($res) > 0) {
                    $error_registrazione[] = "Email già utilizzata";
                }
            }
            # PASSWORD
            if (strlen($_POST["password"]) < 8) {
                $error_registrazione[] = "Caratteri password insufficienti";
            } 
            # CONFERMA PASSWORD
            if (strcmp($_POST["password"], $_POST["conferma_password"]) != 0) {
                $error_registrazione[] = "Le password non coincidono";
            }
            if ($_POST["condizioni"] !== "on"){
                $error_registrazione[] = "E' obbligatorio accettare le Condizioni";
            }


            # REGISTRAZIONE NEL DATABASE
            if (count($error_registrazione) === 0) {
                $nome = mysqli_real_escape_string($conn, $_POST['nome']);
                $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
                $phone = mysqli_real_escape_string($conn, $_POST['phone']);

                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $password = password_hash($password, PASSWORD_BCRYPT);

                $query = "INSERT INTO utenti(nome, cognome, email, phone, password) VALUES('$nome', '$cognome', '$email', '$phone', '$password')";
                
                if (mysqli_query($conn, $query)) {
                    $_SESSION["_agora_email"] = $email;
                    $_SESSION["_agora_user_id"] = mysqli_insert_id($conn);
                    $_SESSION["nome"] = $nome;
                    $_SESSION["cognome"] = $cognome;
                    mysqli_close($conn);
                    header('Location: '.$_SERVER['REQUEST_URI']);
                    exit();
                } else {
                    $error[] = "Errore di connessione al Database";
                }
            }
        }else{
            $error_registrazione = array("Riempi tutti i campi");
        }


    }
    

?>