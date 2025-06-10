function apri_modale_login(event){
    let modale_login = document.querySelector("#modale_login");
    modale_login.style.display = "flex";
    document.body.style.overflow = "hidden";
}
function apri_modale_iscriviti(event){
    let modale_iscriviti = document.querySelector("#modale_iscriviti");
    modale_iscriviti.style.display = "flex";
    document.body.style.overflow = "hidden";
}
function chiudi_modale_login(){
    let modale_login = document.querySelector("#modale_login");
    modale_login.style.display = "none";
    document.body.style.overflow = "visible";
}
function chiudi_modale_iscriviti(){
    let modale_iscriviti = document.querySelector("#modale_iscriviti");
    modale_iscriviti.style.display = "none";
    document.body.style.overflow = "visible";
}
let x_iscriviti = document.querySelector("#x_modale_iscriviti");
x_iscriviti.addEventListener("click", chiudi_modale_iscriviti);
let x_login = document.querySelector("#x_modale_login");
x_login.addEventListener("click", chiudi_modale_login);

function click_link_iscriviti(event){
    chiudi_modale_login();
    apri_modale_iscriviti();
    event.preventDefault();
}
let link_iscriviti = document.querySelector("#link_iscriviti");
link_iscriviti.addEventListener("click", click_link_iscriviti);

function click_link_accedi(event){
    chiudi_modale_iscriviti();
    apri_modale_login();
}
let link_login = document.querySelector("#link_accedi");
link_login.addEventListener("click", click_link_accedi);

// Pusante Accedi e Registrati
let pulsante_accedi = document.querySelector("#pulsante_accedi");
if(pulsante_accedi !== null){
    pulsante_accedi.addEventListener("click",apri_modale_login);
}
let pulsante_registrati = document.querySelector("#pulsante_registrati");
if(pulsante_registrati !== null){
    pulsante_registrati.addEventListener("click", apri_modale_iscriviti);
}

// Se necessario fai apparire il modale registrazione/login
let modale_login = document.querySelector("#modale_login");
let modale_iscriviti = document.querySelector("#modale_iscriviti");
if (modale_login.dataset["show"] === "1"){
    apri_modale_login();
}else if(modale_iscriviti.dataset["show"] === "1"){
    apri_modale_iscriviti();
}
// CONTROLLI SUL INPUT REGISTRAZIONE
function email_gia_esistente(){  
    const inputemail = document.querySelector('#inputemail');
    formStatus[inputemail.name] = false;
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(inputemail.value).toLowerCase())) {
        let label_nome_iscriviti = document.querySelector("#label_email_iscriviti");  
        label_nome_iscriviti.style.color = "red";
        label_nome_iscriviti.textContent = "Email non valida";
    } else { // se l'email è valida
        let form = document.querySelector("#id_form_registrazione");
        const form_data = {method: 'post', body: new FormData(form)};
        fetch("email_gia_esistente.php", form_data).then(function(resp){
            return resp.text();
        })
        .then(function(text){
            let label_nome_iscriviti = document.querySelector("#label_email_iscriviti");
            if(text === "1"){
                label_nome_iscriviti.textContent = "  -  L'email esiste già";
                label_nome_iscriviti.style.color = "red";
            }else if(text === "0"){
                label_nome_iscriviti.textContent = "  -  Email disponibile!";
                label_nome_iscriviti.style.color = "green";
                formStatus[inputemail.name] = true;
            }else{
                label_nome_iscriviti.textContent = "  -  Si è verificato un problema";
                label_nome_iscriviti.style.color = "red";
            }
        })
    }
}
function checkNome(event) {
    const label_nome_iscriviti = document.querySelector('#label_nome_iscriviti');
    if(formStatus.nome = /^[a-zA-Z]{1,15}$/.test(event.currentTarget.value)){
        label_nome_iscriviti.textContent = "Nome valido";
        label_nome_iscriviti.style.color = "green";
    } else {
        label_nome_iscriviti.textContent = "Nome non valido";
        label_nome_iscriviti.style.color = "red";
    }
}
function checkCognome(event) {
    const label_cognome_iscriviti = document.querySelector('#label_cognome_iscriviti');
    if(formStatus.cognome = /^[a-zA-Z]{1,15}$/.test(event.currentTarget.value)){
        label_cognome_iscriviti.textContent = "Cognome valido";
        label_cognome_iscriviti.style.color = "green";
    } else {
        label_cognome_iscriviti.textContent = "Cognome non valido";
        label_cognome_iscriviti.style.color = "red";
    }
}
function checkPhone(event) {
    const label_phone_iscriviti = document.querySelector('#label_phone_iscriviti');
    if(formStatus.phone = /^[0-9+\s]{10,20}$/.test(event.currentTarget.value)){
        label_phone_iscriviti.textContent = "Numero valido";
        label_phone_iscriviti.style.color = "green";
    } else {
        label_phone_iscriviti.textContent = "Numero non valido";
        label_phone_iscriviti.style.color = "red";
    }
}
function checkPassword(event) {
    const label_password_iscriviti = document.querySelector("#label_password_iscriviti");
    if (formStatus.password = event.currentTarget.value.length >= 8) {
        label_password_iscriviti.textContent = "Formato password valido";
        label_password_iscriviti.style.color = "green";
    } else {
        label_password_iscriviti.textContent = "Inserisci almeno 8 caratteri";
        label_password_iscriviti.style.color = "red";
    }
}

