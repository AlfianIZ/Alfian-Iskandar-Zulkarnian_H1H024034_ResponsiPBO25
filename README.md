# Nama   : Alfian Iskandar Zulkarnain
# NIM   : H1024034
# Shift Awal : B
# Shift Akhir : D

## Penjelasan
Ini adalah simulasi web sederhana sekali untuk melatih Pokemon, yaitu Ninetales. Pada simulasi ini user bisa melatih pokemon untuk meningkatkan stats(level dan hp), serta melihat riwayat dari latihan yang telah dilakukan.

Simulasi web ini menggunakan PHP Native dengan konsep OOP. Di sini, data disimpan sementara menggunakan session. 

Terdapat 5 file:
1. pokemmon.php, abstract class pokemon yang berisi logika perhitungan level, hp, dan pencatatan waktu.
2. ninetales.php, adalah turunan dari abstract class Pokemon yang terdapat pada pokemon.php, pada class ninetales juga merubah logika pada method train.
3. index.php, halaman awal untuk melihat status Pokemon saat ini.
4. train.php, berisi form untuk latihan, saat dikirimkan data diubah oleh logika di ninetales.php
5. history.php, menampilkan tabel riwayat latihan yang tersimpan dalam memori objek.

## Cara Menjalankan Program
Karena saya menggunakan laragon maka saya akan menuntukkan cara menjalannkan program dengan laragon:
1. Buka laragon
2. Jalankan Apache
3. Klik kanan pada laragon -> www -> pilih folder dimana kamu menyimpan kode tersebut -> klik folder tersebut.

