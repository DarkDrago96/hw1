// Per "La home page deve mostrare contenuti caricati asincronamente accedendo tramite API REST a pagine PHP del vostro sito"
//     "La home page deve supportare meccanismi di interazione con l’utente tramite JavaScript e richieste asincrone, finalizzate al salvataggio su database di informazioni inserite dall’utente"
//     "In generale, sarà oggetto di valutazione l’uso di richieste asincrone tramite JavaScript al posto di ricaricamenti della pagina"

// Incorpora recensioni nel html
function incorporaRecensione(nome_cognome, voto, testo){
    const lista_recensioni = document.querySelector("#lista_recensioni");
    const div = document.createElement("div");
    // compiliamo il titolo
    div.classList.add("singola_recensione");
    const span = document.createElement("span");
    let titolo = nome_cognome + " ";
    for(let i = 0; i<Number(voto); i++){
        titolo = titolo + "★";
    }
    span.textContent = titolo;
    // compiliamo il testo della recensione
    const p = document.createElement("p");
    p.textContent = testo;
    // incorporiamo gli elementi
    div.appendChild(span);
    div.appendChild(p);
    lista_recensioni.appendChild(div);
}
// CARICA RECENSIONI DAL DATABASE
function caricaRecensioni(){
    fetch("recensioni/restituisci_recensioni_database.php")
        .then(
            function(response){
                return response.json();
            }
        )
        .then(
            function(json){
                const lista_recensioni = document.querySelector("#lista_recensioni");
                lista_recensioni.innerHTML = "";
                if(json.length > 0){
                    for(let riga of json){
                        incorporaRecensione(riga["nome"]+" "+riga["cognome"], riga["voto"], riga["testo"])
                    }
                }else{
                    p = document.createElement("p");
                    p.textContent = "Attualmente non ci sono recensioni";
                    p.style = "text-align: center";
                    lista_recensioni.appendChild(p);
                }
            }
        )
}
caricaRecensioni();
// INSERIMENTO RECENSIONE
function inviaRecensione(event){
    event.preventDefault();
    let form = document.querySelector("#scrivi_recensione");
    const form_data = {method: 'post', body: new FormData(form)};
    fetch("recensioni/inserisci_recensione.php", form_data).then(function(resp){
    return resp.text();
    })
    .then(function(text){
    const info_upload_recensione = document.querySelector("#info_upload_recensione");
    if(text === "1"){
        info_upload_recensione.style.display = "inline-block";
        info_upload_recensione.textContent = "La tua recensione è stata inserita con successo!";
        info_upload_recensione.style.color = "green";
        caricaRecensioni();
    }else{
        info_upload_recensione.style.display = "inline-block";
        info_upload_recensione.textContent = "Si è verificato un problema";
        info_upload_recensione.style.color = "red";
    }
    })
}
function login(event){
    event.preventDefault();
    apri_modale_login();
}

const azione_recensione = document.querySelector("#azione_recensione");
if(azione_recensione.dataset["login"] === "1"){
    azione_recensione.addEventListener("click", inviaRecensione);
}else{
    azione_recensione.addEventListener("click", login);
}