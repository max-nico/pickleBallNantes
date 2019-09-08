//changement de class html pour affichage sur page bleue
let list = document.querySelectorAll(".menu-item")
list.forEach(element => {
  element.classList.add("menu-item-white");
});