
// API REST per chatbot OpenAI
let messaggi = [
                    {
                        role: "system",
                        content: "Tu sei un assistente per un sito che vende lezioni di canto"
                    },
                    {
                        role: "assistant",
                        content: "Ciao come posso aiutarti?"
                    }
                ];
function chatta(){
  const boxMessaggi = document.querySelector("#messaggi");
  const nuovoMessaggioUtente = document.querySelector("#chat textarea").value;
  document.querySelector("#chat textarea").value = "";
  messaggi.push({
                    role: "user",
                    content: nuovoMessaggioUtente
                });
  const elementoMsgUtente = document.createElement("h4");
  elementoMsgUtente.classList.add("utente");
  elementoMsgUtente.textContent = nuovoMessaggioUtente;
  boxMessaggi.appendChild(elementoMsgUtente);

  // USA API REST
  let rispostaAssistente;
    fetch("api/openai.php", {
        method: "post",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(messaggi)
    })
    .then(
        function(response){
            return response.json();         
        }
    )
    .then(
        function(datiJson){ 
            rispostaAssistente = datiJson;  
            let role = rispostaAssistente.choices[0].message.role;
            messaggi.push({
                role: rispostaAssistente.choices[0].message.role,
                content: rispostaAssistente.choices[0].message.content
            })
            const elementoMsgAssistente = document.createElement("h4");
            elementoMsgAssistente.classList.add("assistenza");
            elementoMsgAssistente.textContent = rispostaAssistente.choices[0].message.content;
            boxMessaggi.appendChild(elementoMsgAssistente); 
        }
    )
}


const invia = document.querySelector("#chat button");
invia.addEventListener("click", chatta);

// Chiusura - Apertura Assistente
const chiudiAssistente = document.querySelector("#chiudiAssistente");
const icoAssistente = document.querySelector("#icoAssistente");
  // Chiusura
function chiudi(){
  const assistente = document.querySelector("#assistente");
  assistente.classList.remove("assistenteAperto");
  assistente.classList.add("assistenteChiuso");
  const assistenteFiglio = document.querySelector("#assistente-figlio");
  assistenteFiglio.style.display = "none";
  icoAssistente.style.display = "inline-block";
}
chiudiAssistente.addEventListener("click", chiudi);

// Apertura Assistente
function apri(){
  icoAssistente.style.display = "none";
  const assistenteFiglio = document.querySelector("#assistente-figlio");
  assistenteFiglio.style.display = "flex";
  const assistente = document.querySelector("#assistente");
  assistente.classList.remove("assistenteChiuso");
  assistente.classList.add("assistenteAperto");
}
icoAssistente.addEventListener("click", apri);