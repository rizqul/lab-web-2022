var playerName = "Player";

const values = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
const types = ["H", "K", "S", "W"]; // H = Hati, K = Klober, S = Sekop, W = Wajik
const startingCard = 2;

var backCard = document.createElement("img");
backCard.className = "cards";
backCard.src = "assets/back_red.png";

var pot = document.getElementById("total-pot").innerHTML;
var player = document.getElementById("money").innerHTML;

var mode = ["Poor", "Classic", "Professional", "Mafia", "Billionaire"];

var hiddenCard;
var haveAceP1, haveAceP2;
var hit, deck, money;
var startingMoney = 5000;

function startGame() { // Memulai game
    money = startingMoney;
    switchWindow("menu", "game");
    askBet();
    updateStatus();
}

prepareGame = () => { // Mengatur game
    document.getElementById("bet").value = "";
    document.getElementById("game-result").innerHTML = "";
    document.getElementById("player-deck").innerHTML = "";
    document.getElementById("dealer-deck").innerHTML = "";
    dealer = player = bet = 0;
    hit = true;
    deck = [];
}

makeDeck = () => { // Mengatur Kartu
    haveAceP1 = haveAceP2 = false;
    pot = 0;

    // Memuat deck -> [..., 2S, 3S, 4S, 5S ..]
    for (let i = 0; i < types.length; i++) {
        for (let j = 0; j < values.length; j++) {
            deck.push(values[j] + types[i]);
        }
    }

    // Mengacak deck -> [.., JH, 3S, AK, JS..]
    for (let i = 0; i < deck.length; i++) {
        let indexOfDeck = Math.floor(Math.random() * deck.length); // diantara 0-1 kali dengan 52 kartu
        let temp = deck[i];
        deck[i] = deck[indexOfDeck];
        deck[indexOfDeck] = temp;
    }

    // Menambah kartu pertama ke dealer
    hiddenCard = deck.pop();
    dealer += getValue(hiddenCard);
    document.getElementById("dealer-deck").append(backCard);

    // Menambah kartu kedua ke dealer
    let card = deck.pop();
    addCard(card, "dealer-deck");
    dealer += getValue(card);

    // Menambah kartu ke player
    for (let i = 0; i < startingCard; i++) {
        let card = deck.pop();
        addCard(card, "player-deck");
        player += getValue(card);
    }
}

takeCard = () => { // Mengambil kartu tambahan
    hit = (player > 21 && hit == true) ? false : true;
    if (!hit) return;
    let card = deck.pop();
    // let card = "AK"; // -- debug ace
    addCard(card, "player-deck");
    player += getValue(card);
    updateStatus();
}

switchWindow = (origin, target) => { // Mengganti tampilan
    document.getElementsByClassName(origin)[0].style = "display: none; z-index:-50;";
    document.getElementsByClassName(target)[0].style = "display: block; z-inde:=50;";
}

addCard = (card, targetParent) => { // Menambahkan kartu ke dalam deck  
    let card_image = document.createElement("img");
    card_image.className = "cards drawn";
    card_image.src = "assets/cards/" + card + ".png";
    document.getElementById(targetParent).append(card_image);
    return animateCard(targetParent);
}

getValue = (card) => { // Menghitung nilai kartu
    let value = card.substring(0, card.length - 1);
    if (value == "A") return 11;
    else if (value == "J" || value == "Q" || value == "K") return 10;
    return parseInt(value);
}

askBet = () => { // Meminta bet
    prepareGame();
    blackjack = money * 5;
    if (money < 1)
        popUp("reset-money", 1);
    else
        popUp("betting", 1);
}

updateStatus = () => { // Update status
    player = checkAce(player, "player-deck", haveAceP1);
    dealer = checkAce(dealer, "dealer-deck", haveAceP2);
    document.getElementById("player-sum").innerHTML = player;
    document.getElementById("total-pot").innerHTML = pot;
    document.getElementById("money").innerHTML = money;
    document.getElementsByClassName("exit")[0].disabled = false;
    document.getElementById("stay-button").disabled = false;
    document.getElementById("take-button").disabled = false;
    if (bet > 0) bet = "";
}

checkAce = (playerScore, targetParent, haveAce) => { // Mengecek apakah ada kartu ada Ace
    if (playerScore > 21 && !haveAce) {
        for (let i = 0; i < document.getElementById(targetParent).children.length; i++) {
            if (document.getElementById(targetParent).children[i].src.includes("A")) {
                haveAceP1 = (targetParent == "player-deck") ? true : haveAce;
                haveAceP2 = (targetParent == "dealer-deck") ? true : haveAce;
                playerScore -= 10;
                break;
            }
        }
    }
    return playerScore;
}

stand = () => { // Menyimpan nilai kartu, ini fitur game (Seperti Submit)
    updateStatus();
    let belowLimit = (player <= 21 && dealer <= 21);
    let botAI = Math.floor(Math.random() * 16) + 3;

    hit = (hit == true) ? false : true;

    document.getElementById("dealer-deck").removeChild(backCard);
    addCard(hiddenCard, "dealer-deck");

    while (dealer < botAI) {
        let card = deck.pop();
        dealer += getValue(card);
        addCard(card, "dealer-deck");
    }

    // Tombol di nonaktifkan sementara animasi berjalan
    document.getElementById("stay-button").disabled = true;
    document.getElementById("take-button").disabled = true;
    document.getElementsByClassName("exit")[0].disabled = true;

    let playerCount = document.getElementById("player-deck").children.length;
    let dealerCount = document.getElementById("dealer-deck").children.length;

    if ((belowLimit && ((player > dealer) || (playerCount >= 5))) || (dealer > 21 && player <= 21)) {
        document.getElementById("game-result").innerHTML = "You Win!";
        money += pot;

    } else if ((belowLimit && ((dealer > player) || (dealerCount >= 5))) || (player > 21 && dealer <= 21)) {
        document.getElementById("game-result").innerHTML = "You Lose!";

    } else if ((player == 21 && dealer != 21)) {
        document.getElementById("game-result").innerHTML = "Blackjack!";
        money += blackjack;

    } else {
        money += Math.round(pot / 2);
        document.getElementById("game-result").innerHTML = "Draw!";
    }

    chat();
    setTimeout(() => {
        updateStatus();
        popUp("game-over", 1);
    }, 3000);

}

