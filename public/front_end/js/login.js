let card1 = document.querySelector(".card1"); //declearing profile card element
let displayPicture = document.querySelector(".second-btn"); //declearing profile picture
let card2 = document.querySelector(".card2"); //declearing profile card element
let displayPicture2 = document.querySelector(".first-btn"); //declearing profile picture

displayPicture.addEventListener("click", function () {
  //on click on profile picture toggle hidden class from css
  card1.classList.toggle("hidden");
  card2.classList.add("hidden");
});

displayPicture2.addEventListener("click" , function () {
  //on click on profile picture toggle hidden class from css
  card1.classList.add("hidden");
  card2.classList.toggle("hidden");
});
