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
let bettingHistory = [];
let dealerCard = document.getElementsByClassName("dealer")[1].children;

let startingTotal = document.getElementsByClassName("total")[1];
let total = document.getElementsByClassName("total")[0];

let reset = document.getElementsByClassName("reset-btn")[0];

startBtn.onclick = () => {
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

bet10.onclick = () => {
  betting(10);
  updateTotal(-10);
  bettingHistory.push(10);
};

bet50.onclick = () => {
  betting(50);
  updateTotal(-50);
  bettingHistory.push(50);
};

bet100.onclick = () => {
  betting(100);
  updateTotal(-100);
  bettingHistory.push(100);
};

bet200.onclick = () => {
  betting(200);
  updateTotal(-200);
  bettingHistory.push(200);
};

bet500.onclick = () => {
  betting(500);
  updateTotal(-500);
  bettingHistory.push(500);
};

bet1k.onclick = () => {
  betting(1000);
  updateTotal(-1000);
  bettingHistory.push(1000);
};

undo.onclick = () => {
  if (bettingHistory.length == 0) {
    alert("You can't undo anymore dumbass");
    return;
  }

  value = bettingHistory.pop();
  betting(-value);
  updateTotal(value);
};

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

function betting(betValue) {
  startingBet.value =
    parseInt(startingBet.innerText.replace("BET = $", "")) + betValue;
  startingBet.innerText = "BET = $" + startingBet.value;
}

function updateTotal(value) {
  startingTotal.value =
    parseInt(startingTotal.innerText.replace("$", "")) + value;
  startingTotal.innerText = "$" + startingTotal.value;
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

let deck = createDeck();

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

hitBtn.onclick = () => {
  hit("user");
  if (userPoint.innerText > 21) {
    bet.innerText = `YOUR POINT > 21. YOU LOSE`;
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

let checked = false;
let totalPoints = 0;

function updatePoint(playerCard) {
  // console.log(playerCard);
  for (let i = 0; i < playerCard.length; i++) {
    if (playerCard[i] == "J" || playerCard[i] == "Q" || playerCard[i] == "K") {
      playerCard[i] = 10;
    }
    if (playerCard[i] === "A") {
      playerCard[i] = 1;
    }
    console.log(playerCard);
  }
  totalPoints = sum(playerCard);

  if (totalPoints < 21 && playerCard.includes(1)) {
    totalPoints += 10;
    console.log(totalPoints);
  }

  if (playerCard == userCards) {
    userPoint.innerText = totalPoints;
  } else {
    dealerPoint = totalPoints;
  }
}

function sum(arr) {
  let sum = 0;
  for (let i = 0; i < arr.length; i++) {
    sum += parseInt(arr[i]);
  }
  return sum;
}

function checkWinner() {
  let gameState = 0;
  let win = false;
  if (userPoint.innerText > 21) {
    gameStatus.innerText = `YOUR POINT > 21. YOU LOSE`;
    gameState = 1;
  } else if (userPoint.innerText == 21) {
    gameStatus.innerText = `BLACKJACK! YOU WIN`;
    win = true;
    gameState = 1;
  } else if (dealerPoint > 21) {
    gameStatus.innerText = `DEALER = ${dealerPoint}. YOU WIN`;
    win = true;
    gameState = 1;
  } else if (userPoint.innerText > dealerPoint) {
    gameStatus.innerText = `DEALER = ${dealerPoint}. YOU WIN`;
    win = true;

    gameState = 1;
  } else if (userPoint.innerText < dealerPoint) {
    gameStatus.innerText = `DEALER = ${dealerPoint}. YOU LOSE`;
    win = true;
    gameState = 1;
  } else {
    gameStatus.innerText = `DEALER = ${dealerPoint}. DRAW`;
    gameState = 1;
  }

  if ((gameState = 1)) {
    returnPanel.classList.remove("hidden");
    console.log(startingBet.innerText.replace("BET = $", ""));
    if (win) {
      returnValue.innerText =
        returnValue.innerText +
        parseInt(startingBet.innerText.replace("BET = $", "")) * 1.5;
    } else {
      returnValue.innerText = 0;
    }
    totalBet.innerText = startingBet.innerText;
  }
}

returnPanel.onclick = () => {
  returnPanel.classList.add("hidden");
};

function returnBet() {
  returnValue.innerText = parseInt(startingBet.innerText) * 2;
  totalBet.innerText = bet.innerText;
}
