var num = prompt("Perkalian Berapa");
var bum = prompt("Ingin Dikalikan Sampai Berapa ?");
var i = 1;
var tm = 0;
for (i = 1; i <= bum; i++) {
    console.log(num + "x" + i + "=" + num * i);
    tm = tm + num * i;
}
console.log("Total nya Adalah = " + tm);
