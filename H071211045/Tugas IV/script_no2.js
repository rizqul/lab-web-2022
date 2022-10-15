
var operation = prompt("Masukkan operasi yang ingin dilakukan (x, /, +, -):");
var operator = ["x", "/", "+", "-"];

// Jika operasi yang dimasukkan tidak ada dalam tabel, maka akan muncul pesan error
if (operator.indexOf(operation) == -1) {
    alert("Operasi tidak ditemukan!");

} else {
    var firstNum = prompt("Masukkan angka pertama:");
    var secondNum = prompt("Masukkan angka kedua:");

    // Jika input bukan angka
    if (isNaN(firstNum) || isNaN(secondNum)) {
        console.log("Input harus berupa angka!");
    }
    
    switch (operation) {
        case operator[0]:
            for (let i = 1; i <= secondNum; i++) {
                console.log(i + " x " + firstNum + " = " + (i * firstNum));
            }
            break;
        case operator[1]:
            for (let i = firstNum; i > 0; i--) {
                console.log(i + " / " + secondNum + " = " + (i / secondNum));
            }
            break;
        case operator[2]:
            for (let i = 1; i <= secondNum; i++) {
                console.log(i + " + " + firstNum + " = " + (i + firstNum));
            }
            break;
        case operator[3]:
            for (let i = firstNum; i >= secondNum; i--) {
                console.log(i + " - " + secondNum + " = " + (i - secondNum));
            }
            break;

    }
}