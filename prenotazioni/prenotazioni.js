// Per "Le pagine oltre la home page sono a vostra scelta, col vincolo che l’eventuale caricamento di contenuti debba sempre avvenire tramite API REST in maniera asincrona."
//     "In generale, sarà oggetto di valutazione l’uso di richieste asincrone tramite JavaScript al posto di ricaricamenti della pagina"

// INSERIMENTO PRENOTAZIONE
function inviaPrenotazione(event){
    event.preventDefault();
    let form_prenotazione_lezione = document.querySelector("#form_prenotazione_lezione");
    const form_data = {method: 'post', body: new FormData(form_prenotazione_lezione)};
    fetch("prenotazioni/inserisci_prenotazione.php", form_data).then(function(resp){
        return resp.text();
    })
    .then(function(text){
        console.log(text);
        const info_upload_prenotazione = document.querySelector("#info_prenotazione");
        if(text === "1"){
            info_upload_prenotazione.textContent = "La tua prenotazione è stata inserita con successo! Visita l'Area Riservata per controllare le tue prenotazioni";
            info_upload_prenotazione.style.color = "green";
        }else{
            info_upload_prenotazione.textContent = "Si è verificato un problema";
            info_upload_prenotazione.style.color = "red";
        }
    })
}
function login(event){
    event.preventDefault();
    apri_modale_login();
}

const submit_prenotazione = document.querySelector("#submit_prenotazione");
if(submit_prenotazione.dataset["login"] === "1"){
    submit_prenotazione.addEventListener("click", inviaPrenotazione);
}else{
    submit_prenotazione.addEventListener("click", login);
}