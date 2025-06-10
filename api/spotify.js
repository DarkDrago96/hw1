// API OAuth2 per spotify


fetch("api/spotify.php")
  .then(
    function(response){
      return response.json(); 
    }
  )
  .then(
    function(datiJson){  
      const div_spotify = document.querySelector("#spotify");
      for(let canzone of datiJson.tracks){
        let a = document.createElement("a");
        a.href = canzone.external_urls.spotify;
        a.textContent = canzone.name;
        div_spotify.appendChild(a);
      }
    }
  )