//changement de class html pour affichage sur page bleue

let list = document.querySelectorAll(".nav-item")
list.forEach(element => {
  element.className += " menu-item-white";
});