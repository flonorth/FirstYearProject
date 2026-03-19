function showteamPopup(){
    document.getElementById("team_pop-up").classList.add("active")
}

function showplayerPopup(){
    document.getElementById("player_pop-up").classList.add("active")
}

function hidePopup(id){
    document.getElementById(id).classList.remove("active");
}

function filterList(input, id){
    const filter = input.value.toLowerCase();
    const items = document.querySelectorAll(`#${id} .item`); /* Finds all elements with class .item with the given id */

    items.forEach(item => {
        const text = item.textContent.toLowerCase(); /* textContent → gets the visible text and converts it to lowercase*/
        if (text.startsWith(filter)) {
            item.style.display = ""; /* "" means to use default display (don’t hide it)*/
        } else {
            item.style.display = "none";
        }
    });
}

function startQuiz(){
    document.getElementById("team_pop-up").classList.remove("active")
    document.getElementById("player_pop-up").classList.remove("active")
    document.querySelector(".container").style.display = "none"; /* Hides first element with class container and removes it from the layout completely*/
    document.getElementById("Quizscreen").classList.add("active")

}
