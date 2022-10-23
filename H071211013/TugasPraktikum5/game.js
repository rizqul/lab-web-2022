var uang = 5000;
var money = document.getElementById("money");
let cardsteks = document.getElementById("your-cards");
let sum = document.getElementById("sum");
let cards = [];
let msg = document.getElementById("kondisi");
let mgsg = document.getElementById("pesan");
let takeCard = false;

function start() {
    var bet = document.getElementById("bet");
    cards.push(randomCard());
    cards.push(randomCard());
    if (bet.value > 0) {
        if (bet.value <= uang) {
            uang -= bet.value;
            money.innerHTML = uang;
            takeCard = true;
        } else {
            alert("Your Money is Less Than Your Bet");
        }
        cardsteks.innerText = cards;
        sum.innerHTML = sumCard(cards);
        
    } else {
        alert("Set Your Bet Before You Start!");
    }
    document.getElementById("start").disabled = true;
}

function randomCard() {
    return Math.floor(Math.random() * 11) + 1;
}

function sumCard(cards) {
    return(sum = cards.reduce((partialsum, a) => partialsum+a, 0));
}

function take() {
    if (takeCard) {
        cards.push(randomCard());
        cardsteks.innerText = cards;
        document.getElementById("sum").innerHTML = sumCard(cards);
        var bet = document.getElementById("bet");
        
        if (sumCard(cards) == 21 ) {
            msg.innerHTML = "You Win the Game!";
            money.innerHTML = uang + (bet.value * 6);
            mgsg.innerHTML = "You Got Blackjack!";
            takeCard = false;
        } else if (sumCard(cards) > 21 ) {
            msg.innerHTML = "You Lose!";
            mgsg.innerHTML = "Game is Over You Can't Take New Card";
            takeCard = false;
        } 
    }
}

function reset() {
    location.reload();
}

