// Muhammad Erwin Arif H071211059
var str = prompt("Masukkan kalimat: ");

const result = countChar(str);

function countChar(str) {
  let result = {};
  for (let i = 0; i < str.length; i++) {
    if (result[str[i]] === undefined) {
      result[str[i]] = 1;
    } else {
      result[str[i]] += 1;
    }
  }

  if (result[" "] != undefined) {
    result["spasi"] = result[" "];
    delete result[" "];
  }
  return result;
}
console.log(result);

for (const character in result) {
  console.log(`${character} = ${result[character]}`);
}

document.write("<h1>", str, "</h1>");
