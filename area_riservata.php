<!-- AREA RISERVATA (modale) -->
<article id="modale_area" >
  <section>
    <!-- TITOLO  -->
    <div id="titolo_area">
      <div>
        <h1>Area riservata</h1>
      </div>
      <!-- pulsante chiusura -->
      <img id="x_modale_area" src="x.svg" alt="" >
    </div>

    <hr>

    <!-- DATI UTENTE -->
    <div id="dati_utente_area">
      <p><strong>Nome:</strong> <span id="u_nome">—</span></p>
      <p><strong>Cognome:</strong> <span id="u_cognome">—</span></p>
      <p><strong>Email:</strong> <span id="u_email">—</span></p>
      <p><strong>Cellulare:</strong> <span id="u_phone">—</span></p>
    </div>

    <hr>

    <!-- LISTA PRENOTAZIONI -->
    <div id="lista_prenotazioni_area">
      <h2>Prenotazioni</h2>
      <p>
        Qui trovi le prenotazioni effettuate.
      </p>
      <ul id="lista_prenotazioni">
        <!-- li generati via JS -->
      </ul>
    </div>
  </section>
</article>

<script>

// popola il modale 
function caricaDatiUtente(u){
  document.getElementById('u_nome').textContent = u.nome;
  document.getElementById('u_cognome').textContent = u.cognome;
  document.getElementById('u_email').textContent = u.email;
  document.getElementById('u_phone').textContent = u.phone;

  const ul = document.getElementById('lista_prenotazioni');
  ul.innerHTML = '';               
  if (u.prenotazioni.length === 0){
    ul.innerHTML = '<li>Nessuna prenotazione.</li>';
  } else {
    for(let riga of u.prenotazioni){
      const li = document.createElement('li');
      li.style.padding = '6px 0';
      riga["data_inserimento"]
      li.innerHTML = "<strong>Data: </strong> "+riga["data_inserimento"].slice(0, 10)+"  -  <strong>Ora: </strong>"+riga["data_inserimento"].slice(11, 16)+"      ";
      a = document.createElement("a");
      a.textContent = "Rimuovi";
      a.href = "#";
      a.dataset["data_inserimento"] = riga["data_inserimento"];
      a.style = "margin: 0 10px";
      a.addEventListener("click", eliminaPrenotazione);
      li.appendChild(a);
      ul.appendChild(li);
    }
  }
}

// Logica 
function apri_modale_area(event, apertura=true) {
    event.preventDefault();
    fetch("prenotazioni/restituisci_dati_area_riservata.php")
    .then(
        function(response){
            return response.json();
        }
    )
    .then(
        function(u){
            caricaDatiUtente(u);
            document.getElementById('modale_area').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
    )
}
// funzione per eliminare prenotazioni
function eliminaPrenotazione(event){
    event.preventDefault();
    const data_inserimento = event.currentTarget.dataset["data_inserimento"];
    fetch("prenotazioni/elimina_prenotazione.php?data_inserimento="+data_inserimento)
    .then(
        function(response){
            return response.text();
        }
    )
    .then(
        function(conferma){
            // lanciamo un altra fetch per aggiornare i dati
            fetch("prenotazioni/restituisci_dati_area_riservata.php")
            .then(
                function(response){
                    return response.json();
                }
            )
            .then(
                function(u){
                    caricaDatiUtente(u);
                }
            )
        }
    )
}

function chiudi_modale_area() {
  document.getElementById('modale_area').style.display = 'none';
  document.body.style.overflow = 'auto';
}
document.getElementById('x_modale_area').addEventListener('click', chiudi_modale_area);
let barra_navigazione = document.querySelector("#barra_navigazione");
if(barra_navigazione.dataset['login']==="1"){
    const pulsante_area_riservata = document.querySelector("#pulsante_area_riservata");
    pulsante_area_riservata.addEventListener("click", apri_modale_area);
}
</script>

