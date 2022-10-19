var name = "Player";

const values = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
const types = ["H", "K", "S", "W"]; // H = Hati, K = Klober, S = Sekop, W = Wajik

const backCards = document.getElementsByClassName("back-cards");

var hiddenCard, character, deck = [];

var dealer = 0, dealerAce = 0;
var player = 0, playerAce = 0;

var pot = 0, money = 5000;

let startingCard = 2;

var hit = true;

function startGame() {
    document.getElementsByClassName("menu")[0].style.display = "none";
    document.getElementsByClassName("game")[0].style.display = "block";

    // Memuat deck
    for (let i = 0; i < types.length; i++) {
        for (let j = 0; j < values.length; j++) {
            deck.push(values[j] + types[i]);
        }
    }

    // Mengacak deck
    for (let i = 0; i < deck.length; i++) {
        let indexOfDeck = Math.floor(Math.random() * deck.length); // diantara 0-1 kali dengan 52 kartu
        let temp = deck[i];
        deck[i] = deck[indexOfDeck];
        deck[indexOfDeck] = temp;
    }

    hiddenCard = deck.pop();
    dealer += getValue(hiddenCard);

    while (dealer < 17) {
        let card = deck.pop();
        dealer += getValue(card);
        addCard(card, "dealer-deck");
    }

    for (let i = 0; i < startingCard; i++) {
        let card = deck.pop()
        addCard(card, "player-deck");
        player += getValue(card);
    }

    document.getElementById("money").innerHTML = money;
    document.getElementById("player-sum").innerHTML = player;
}



stand = () => { // Menyimpan nilai kartu (End Game)
    hit = hit ? false : true;

    if (player < 21 && dealer < 21) {

        if (player > dealer) {
            money += pot;
        } else if (player < dealer) {
            money -= pot;
        } else {
            money += 0;
        }
    }

    if (player > 21 && dealer < 21) {
        money -= pot;
    }

    if (player < 21 && dealer > 21) {
        money += pot;
    }

    if (player > 21 && dealer > 21) {
        money += 0;
    }

}

takeCard = () => { // Mengambil kartu tambahan
    hit = player > 21 ? false : true;
    if (!hit) return;
    
    let card = deck.pop();
    addCard(card, "player-deck");
    player += getValue(card);
    document.getElementById("player-sum").innerHTML = player;
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

animateShuffle = () => {
    const left = [];
    const right = [];

    for (let i = 0; i < backCards.length; i++) {
        const backupCard = {
            i: backCards[i],
            xStart: backCards.x,
            yStart: backCards.y,
            xTarget: (backCards.width / 2) + (backCards.width / 2) * Math.random(),
            yTarget: -i * 1/4
        };

        if (Math.random() < 0.5) {
            left.push(backupCard);
            backupCard.xTarget *= -1;
        } else {
            right.push(backupCard);
        }
    }

    const animation = new AnimationFrames({
        delay: i * 2,
        duration: 200,
        easing: 'quadInOut'
    });

    animation.onprogress = (progress) => {
        const { xStart, xTarget, yStart, yTarget } = backupCard;
        backCards[i].x = xStart + progress * (xTarget + xStart);
        backCards[i].y = yStart + progress * (yTarget + yStart);
        backupCard.x = backCards[i].x;
        backupCard.y = backCards[i].y;
        backCards[i].update()
    };

    backCards[i].animation = animation;
}
// Optional :

// var chat = {
//     starting_1: "Welcome to my Blackjack Youngster!",
//     starting_2: "I'm the dealer, and you're the player.",
//     starting_3: "Let's start the game!",

//     insulting_1: "You're so bad at this game!",
//     insulting_2: "What a disgusting game.",
//     insulting_3: "Boring...",
//     insulting_4: "How can you lose this game?",
    
//     winning_1: "You're so lucky!",
//     winning_2: "You're so good at this game!",
//     winning_3: "Damn boy, give me your luck.",
//     winning_4: "I should start learning from you."
// };

// let x = Object.values(Object.entries(chat).reduce((acc,[k,v])=> {
//     let name = k.split("_").pop()
//   acc[name]= acc[name] || {name}
//   acc[name][k] = v
//   return acc
// },{}))

// console.log(x)