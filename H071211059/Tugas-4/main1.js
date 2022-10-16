// https://id.pinterest.com/pin/723179652655443224/

let nama = prompt("What is your name? ");

while (true) {
  var brew = prompt("Do you want to brew your own coffee today?").toLowerCase();
  if (checkInput(brew)) {
    console.log("Masukkan input dengan benar");
    break;
  }

  if (brew === "yes") {
    var milk = prompt("Do you prefer milk in your coffee?").toLowerCase();
    if (checkInput(milk)) {
      console.log("Masukkan input dengan benar");
      break;
    }

    if (milk === "yes") {
      var espresso = prompt("Do you own an espresso machine?");
      if (checkInput(espresso)) {
        console.log("Masukkan input dengan benar");
        break;
      }

      if (espresso === "yes") {
        var abroad = prompt(
          "Do you dream of your semester abroad in Australia or New Zealand?"
        ).toLowerCase();
        if (checkInput(abroad)) {
          console.log("Masukkan input dengan benar");
          break;
        }

        if (abroad === "yes") {
          console.log("Flat white☕");
          break;
        } else {
          var aLotOfMilk = prompt("Do you want a lot of milk?").toLowerCase();
          if (checkInput(aLotOfMilk)) {
            console.log("Masukkan input dengan benar");
            break;
          }

          if (aLotOfMilk === "yes") {
            console.log("Latte☕");
            break;
          } else {
            console.log("Cappucino☕");
            break;
          }
        }
      } else {
        console.log("Biatelli☕");
        break;
      }
    } else {
      var creative = prompt("Do you like to get creative with recipes?");
      if (checkInput(creative)) {
        console.log("Masukkan input dengan benar");
        break;
      }

      if (creative === "yes") {
        console.log("Aeropress☕");
        break;
      } else {
        var basic = prompt("Do you want to stay nice and basic?");
        if (checkInput(basic)) {
          console.log("Masukkan input dengan benar");
          break;
        }
        if (basic === "yes") {
          console.log("French press☕");
          break;
        } else {
          console.log("Clever dripper☕");
          break;
        }
      }
    }
  } else {
    console.log("See your friendly local barista😀");
    break;
  }
}

function checkInput(str) {
  return (str != "yes" && str != "no") || str.trim().length === 0;
}
