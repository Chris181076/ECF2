const burger = document.getElementById("burger");
const mainMenu = document.getElementById("mainMenu");


burger.addEventListener("click", function(){
    if (mainMenu.style.display === "none" || mainMenu.style.display === "") {
        mainMenu.style.display = "block"; 
    } else if (mainMenu.style.display === "block") {
        mainMenu.style.display = "none"; 
    }
});


