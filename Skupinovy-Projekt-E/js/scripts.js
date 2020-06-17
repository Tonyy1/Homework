var player = "X"; // Defaultní hráč
var cycleCount = 0; // Vytvoření var pro cyklus přičítání
playerTurnText() // Inicializační zavolání funkce pro zobrazení hráče, který je zrovna na řadě

// Mění hodnoty pro zobrazení znamének
function changeValue(id) {
    var y = id;
    var x = document.getElementsByClassName("boxeek");
    x[y - 1].value = player;
    x[y - 1].disabled = true;
    cycleCount = cycleCount + 1;
    checkMatches();
    changePlayer();
}

// Kontroluje, zda-li je shoda a hráč vyhrál, různé patterny, líp mě to nenapadlo, než to takhle bruteforcenout
function checkMatches() {
    var x = document.getElementsByClassName("boxeek");

    // Podmínka pro remízu
    if (cycleCount == 9) {
        gameWon("tie");
        cycleCount = 0
    }
    // První řada
    if ((x[0].value) === (x[1].value) && (x[0].value) === (x[2].value)) {
        gameWon(x[0].value);
    }
    // Druhá řada
    if ((x[3].value) === (x[4].value) && (x[3].value) === (x[5].value)) {
        gameWon(x[3].value);
    }
    // Třetí řada
    if ((x[6].value) === (x[7].value) && (x[6].value) === (x[8].value)) {
        gameWon(x[6].value);
    }
    // První sloupec
    if ((x[0].value) === (x[3].value) && (x[0].value) === (x[6].value)) {
        gameWon(x[0].value);
    }
    // Druhý sloupec
    if ((x[1].value) === (x[4].value) && (x[1].value) === (x[7].value)) {
        gameWon(x[1].value);
    }
    // Třetí sloupec
    if ((x[2].value) === (x[5].value) && (x[2].value) === (x[8].value)) {
        gameWon(x[2].value);
    }
    // Úhlopříčka #1
    if ((x[0].value) === (x[4].value) && (x[0].value) === (x[8].value)) {
        gameWon(x[0].value);
    }
    // Úhlopříčka #2
    if ((x[6].value) === (x[4].value) && (x[6].value) === (x[2].value)) {
        gameWon(x[6].value);
    }
}

// Změní hráče po jednom tahu
function changePlayer() {
    if (player === "X") {
        player = "O";
    } else if (player === "O") {
        player = "X";
    }
    playerTurnText() // Zavolání funkce pro zobrazení hráče, který je zrovna na řadě
}

// Resetuje hráče na defaultní nastavení a "vynuluje" hrací pole
function newGame() {
    var x = document.getElementsByClassName("boxeek");
    for (i = 0; i < x.length; i++) {
        x[i].value = "-";
    }
    player = "X";
}

// Alerty pro případ, když hráč vyhraje a nebo je remíza
function gameWon(playerName) {
    if (playerName == "tie") {
        alert("Remíza");
    } else if (playerName != "-") {
        alert("Hráč " + playerName + " vyhrál hru");
        cycleCount = 0
    }
}

// Zobrazuje, jaký hráč je na řadě
function playerTurnText() {
    document.getElementById("idk").innerHTML = "Na řadě je hráč: " + player + "";
}