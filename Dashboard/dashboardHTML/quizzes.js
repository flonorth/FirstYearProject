console.log("JS LOADED");
function showteamPopup(){
    clearSelection();
    document.getElementById("team_pop-up").classList.add("active");
}

function showplayerPopup(){
    clearSelection();
    document.getElementById("player_pop-up").classList.add("active");
}

let QuizData;
fetch('quizdata.json') // Fetch API method
    .then(response => response.json()) // Parse JSON - convert  to javascript object
    .then(data => {
        console.log(data);
        QuizData = data;
        loadTeams();
        loadPlayers();
    }
); // Work with JSON data

function loadTeams(){
    const teamList = document.getElementById("teamList");
    teamList.innerHTML = ""; /* Clears everything inside the element to prevent the loadTeams function to put duplicates*/
    const teams = Object.keys(QuizData.teams);
    teams.forEach(item => {
        const div = document.createElement("div");
        div.classList.add("item");
        div.textContent = item;
        div.onclick = function(){submit("teams", div, item, "Submit_button");};
        teamList.appendChild(div); /* Puts the div element in the element teamList element */
    })
}

function loadPlayers(){
    const playerList = document.getElementById("playerList");
    playerList.innerHTML = "";
    const players = Object.keys(QuizData.Players);
    players.forEach(item => {
        const div = document.createElement("div");
        div.classList.add("item");
        div.textContent = item;
        div.onclick = function(){submit("Players", div, item, "Submit_button_player")};
        playerList.appendChild(div);
    })
}

const quizObject = {}

function clearSelection(){
    document.querySelectorAll(".item").forEach(item => {
        item.classList.remove("selected");
    })
    document.getElementById("Submit_button").classList.remove("active");
    document.getElementById("Submit_button_player").classList.remove("active");
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

function submit(Mode, clickedElement, clickedItem, button){ // Cannot use 'this' as a parameter
    clearSelection();
    clickedElement.classList.add("selected");
    quizObject["Mode"] = Mode;
    quizObject["Name"] = clickedItem;
    quizObject["Q/A"] = QuizData[Mode][clickedItem]      
    document.getElementById(button).classList.add("active");
    console.log("Mode:", Mode);
    console.log("Item:", clickedItem);
    console.log("Data:", QuizData[Mode][clickedItem]);
}
function startQuiz(){
    document.getElementById("player_pop-up").classList.remove("active");
    document.getElementById("team_pop-up").classList.remove("active");
    document.querySelector(".container").style.display = "none"; /* Hides first element with class container and removes it from the layout completely*/
    document.getElementById("Quizscreen").classList.add("active");
    const question = quizObject["Q/A"][0]["Question"]
    document.getElementById("testingQuizObject").textContent = question;
    const options = quizObject["Q/A"][0]["Options"];
    document.getElementById("button1").textContent = options[0];
    document.getElementById("button2").textContent = options[1];
    document.getElementById("button3").textContent = options[2];
    document.getElementById("button4").textContent = options[3];

}

function hideQuizPage(){
    document.getElementById("Quizscreen").classList.remove("active");
    document.querySelector(".container").style.display = "flex";
}

function selectButton(clickedButton){
    document.querySelectorAll(".quizButtons button").forEach(item =>{
        item.classList.remove("selected")
    });
    clickedButton.classList.add("selected")
    document.getElementById("submit_quizBtn").classList.add("active")
}