function checkConfirmPassword(event) {
    const label_conferma_password_iscriviti = document.querySelector("#label_conferma_password_iscriviti");
    if (formStatus.confirmPassord = event.currentTarget.value === document.querySelector('#inputpassword').value) {
        label_conferma_password_iscriviti.textContent = "Corrisponde";
        label_conferma_password_iscriviti.style.color = "green";
    } else {
        label_conferma_password_iscriviti.textContent = "non corrispondono";
        label_conferma_password_iscriviti.style.color = "red";
    }
}

// controllo sulla submit
function checkSignup(event) {
    const checkbox = document.querySelector('#inputcondizioni');
    formStatus[checkbox.name] = checkbox.checked;
    if (Object.keys(formStatus).length !== 7 || Object.values(formStatus).includes(false)) {
        event.preventDefault();
    }
}

formStatus = {};
let inputemail = document.querySelector("#inputemail");
inputemail.addEventListener("blur", email_gia_esistente)
document.querySelector('#inputnome').addEventListener('blur', checkNome);
document.querySelector('#inputcognome').addEventListener('blur', checkCognome);
document.querySelector('#phone').addEventListener('blur', checkPhone);
document.querySelector('#inputpassword').addEventListener('blur', checkPassword);
document.querySelector('#inputconfermapassword').addEventListener('blur', checkConfirmPassword);
document.querySelector('#id_form_registrazione').addEventListener('submit', checkSignup);

//CONTROLLI SUL LOGIN


function esistenzaEmail(){  
    const inputemail_login = document.querySelector('#inputemail_login');
    formStatus_login[inputemail_login.name] = false;
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(inputemail_login.value).toLowerCase())) {
        let label_inputemail_login = document.querySelector("#label_inputemail_login");  
        label_inputemail_login.style.color = "red";
        label_inputemail_login.textContent = "Email non valida";
    } else { // se l'email è valida
        let form = document.querySelector("#id_form_login");
        const form_data = {method: 'post', body: new FormData(form)};
        fetch("email_gia_esistente.php", form_data).then(function(resp){
            return resp.text();
        })
        .then(function(text){
            let label_inputemail_login = document.querySelector("#label_inputemail_login");
            if(text === "1"){
                label_inputemail_login.textContent = "  -  Ok!";
                label_inputemail_login.style.color = "green";
                formStatus_login[inputemail_login.name] = true;
            }else if(text === "0"){
                label_inputemail_login.textContent = "  -  Email non esistente";
                label_inputemail_login.style.color = "red";
            }else{
                label_inputemail_login.textContent = "  -  Si è verificato un problema";
                label_inputemail_login.style.color = "red";
            }
        })
    }
}

function checkPasswordLogin(event) {
    const label_inputpassword_login = document.querySelector("#label_inputpassword_login");
    if (formStatus_login.password = event.currentTarget.value.length >= 8) {
        label_inputpassword_login.textContent = "  -  Ok!";
        label_inputpassword_login.style.color = "green";
    } else {
        label_inputpassword_login.textContent = "  -  Inserisci almeno 8 caratteri";
        label_inputpassword_login.style.color = "red";
    }
}

function checkSignupLogin(event) {
    const checkbox = document.querySelector('#inputcondizioni');
    if (Object.keys(formStatus_login).length !== 2 || Object.values(formStatus_login).includes(false)) {
        event.preventDefault();
    }
}

formStatus_login = {};
let inputemail_login = document.querySelector("#inputemail_login");
inputemail_login.addEventListener("blur", esistenzaEmail);
document.querySelector('#inputpassword_login').addEventListener('blur', checkPasswordLogin);
document.querySelector('#id_form_login').addEventListener('submit', checkSignupLogin);
