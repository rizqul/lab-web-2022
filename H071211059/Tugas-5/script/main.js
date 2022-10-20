let startPanel = document.getElementsByClassName("start-panel")[0];
let startingBet = document.getElementsByClassName("bet")[1];
let bet = document.getElementsByClassName("bet")[0];
let bet10 = document.getElementsByClassName("pokerchip")[0];
let bet50 = document.getElementsByClassName("pokerchip")[1];
let bet100 = document.getElementsByClassName("pokerchip")[2];
let bet200 = document.getElementsByClassName("pokerchip")[3];
let bet500 = document.getElementsByClassName("pokerchip")[4];
let bet1k = document.getElementsByClassName("pokerchip")[5];
let undo = document.getElementById("undo-bet");
let startBtn = document.getElementsByClassName("start-btn")[0];
let dealerCard = document.getElementsByClassName("dealer")[1].children;
let bettingHistory = [];

let startingTotal = document.getElementsByClassName("total")[1];
let total = document.getElementsByClassName("total")[0];
let reset = document.getElementsByClassName("reset-btn")[0];

// Memulai game
startBtn.onclick = () => {
  document.getElementsByClassName("user")[1].innerHTML = "";
  document.getElementsByClassName("dealer")[1].innerHTML = "";

  if (bettingHistory.length == 0) {
    alert("You have to bet first");
    return;
  }

  if (bettingHistory.length > 0) {
    startPanel.classList.add("hidden");
    hit("user");
    hit("user");
    hit("dealer");
    hit("dealer");
    bet.innerHTML = startingBet.innerHTML;
    total.innerHTML = startingTotal.innerHTML;
    dealerCard[1].classList.add("flipped");
    if (userPoint.innerText == 21) {
      checkWinner();
    }
  }
};

// Funtsi yang dijalankan ketika chip diklik
bet10.onclick = () => {
  chipClicked(10);
};

bet50.onclick = () => {
  chipClicked(50);
};

bet100.onclick = () => {
  chipClicked(100);
};

bet200.onclick = () => {
  chipClicked(200);
};

bet500.onclick = () => {
  chipClicked(500);
};

bet1k.onclick = () => {
  chipClicked(1000);
};

// Fungsional tombol undo
undo.onclick = () => {
  if (bettingHistory.length == 0) {
    alert("You can't undo anymore");
    return;
  }

  value = bettingHistory.pop();
  betting(-value);
  updateTotal(value);
};

// Fungsional tombol reset
reset.onclick = () => {
  userPoint.innerText = "0";
  userCards = [];
  dealerCards = [];
  startingTotal.innerText = "$1000";
  startingBet.innerText = "BET = $0";
  startPanel.classList.remove("hidden");
  document.getElementsByClassName("dealer")[1].innerHTML = "";
  document.getElementsByClassName("user")[1].innerHTML = "";
};

function chipClicked(chip) {
  betting(chip);
  updateTotal(-chip);
  bettingHistory.push(chip);
}

function betting(betValue) {
  startingBet.value =
    parseInt(startingBet.innerText.replace("BET = $", "")) + betValue;
  startingBet.innerText = "BET = $" + startingBet.value;
}

function updateTotal(value) {
  startingTotal.value =
    parseInt(startingTotal.innerText.replace("$", "")) + value;
  startingTotal.innerText = "$" + startingTotal.value;
  total.innerHTML = startingTotal.innerHTML;
}

// card management
let hitBtn = document.getElementsByClassName("hit-btn")[0];
let standBtn = document.getElementsByClassName("stand-btn")[0];
let userPoint = document.getElementsByClassName("point")[0];
let returnPanel = document.getElementsByClassName("return-panel")[0];
let returnValue = document.getElementsByClassName("return-value")[0];
let totalBet = document.getElementsByClassName("total-bet")[0];
let gameStatus = document.getElementsByClassName("game-status")[0];
let meme = document.getElementById("video");
let dealerPoint = 0;
let userCards = [];
let dealerCards = [];
let totalPoints = 0;
let deck = createDeck();

hitBtn.onclick = () => {
  hit("user");
  if (userPoint.innerText > 21) {
    bet.innerText = `YOUR POINT > 21. YOU LOSE`;
  }

  let point = parseInt(userPoint.innerText);

  if (point > 21 || point == 21) {
    checkWinner();
  }

  if (point < 21 && userCards.length == 5) {
    checkWinner();
  }
};

