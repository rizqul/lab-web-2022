Tabe kak, ini filenya.

**Problem :**
_Terdapat di game kedua dan seterusnya._
Di game pertama itu, saat kita memasukan uang betting dia tetap terbaca sesuai yang di input.

Kalau untuk game kedua dan seterusnya, ada terdapat `bug` yang membaca inputan betting nya tidak
sesuai sehingga uang yang berkurang karena betting bisa lebih banyak dari inputan yang dimasukkan itu.

# Kasus :
- Berikut ini pada bettingan untuk memulai permainan kedua. Gambar dibawah, kita memasukkan input `2000` dengan uang yang tersedia yaitu `5000`. 
<img src="https://i.postimg.cc/nrQs2P6q/problem1.png">

- Setelah di tekan tombol bet nya, uang yang terkuras bukan hanya sebesar `2000` tapi sudah lebih dari itu.
<img src="https://i.postimg.cc/Gm0cv2L7/problem2.png">

# Kemungkinan Letak Masalah :
Dikarenakan masalahnya dimulai dari permainan kedua, saya sudah mempersiapkan fungsi baru untuk mereset game seperti semula tanpa mengubah jumlah uang dari permainan sebelumnya dalam bentuk fungsi `prepareGame()`. Untuk fungsi yang bertugas sebagai perantara game sebelum dan game selanjutnya yaitu fungsi `stand()` sehingga mungkin peletakkan fungsinya yang bermasalah dengan nilai variabel `bet` yang tertimpa di fungsi `askBet()`.

Kurang lebih begitu kak, mohon pencerahannya.