popUp = (window, index) => {
    if (index == 1) {
        document.getElementsByClassName("overlay")[0].style.display = "block";
        document.getElementsByClassName(window)[0].style.zIndex = "50";
    } else if (index == 0) {
        document.getElementsByClassName("overlay")[0].style.display = "none";
        document.getElementsByClassName(window)[0].style.zIndex = "-50";
    }
}

chat = () => { // Chat bot dari dealer
    let chat = document.getElementById("dealer-chat");
    let condition = document.getElementById("game-result").innerHTML;

    win = ["Damn you boy! I got " + dealer, "Just a card of " + dealer + ". You lucky bastard.",
        "Spend that money on next round.", "I thought mine was bigger."];
    lose = ["No luck for you today. This " + dealer + " is big.", "Poor man will always get poor.",
    "You're so unlucky. Mine is only " + dealer];
    draw = ["Draw? Really?", "Only on this time boy.", "LMAO, Draw.", "Why do this outcome is possible?"];
    random = ["Are you sure, mortal?", "Gambit is not good for health", "You better luck this time."];

    if (condition == "You Win!" || condition == "Blackjack!") {
        chat.innerHTML = win[Math.floor(Math.random() * win.length)];
    } else if (condition == "You Lose!") {
        chat.innerHTML = lose[Math.floor(Math.random() * lose.length)];
    } else if (condition == "Draw!") {
        chat.innerHTML = draw[Math.floor(Math.random() * draw.length)];
    } else {
        chat.innerHTML = random[Math.floor(Math.random() * random.length)];
    }
}

animateCard = (deckName) => { // Animasi kartu dibagi
    deckName = "." + deckName;

    // Mengambil posisi x dari firstPlace
    let xFirst = $("#back-card").offset().left;
    let yFirst = $("#back-card").offset().top;

    // Mengambil posisi x dari kartu terbaru
    let xCard = $(deckName + " .drawn:last-child").offset().left;
    let yCard = $(deckName + " .drawn:last-child").offset().top;

    // Menyesuaikan posisi kartu terbaru dengan posisi firstPlace
    $(deckName + " .drawn:last-child").offset({
        top: yFirst,
        left: xFirst
    });

    // Animasi dari firstPlace ke kartu terbaru
    $(deckName + " .drawn:last-child").animate({
        top: yCard - (yFirst - 30),
        left: xCard - (xFirst - 30)
    }, 600, function () {
        // Penyetelan ke posisi awal agar kartu menyesuai lagi
        $(deckName + " .drawn").css({
            position: "relative",
            top: 0,
            left: 0
        });
    });
}

button = { // Kumpulan Tombol
    playAgain: $("#play-again").click(function () {
        document.getElementById("game-result").innerHTML = "";
        popUp("game-over", 0);
        askBet();
        updateStatus();
        chat();
    }),

    exit: $(".exit").click(function () {
        switchWindow("game", "menu");
        popUp("betting", 0);
        popUp("reset-money", 0);
        popUp("game-over", 0);
        prepareGame();
        makeDeck();
        updateStatus();
        chat();
    }),

    submit: $("#submit").click(function () {
        bet = parseInt(document.getElementById("bet").value);
        if (!isNaN(bet)) {
            if (bet > money) {
                alert("You don't have enough money!");
                return;
            }

            makeDeck();
            pot += bet;
            money -= bet;
            pot += (Math.floor(Math.random() < 0.5) && bet > 500 ? (bet + 250) : (bet)); // Uang dari dealer
            chat();
            updateStatus();
            popUp("betting", 0);

        } else {
            alert("Please input a valid number!");
        }
    }),

    withdraw: $("#withdraw").click(function () {
        money = startingMoney;
        updateStatus();
        popUp("reset-money", 0);
        chat();
        askBet();
    }),

    gotoOptions: $("#goto-options").click(function () {
        switchWindow("menu", "preferences");
    }),

    rename: $("#submit-name").click(function () {
        playerName = document.getElementById("player-name-input").value;
        document.getElementById("player-name-input").value = "";
        document.getElementById("player-name-input").placeholder = playerName;
        document.getElementById("player-name").innerHTML = playerName;
    }),

    switchMode: $("#switch-mode").click(function () {
        let x = mode.indexOf(document.getElementById("money-mode").innerHTML) + 1;
        if (x > mode.length - 1) x = 0;
        document.getElementById("money-mode").innerHTML = mode[x];
        switch (x) {
            case 0:
                startingMoney = 100;
                break;
            case 1:
                startingMoney = 5000;
                break;
            case 2:
                startingMoney = 25000;
                break;
            case 3:
                startingMoney = 75000;
                break;
            case 4:
                startingMoney = 1000000;
                break;
        }
        money = startingMoney;
    }),

    goBack: $("#go-back").click(function () {
        switchWindow("preferences", "menu");
    })
}