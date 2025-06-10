
/* Per far aprire e chiudere il menu al lancio della funzione*/
let apri_menu = document.querySelector("#apri_menu");
function scorrimenu(){
  let menu_pt1 = document.querySelector(".navbar-menu");
  let menu_pt2 = document.querySelector(".navbar-accesso");
  let mostralo = true;
  for(let classe of menu_pt1.classList){
    if("invisibile_mobile" === classe){
      menu_pt1.classList.remove("invisibile_mobile"); /* 4) modificare dinamicamente la classe degli elementi agendo sulla proprietà classList; */
      menu_pt2.classList.remove("invisibile_mobile")  /* 5) mostrare o nascondere dinamicamente parti della pagina assegnando o rimuovendo classi CSS che modificano la proprietà display; */
      mostralo = false;
      break
    }
  }
  if(mostralo === true){
    menu_pt1.classList.add("invisibile_mobile");
    menu_pt2.classList.add("invisibile_mobile");
  }
}
apri_menu.addEventListener("click", scorrimenu); /* 1) usare addEventListener() per gestire eventi nella pagina; */

