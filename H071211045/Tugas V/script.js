/*
*   Blackjack's Script
*   Name : Muhammad Sofyan Daud Pujas
*   NIM  : H071211045
*/

var name = "Player";

const values = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
const types = ["H", "K", "S", "W"]; // H = Hati, K = Klober, S = Sekop, W = Wajik
const startingMoney = 5000;
const startingCard = 2;

var backCard = document.createElement("img");
backCard.className = "cards";
backCard.src = "assets/back_red.png";

var pot = document.getElementById("total-pot").innerHTML;
var player = document.getElementById("money").innerHTML;

var hiddenCard;
var haveAceP1, haveAceP2;
var hit, deck;
var money;

function prepareGame() {
    money = startingMoney
    dealer = 0;
    dealer = player = bet = pot = 0;
    haveAceP1 = haveAceP2 = false;
    hit = true;
}

function startGame() {
    switchWindow("menu", "game");
    prepareGame();
    askBet();
    makeDeck();
    updateStatus();
}

makeDeck = () => { // Mengatur Kartu

    // Menyetel Pot ke jadi kosong
    pot = 0;

    // Memuat deck -> [..., 2S, 3S, 4S, ..]
    deck = [];

    for (let i = 0; i < types.length; i++) {
        for (let j = 0; j < values.length; j++) {
            deck.push(values[j] + types[i]);
        }
    }

    // Mengacak deck -> [.., JH, 3S, AK, ..]
    for (let i = 0; i < deck.length; i++) {
        let indexOfDeck = Math.floor(Math.random() * deck.length); // diantara 0-1 kali dengan 52 kartu
        let temp = deck[i];
        deck[i] = deck[indexOfDeck];
        deck[indexOfDeck] = temp;
    }

    // Menambah kartu ke dealer
    hiddenCard = deck.pop();
    dealer += getValue(hiddenCard);
    document.getElementById("dealer-deck").append(backCard);

    let card = deck.pop()
    addCard(card, "dealer-deck");
    dealer += getValue(card);

    // Menambah kartu ke player
    for (let i = 0; i < startingCard; i++) {
        let card = deck.pop()
        addCard(card, "player-deck");
        player += getValue(card);
    }
}

takeCard = () => { // Mengambil kartu tambahan
    hit = (player > 21 && hit == true) ? false : true;

    if (!hit) return;
    let card = deck.pop();
    // let card = "AK";
    addCard(card, "player-deck");
    player += getValue(card);
    document.getElementById("player-sum").innerHTML = player;

    updateStatus();
}

switchWindow = (origin, target) => { // Mengganti tampilan
    document.getElementsByClassName(origin)[0].style = "display: none; z-index:-50;";
    document.getElementsByClassName(target)[0].style = "display: block; z-inde:=50;";
}

addCard = (card, targetParent) => { // Menambahkan kartu ke dalam deck 
    let card_image = document.createElement("img");
    card_image.className = "cards";
    card_image.src = "assets/cards/" + card + ".png";
    document.getElementById(targetParent).append(card_image);
}

getValue = (card) => { // Menghitung nilai kartu
    let value = card.substring(0, card.length - 1);
    if (value == "A") return 11;
    else if (value == "J" || value == "Q" || value == "K") return 10;
    return parseInt(value);
}

askBet = () => { // Meminta bet
    let bet = 0;
    popUp("betting", 1);

    $("#submit").click(function () {
        bet = parseInt(document.getElementById("bet").value);

        if (!isNaN(bet)) {

            if (bet > money) {
                alert("You don't have enough money!");
                return;
            }

            pot += bet;
            money -= bet;

            pot += (Math.floor(Math.random() < 0.5) && bet > 500 ? (bet - 500) : (bet + 500)); // Uang dari dealer
            updateStatus();
            popUp("betting", 0);


        } else {
            alert("Please input a valid number!");
        }
    });
}

updateStatus = () => { // Update status
    player = checkAce(player, "player-deck", haveAceP1);
    dealer = checkAce(dealer, "dealer-deck", haveAceP2);
    document.getElementById("player-sum").innerHTML = player;
    document.getElementById("total-pot").innerHTML = pot;
    document.getElementById("money").innerHTML = money;

    console.log("Status \nPlayer: " + player + "\nDealer: " + dealer + "\nPot: " + pot + "\nMoney: " + money);
}

checkAce = (playerScore, targetParent, haveAce) => { // Mengecek apakah ada kartu Aceco
    if (playerScore > 21 && !haveAce) {
        for (let i = 0; i < document.getElementById(targetParent).children.length; i++) {
            if (document.getElementById(targetParent).children[i].src.includes("A")) {
                console.log("an Ace have been detected!");
                haveAce = true;
                playerScore -= 10;
                break;
            }
        }
    }
    return playerScore;
}

stand = () => { // Menyimpan nilai kartu (Seperti Submit)
    hit = (hit == true) ? false : true;

    document.getElementById("dealer-deck").removeChild(backCard);
    addCard(hiddenCard, "dealer-deck");

    while (dealer < 18) {
        let card = deck.pop();
        dealer += getValue(card);
        addCard(card, "dealer-deck");
    }

    if ((player < 21 && dealer < 21) && (player > dealer) || (dealer > 21 && player < 21)) {
        document.getElementById("game-result").innerHTML = "You Win!";
        money += pot;

    } else if ((player < 21 && dealer < 21) && (dealer > player) || (player > 21 && dealer < 21)) {
        document.getElementById("game-result").innerHTML = "You Lose!";

    } else {

        document.getElementById("game-result").innerHTML = "Draw!";
    }

    updateStatus();
    popUp("game-over", 1);

    $("#play-again").click(function () {
        popUp("game-over", 0);
        document.getElementById("player-deck").innerHTML = "";
        document.getElementById("dealer-deck").innerHTML = "";
        dealer = player = 0;
        startGame();
    });
}

popUp = (window, index) => {
    if (index == 1) {
        document.getElementsByClassName("overlay")[0].style.display = "block";
        document.getElementsByClassName(window)[0].style.zIndex = "50";
    } else if (index == 0) {
        document.getElementsByClassName("overlay")[0].style.display = "none";
        document.getElementsByClassName(window)[0].style.zIndex = "-50";
    }
}

$("#exit").click(function () {
    money = startingMoney;
    player = dealer = pot = 0;
    popUp("game-over", 0);
    document.getElementById("player-deck").innerHTML = "";
    document.getElementById("dealer-deck").innerHTML = "";
    switchWindow("game", "menu");
});