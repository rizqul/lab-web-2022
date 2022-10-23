let money = 5000
let cards = []
var takeCard = document.getElementById("takeCard")
document.getElementById("cash").innerHTML=money

function start() {
    let bet = parseInt(document.getElementById("betField").value)
    if (isNaN(bet)) {
        alert("Set your bet before clicking the start button!")
        return; 
    } else if (bet > money) {
        alert("Your money doesn't enough!")
        return;
    } else {
        money = money - bet
        document.getElementById("cash").innerHTML=money
    }
    cards.push(randomIntFromInterval(1, 11))
    cards.push(randomIntFromInterval(1, 11))
    document.getElementById("card").innerHTML=cards
    document.getElementById("sum").innerHTML=sumCard(cards)
    document.getElementById("start-btn").disabled=true
}

function takeCards() {
    cards.push(randomIntFromInterval(1, 11))
    document.getElementById("card").innerHTML=cards
    document.getElementById("sum").innerHTML=sumCard(cards)
    console.log(sumCard (cards))
    if (sumCard (cards) == 21) {
        document.getElementById("takeCard").disabled=true
        takeCard.disabled = true
        message.innerHTML="Congrats! You Win!"
        var bet = parseInt(document.getElementById("betField").value)
        money += bet * 5
        cash.innerHTML = money
        return;
    } else if (sumCard (cards) > 21) {
        takeCard.disabled = true
        message.innerHTML="You Lose!"
        return;
    }   
}

function sumCard (cards) {
    return (sum = cards.reduce((partialSum, a) => partialSum + a, 0));
}

function randomIntFromInterval(min, max){
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function reset () {
    location.reload ();
}

