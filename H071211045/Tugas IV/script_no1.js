var message;

alert("Selamat datang di Blackmarket Paman! \nTekan [OK] dan Silahkan Registrasi.")

message = "Masukkan nama Anda:";
var user_name = prompt(message);

// if (user_name !== undefined || user_name !== null)

while (user_name == "" || user_name.length < 3) {
    console.log("[!] : Tolong Masukkan nama anda dengan benar!");
    user_name = prompt(message);
}

// console.log("Selamat datang %s!", user_name);

message = "Masukkan umur Anda:";
var user_age = prompt(message);

while (user_age == "" || user_age < 1 || user_age > 150) {
    console.log("[!] : Tolong Masukkan umur anda dengan benar!");
    user_age = prompt(message);
}

if (user_age < 18) {
    alert("[!] : Maaf, Anda belum cukup umur untuk mengakses situs ini!");
} 
// else {
//     console.log("Selamat datang %s! (ID:%s)", user_name, (Math.random() + 5).toString(36).substring(7));
// }

message = "Masukkan alamat email Anda:";
var user_email = prompt(message);

while (user_email == "" || user_email.length < 5) {
    console.log("[!] : Tolong Masukkan email anda dengan benar!");
    user_email = prompt(message);
}

message = "Apakah Anda yakin dengan data yang Anda masukkan? \nNama: " + user_name + "\nUmur: " + user_age + "\nEmail: " + user_email + "\n(Y/N)";
var user_confirm = prompt(message).toUpperCase();

while (user_confirm == "") {
    console.log("[!] : Tolong masukkan input yang benar!");
    user_confirm = prompt(message);
}

if (user_confirm == "Y" || user_confirm == "YES") {
    console.log("Selamat datang %s! (ID:%s)", user_name, (Math.random() + 5).toString(36).substring(7));
    alert("Terima kasih telah registrasi, " + user_name + "!");
    
} else {
    console.log("[!] : Registrasi dibatalkan!");
    alert("Registrasi dibatalkan!");
}