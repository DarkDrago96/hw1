<?php
    // UTILIZZO DI API REST DA PHP
    header('Content-Type: application/json');
    // 1) Prendo il JSON inviato da JS
    $raw = file_get_contents('php://input');
    $messaggi = json_decode($raw, true);
    $payload = array("model" => "gpt-4.1-nano", "messages" => $messaggi);
    $payload = json_encode($payload);
    
    $curl = curl_init();                                // LIBRERIA CURL. Istanziamo un oggetto della libreria curl_init che ci permettera di fare richieste API 
    curl_setopt($curl, CURLOPT_URL,                     // IMPOSTA URL.
    "https://api.openai.com/v1/chat/completions"
    );    
    curl_setopt($curl, CURLOPT_POST, 1);                // METODO POST. Impostiamo la request API REST con il metodo post
    curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);   // INSERIAMO IL BODY. nel 3° parametro mettiamo il body della request post
    $headers = array("Content-Type: application/json",
    "Authorization: Bearer secret");
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);   // IMPOSTIAMO HEADER. nel 3° parametro impostiamo l'header della request post
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl); 
    echo $result;
?>