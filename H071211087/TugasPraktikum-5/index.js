let firstCard = 6
let secondCard = 10
let cards = [firstCard, secondCard]
let sum = firstCard + secondCard
let message = ''
let isAlive = true
let hasBlackjack = false
let messageE1 = document.getElementById('message-el')
let cardsE1 = document.getElementById('cards-el')
let sumE1 = document.getElementById('sum-el')
let betfield  = document.getElementById('betfield')
let playermoney = 5000
let uang = document.getElementById('uang')
let checkpoint = true;

function renderGame() {
    var bet=parseInt(betfield.value);
    if (checkpoint) {
        
        // console.log(typeof bet)
        playermoney = playermoney - bet
        if (isNaN(bet) || typeof bet==="string") {
            alert("Masukkan input yang benar")
            return;
        }
        // console.log("hello");
        checkpoint = false
    }
    // console.log(typeof playermoney);
    uang.innerHTML = playermoney
    cardsE1.textContent = 'Cards: ' + firstCard + ' ' + secondCard
    sumE1.textContent = 'Sum: ' + sum

    if (sum < 21) {
        message = 'want another card?'
    } else if (sum === 21) {
        console.log(bet)
        uang.innerHTML = playermoney + (bet * 5)
        message = 'Blackjack!'
        hasBlackjack = true
    }else {
        message = 'Game Over!'
        isAlive = false
    }
    messageE1.textContent = message
}
function startGame() {
    
    renderGame()
}
function newCard() {
    if (isAlive === true && hasBlackjack === false){
        let card = 5
        cards.push(card)
        sum += card
        renderGame()
    }
}