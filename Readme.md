# Proyek Web dengan Front-End dan Back-End

Proyek ini terdiri dari dua bagian utama:
- **Front-End**: HTML, CSS, dan JavaScript yang dijalankan menggunakan Live Server.
- **Back-End**: PHP dan MySQL yang dijalankan pada Apache Web Server di localhost.

## Fitur Utama
- Front-End berjalan menggunakan **Live Server** (untuk pengembangan lokal).
- Back-End menggunakan **PHP** untuk menangani logika server.
- Database **MySQL** untuk penyimpanan data.
- Web server berjalan pada **Apache Server** (lokal).
  
## Prasyarat
Untuk menjalankan proyek ini di komputer Anda, pastikan Anda memiliki hal-hal berikut:
- **XAMPP/WAMP/MAMP** atau **LAMP** untuk menjalankan Apache Server dan MySQL.
- **Visual Studio Code** (atau editor kode lainnya) untuk mengedit file.
- **Live Server Extension** di Visual Studio Code (untuk menjalankan front-end).

## Langkah-Langkah Instalasi

### 1. Mengatur Server Lokal
- Download dan install **XAMPP** (atau WAMP/MAMP) dari [situs resmi XAMPP](https://www.apachefriends.org/index.html).
- Setelah instalasi selesai, buka XAMPP dan mulai layanan **Apache** dan **MySQL**.

### 2. Menyiapkan Database
1. Buka **phpMyAdmin** melalui browser dengan mengakses `http://localhost/phpmyadmin/`.
2. Buat database baru untuk aplikasi Anda, misalnya `minimarket`.

### 3. Menyiapkan Proyek
1. **Clone Repositori minimarketApp** ke dalam folder htdocs (jika menggunakan XAMPP) atau folder `www` (jika menggunakan WAMP) di direktori instalasi server Anda.
   - Misalnya: `C:\xampp\htdocs\minimarketApp`
2. Pindahkan folder `api` ke dalam direktori `C:\xampp\htdocs\`
3. Impor database `minimarket.sql` yang ada pada folder `db` ke datatabse yang baru dibuat.
4. Folder `front-end` (HTML, CSS, JS) bisa ditempatkan di dalam folder yang sesuai di dalam direktori proyek.

### 4. Menjalankan Back-End
- Buka aplikasi XAMPP
- Jalankan server Apache dan MySQL

### 5. Menjalankan Front-End dengan Live Server
1. Buka **Visual Studio Code** dan buka folder proyek Anda `front-end`.
2. Install **Live Server** extension jika belum ada (bisa diinstal melalui VS Code Extensions).
3. Klik kanan pada file `index.html` (atau file utama Anda) dan pilih **Open with Live Server**.
4. Anda bisa mengakses front-end melalui browser di `http://localhost:5500/` (port default Live Server).

## Struktur Folder Proyek
