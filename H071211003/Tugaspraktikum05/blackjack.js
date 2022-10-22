let play = document.getElementById(`play`);
let cards = document.getElementById(`cards`);
let sum = document.getElementById(`sum`);
let start = document.getElementById(`start`);
let take = document.getElementById(`take`);
let money = document.getElementById(`money`);
let reset = document.getElementById(`reset`);
let card = document.getElementById(`card`);
let bet = document.getElementById('bet');
let kartu = []
let uang = 5000;

money.innerHTML = uang;
function ResetMoney() {
    bet.value = "";
    uang = 5000
    money.innerHTML = uang;
}

function randomcard() {
    kartu.push( Math.floor(Math.random() * 11) + 1);
}
function sumcard(cards) {
    return (sum = cards.reduce((partialSum, a) => partialSum + a, 0));
}
function StartGame() {
    if (bet.value == 0 || bet.value == " ") {
        alert("Set Your Bet First");
    } else if(bet.value > uang ){
        alert("Your money is less than your bet, please reset your money or change your bet");
    }else {
        randomcard();
        randomcard();
        sum.innerHTML = sumcard(kartu);
        card.innerHTML = kartu;
        if (sum == 21){
            uang = uang - Number(bet.value);
            uang = uang + Number(bet.value) * 5;
            money.innerHTML = uang;
            alert("You Already Got BlackJack!");
        }else if(Number(bet.innerHTML) < 21){
            uang = uang - Number(bet.value);
            money.innerHTML = uang;
        }else{
            money.innerHTML = uang - Number(bet.value);
            alert("Game is Over You Can't Take Your New Card");
        }
        start.disabled = true
    }
}

function TakeCard() {
    console.log(sum.innerHTML);
    randomcard();
    card.innerHTML = kartu;
    console.log(uang)
    document.getElementById(`sum`).innerHTML = sumcard(kartu);
    if (sumcard(kartu)== 21){
        money.innerHTML = uang + Number(bet.value) * 5;
        alert("You Already Get BlackJack");
    }else if(sumcard(kartu) > 21){
        play.innerHTML = "You Loose"
        take.disabled = true
    }
}