standBtn.onclick = () => {
  dealerCard[1].classList.remove("flipped");

  while (dealerPoint <= parseInt(userPoint.innerText)) {
    hit("dealer");
  }
  setTimeout(() => {
    checkWinner();
  }, 1500);
};

returnPanel.onclick = () => {
  startingBet.innerHTML = "BET = $0";
  userCards = [];
  dealerCards = [];
  returnPanel.classList.add("hidden");
  startPanel.classList.remove("hidden");
};

// Membuat satu deck kartu
function createDeck() {
  const n = ["A", 2, 3, 4, 5, 6, 7, 8, 9, 10, "J", "Q", "K"];
  const k = ["club", "diamond", "heart", "spade"];
  let deck = [];

  for (let i = 0; i < k.length; i++) {
    for (let j = 0; j < n.length; j++) {
      deck.push([`${k[i]}`, `${n[j]}`]);
    }
  }
  return deck;
}

function randomCard() {
  const randomIndex = Math.floor(Math.random() * deck.length);
  const item = deck[randomIndex];

  deck.splice(randomIndex, 1);
  return item;
}

function hit(player) {
  let cardDrawn = randomCard();
  let kinds = cardDrawn[0];
  let number = cardDrawn[1];

  if (player === "user") {
    userCards.push(number);
    updatePoint(userCards);
  }

  if (player === "dealer") {
    dealerCards.push(number);
    updatePoint(dealerCards);
  }

  let card = document.createElement("div");
  card.classList.add("card");

  if (kinds == "club" || kinds == "spade") {
    card.classList.add("black");
  } else {
    card.classList.add("red");
  }

  let cardTemplate = `<p>${number}</p>
                    <i class="bi bi-suit-${kinds}-fill"></i>
                    <p class="bottom">${number}</p>`;

  card.innerHTML = cardTemplate;

  let parent = document.getElementsByClassName(player)[1];
  parent.appendChild(card);
}

function updatePoint(playerCard) {
  for (let i = 0; i < playerCard.length; i++) {
    if (playerCard[i] == "J" || playerCard[i] == "Q" || playerCard[i] == "K") {
      playerCard[i] = 10;
    }
    if (playerCard[i] === "A") {
      playerCard[i] = 1;
    }
  }

  totalPoints = sum(playerCard);

  if (totalPoints + 10 <= 21 && playerCard.includes(1)) {
    totalPoints += 10;
  }

  if (playerCard == userCards) {
    userPoint.innerText = totalPoints;
  } else {
    dealerPoint = totalPoints;
  }
}

function checkWinner() {
  let gameState = false;
  let win = false;
  if (userPoint.innerText > 21) {
    gameStatus.innerText = `YOUR POINT > 21. YOU LOSE`;
    gameState = true;
  } else if (userPoint.innerText == 21) {
    gameStatus.innerText = `BLACKJACK! YOU WIN`;
    gameState = true;
    win = true;
  } else if (dealerPoint > 21) {
    gameStatus.innerText = `DEALER = ${dealerPoint}. YOU WIN`;
    gameState = true;
    win = true;
  } else if (userPoint.innerText > dealerPoint) {
    gameStatus.innerText = `DEALER = ${dealerPoint}. YOU WIN`;
    gameState = true;
    win = true;
  } else if (userPoint.innerText < dealerPoint) {
    gameStatus.innerText = `DEALER = ${dealerPoint}. YOU LOSE`;
    gameState = true;
  } else if (userPoint.innerText < 21 && userCards.length == 5) {
    gameStatus.innerText = `YOU WIN!`;
    gameState = true;
    win = true;
  } else {
    gameStatus.innerText = `DEALER = ${dealerPoint}. DRAW`;
    gameState = true;
  }

  if (gameState) {
    returnPanel.classList.remove("hidden");
    if (win) {
      returnValue.innerText =
        "Your Return : $" +
        parseInt(startingBet.innerText.replace("BET = $", "")) * 5;
      console.log(returnValue.innerText);
      updateTotal(
        parseInt(returnValue.innerText.replace("Your Return : $", ""))
      );
    } else {
      returnValue.innerText = "Your Return : $0";
    }
    totalBet.innerText = startingBet.innerText;
  }
}

function sum(arr) {
  let sum = 0;
  for (let i = 0; i < arr.length; i++) {
    sum += parseInt(arr[i]);
  }
  return sum;
}

function returnBet() {
  returnValue.innerText = parseInt(startingBet.innerText) * 2;
  totalBet.innerText = bet.innerText;
}
