require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// function openNav() {
//     document.getElementById("mySidenav").style.width = "270px";
//     document.getElementById("main").style.marginLeft = "270px";
//     document.getElementById("main2").style.marginLeft = "250px";
//   }
//   function closeNav() {
//     document.getElementById("mySidenav").style.width = "0";
//     document.getElementById("main").style.marginLeft= "0";
//     document.getElementById("main2").style.marginLeft= "0";
//   }

// var dropdown = document.getElementsByClassName("dropdown-btn");
// var i;

// for (i = 0; i < dropdown.length; i++) {
//   dropdown[i].addEventListener("click", function() {
//   this.classList.toggle("active");
//   var dropdownContent = this.nextElementSibling;
//   if (dropdownContent.style.display === "block") {
//   dropdownContent.style.display = "none";
//   } else {
//   dropdownContent.style.display = "block";
//   }
//   });
// }