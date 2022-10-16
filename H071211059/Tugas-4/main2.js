//  Input pertama
const select = prompt("Ingin menghitung faktorial atau bilangan fibonacci? ");

if (select.toUpperCase().trim() == "FIBONACCI") {
  let input = prompt("Hingga index ke berapa?");
  console.log(checkInput(input, select));
} else if (select.toUpperCase() == "FAKTORIAL") {
  let input = prompt("Faktorial dari?");
  console.log(checkInput(input, select));
} else {
  alert("Masukkan input dengan benar!");
}

// Cek jenis inputan
function checkInput(input, select) {
  input = parseInt(input);

  if (isNaN(input)) {
    console.log("Masukkan input yang benar");
  } else {
    if (select.toUpperCase().trim() == "FAKTORIAL") {
      return factorial(input);
    } else {
      return fibonacci(input);
    }
  }
}

// Fungsi untuk menghitung faktorial
function factorial(n, temp = 1) {
  if (n == 0) {
    return temp;
  }

  return factorial(n - 1, temp * n);
}

// Fungsi untuk menghitung bilangan fibonacci
function fibonacci(number, firstNumber = 0, secondNumber = 1, result = [0]) {
  if (number == 0) {
    return firstNumber;
  }

  if (number == 1) {
    result.push(secondNumber);
    return result;
  }

  result.push(secondNumber);

  return fibonacci(
    number - 1,
    secondNumber,
    firstNumber + secondNumber,
    result
  );
}
