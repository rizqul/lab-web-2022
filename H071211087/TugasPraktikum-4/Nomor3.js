var input ="Hello";
const map = new Map();

for (let i=0; i< input.length; i++){
    if (map.has(input[i])) {
        map.set(input[i],map.get(input[i]) +1);

    
} else { 
    map.set(input[i],1);
    
}}
console.log (map);
for (var[kunci,nilai]of map){
    if (kunci == " ") {
        console.log ("spasi = " + nilai)
    } else {
        console.log (kunci + "=" + nilai);
    }
}