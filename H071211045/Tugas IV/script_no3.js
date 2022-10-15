
var input = prompt("Masukkan input:");

const map = new Map();

for (let i = 0; i < input.length; i++) {
    if (map.has(input[i])) {
        map.set(input[i], map.get(input[i]) + 1);

    } else {
        map.set(input[i], 1);
    }
}

for (let [key, value] of map) {
    if (key != " ") {
        console.log(key + " = " + value);
    } else {
        console.log("spasi = " + value);
    }
}
