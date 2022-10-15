var nama = prompt('Masukkan nama Anda');
console.log(nama);
switch(nama) {
    default :
    console.log('Masukkan Nama Anda Terlebih Dahulu');
    break;
}
var Pertanyaan1 = prompt('Sudah Mengumpulkan Tugas Praktikum ? Yes ata No')

switch(Pertanyaan1) {
    case 'Yes':
        var Pertanyaan2 = prompt('Ikut Asistensi ? Yes atau No');
        switch(Pertanyaan2) {
            case 'Yes':
                var angka = prompt('Sudah Berapa Kali Asistensi ? 1 atau 2');
                if (angka == 1){
                    console.log('Asistensi Sekali lagi ya');
                }else if (angka == 2){
                    console.log('Hebat Kamu');
        }
                break;
            case 'No':
                console.log('Asistensi Dulu Ya');
                break;
        }
        break;
    case 'No':
        console.log('Jangan lupa di kerja tugas praktikumnya');   
        break;
    default :
    console.log('Masukkan input yang benar yaitu Yes atau No');
    break;
}
