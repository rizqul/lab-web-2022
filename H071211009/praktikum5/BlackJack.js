var sum = 0;
var uang = 5000;
var cards =[];
var kartu = document.getElementById("cards");
var jumlah = document.getElementById("sum");
var message = document.getElementById("condition")
var message2 = document.getElementById("condition2")
var message3 = document.getElementById("startgame")
var duit = document.getElementById("money")
var take = document.getElementById("takecard")
var btnStart = document.getElementById("startgame")
take.disabled = true
message.innerHTML="Play A Round?"

function startgame(){
    message2.style.display = "none"
    console.log(takecard.hidden)
    var bet = parseInt(document.getElementById("taruhan").value) //menyimpan nilai dari inputan taruhan
    if (isNaN(bet)) {
        alert("Please Enter Your Bet")
        return
    } else if(bet > uang || bet <= 0){
        alert("Enter the appropriate amount")
        return
    } else {
        message.innerHTML="Draw A New Card"
        take.disabled = false;
        cards.push(getRandomCard ()) // tambah kartu ke array kosong di line 3
        let firstCard = getRandomCard();    
        let secondCard = getRandomCard();   
        cards = [firstCard, secondCard];    
        kartu.innerHTML = cards     // edit text d dalamnya
        jumlah.innerHTML = sumCards(cards)
        
        uang = uang - bet
        duit.innerHTML = uang
        btnStart.disabled = true
    }
}
    

function getRandomCard() {
	return Math.floor(Math.random() * 10) + 1;
}

function takecard(){
    cards.push(getRandomCard ())
    kartu.innerHTML = cards     // edit text d dalamnya
    jumlah.innerHTML = sumCards(cards)
    var takecard = document.getElementById("takecard")
    if (sumCards(cards) == 21) {
        takecard.disabled = true
        message.innerHTML="You Win"
        message2.style.display = "block"
        message2.innerHTML="You Already Got BlackJack"
        var bet = parseInt(document.getElementById("taruhan").value)
        uang += bet * 5
        duit.innerHTML = uang
        message3.innerHTML = "Play Again?"
        btnStart.disabled = false
    } else if (sumCards(cards) > 21) {
        takecard.disabled = true
        message.innerHTML="You Lose"
        message2.style.display = "block"
        message2.innerHTML = "Game is Over. You Can't Take New Card"
        message3.innerHTML = "Play Again?"
        btnStart.disabled = false
    }   
}

// untuk menjumlahkan seluruh elemen dalam array
function sumCards(cards){
    return (sum = cards.reduce((partialSum, a) => partialSum + a, 0));
}

function resetgame() {
    location.reload()
}