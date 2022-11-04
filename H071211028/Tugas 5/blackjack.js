var uang = 5000;
var money = document.querySelector("#money");
let kartu = [];
let sum = document.getElementById("sum");
let cards = document.getElementById("cards");
let star = document.getElementById("btn1");
let msg = document.getElementsByClassName("p1");
let mgsg = document.getElementById("pesan");
let takeCard = true;
// let showCard = document.getElementById("cards");


function startgame(){
    var bet = document.getElementById("bet");
    kartu.push(randomCard());
    kartu.push(randomCard());
    if (bet.value > 0) {
        if (bet.value <= uang) {
            uang -= bet.value;
            money.innerHTML ="Your Money: Rp." + uang;
        } else {
            alert("Your Money is Less Than Your Bet")
        }
        cards.innerText = ("Your Cards: " +kartu);
        sum.innerHTML = ("sum: "+sumCard(kartu));
    } else {
        alert("Set Your Bet Before You Start!")
    }
    document.getElementById("btn1").disabled=true
}

function randomCard(){
    return Math.floor(Math.random()*11)+1;
}

function sumCard(kartu){
    return(sum = kartu.reduce((partialsum, a) => partialsum+a, 0))
}

function takecard() {
    if (takeCard) {
        kartu.push(randomCard());
        cards.innerText = kartu;
        document.getElementById("sum").innerHTML = sumCard(kartu);
        var bet = document.getElementById("bet");
        
        if (sumCard(kartu) == 21 ) {
            msg.innerHTML = "You Win the Game!"
            money.innerHTML = "Your Money: Rp." + uang + (bet.value * 6);
            mgsg.innerHTML = "You Got Blackjack!"
            takeCard = false;
        } else if (sumCard(kartu) > 21 ) {
            msg.innerHTML = "You Lose!"
            mgsg.innerHTML = "Game is Over You Can't Take New Card"
            takeCard = false;
        } 
    }
}

function reset() {
    location.reload();
}

