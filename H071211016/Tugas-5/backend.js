var money = 5000;
var total = 0;
var inputBet;
var card = [];
var test = document.getElementsByClassName("yourCard")[0];


function startGame() {
    inputBet = document.getElementById("bet").value;
    console.log(inputBet);
    if (inputBet == ""){
        alert("Set Your Bet First");
    } else if (inputBet <= money && inputBet > 0) {
        if (total < 21) {
            console.log(total);
            if (card.length < 2){
                for (var i = 0; i < 2; i++){
                    var randNum = Math.floor(Math.random() * 11) + 1;
                    card.push(randNum);
                    document.getElementById("startGameButton").innerText = "Play Again?";
                }
                for (var j = 0; j < card.length; j++){
                    var cards = `${card[j]} `;
                    test.append(cards);
                    console.log(cards);
                    total += card[j];
                    document.getElementById("yourSum").innerHTML = total;
                    console.log(total);
                }
                if (total > 21) {
                    document.getElementById("warning").innerHTML = "Game Over You Lose!";
                    document.getElementById("yourSum").innerHTML = total;
                } else if (total == 21){
                    document.getElementById("warning").innerHTML = "You Got BlackJack!"
                    document.getElementById("yourSum").innerHTML = total;
                    money = money + (inputBet * 6);
                    document.getElementById('yourMoney').innerHTML = money;
                }
                money = money - inputBet;
                document.getElementById('yourMoney').innerHTML = money;
            }
        } else {
            card = [];
            total = 0;
            test.append(card);
            test.innerHTML = "";
            document.getElementById("startGameButton").innerText = "Start Game"
            document.getElementById("yourSum").innerHTML = "";
            document.getElementById("warning").innerHTML = "";
        }

    } else {
        alert("Input Your Correct Amount of Money!");
    }
}

function takeCard() {
    if (total != 0 && total < 21) {
        var newcard =  Math.floor(Math.random() * 11) + 1;
        card.push(newcard);
        test.append(`${newcard} `);
        total += newcard;
        document.getElementById("yourSum").innerHTML = total;
        if (total > 21) {
            document.getElementById("warning").innerHTML = "Game Over You Lose!";
            document.getElementById("yourSum").innerHTML = total;
        } else if (total == 21){
            document.getElementById("warning").innerHTML = "You Got BlackJack!"
            document.getElementById("yourSum").innerHTML = total;
            money = money + (inputBet * 6);
            document.getElementById('yourMoney').innerHTML = money;
        }
    } else if (inputBet == "") {
        alert("Set Your Bet First!");
    } else {
        alert("Press Play Again Button!")
    }
}