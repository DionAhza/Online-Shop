# 🎬 Laravel Movies

## 📋 Deskripsi Proyek
**Laravel Movies** adalah aplikasi web berbasis Laravel yang memungkinkan pengguna untuk menjelajahi, memberi rating, dan mencari film. Aplikasi ini menyediakan fitur untuk menambahkan, mengedit, dan menghapus film, serta memberikan rating pada film yang ditonton. Dengan antarmuka yang bersih dan responsif, pengguna dapat dengan mudah menemukan film favorit mereka.

## 🚀 Fitur Utama
- **Autentikasi Pengguna**: Pengguna dapat mendaftar dan masuk untuk mengakses fitur aplikasi.
- **Manajemen Film**: Admin dapat menambahkan, mengedit, dan menghapus informasi film.
- **Rating Film**: Pengguna dapat memberi rating dari 1 hingga 5 bintang untuk setiap film yang mereka tonton.
- **Pencarian Film**: Pengguna dapat mencari film berdasarkan judul atau genre.
- **Detail Film**: Menampilkan informasi lengkap tentang film, termasuk sinopsis, aktor, dan rating.

## 📦 Instalasi

1. **Clone** repositori ini ke lokal Anda:
    ```bash
    git clone https://github.com/DionAhza/Laravel-movies
    cd Laravel-movies
    ```

2. Instal dependensi menggunakan Composer:
    ```bash
    composer install
    ```

3. Salin file `.env.example` ke `.env`:
    ```bash
    cp .env.example .env
    ```

4. Generate kunci aplikasi:
    ```bash
    php artisan key:generate
    ```

5. Setel konfigurasi database di file `.env`, kemudian jalankan migrasi:
    ```bash
    php artisan migrate
    ```

6. Jalankan server:
    ```bash
    php artisan serve
    ```

7. Buka aplikasi di browser:
    ```
    http://localhost:8000
    ```

## 🛠️ Teknologi yang Digunakan
- **Laravel** - Framework PHP untuk pengembangan aplikasi web.
- **MySQL** - Sistem manajemen database relasional untuk menyimpan data film dan pengguna.
- **Bootstrap** - Framework CSS untuk membuat desain responsif.
- **Blade** - Templating engine Laravel untuk pembuatan tampilan dinamis.
- **JavaScript** - Untuk fitur interaktif dan dinamis pada aplikasi.

## 📄 Dokumentasi API
| Endpoint                     | HTTP Method | Deskripsi                               |
|------------------------------|-------------|-----------------------------------------|
| `/`                          | GET         | Mengambil daftar film                   |
| `/movies/{id}`              | GET         | Mengambil detail film                   |
| `/search`                   | GET         | Mencari film berdasarkan judul          |
| `/movies/rate/{id}`         | POST        | Memberikan rating pada film             |
| `/register`                 | POST        | Mendaftarkan pengguna baru              |
| `/login`                    | POST        | Login untuk pengguna                    |
| `/logout`                   | GET         | Logout pengguna                         |

## 👨‍💻 Kontribusi
Kontribusi sangat diterima! Ikuti langkah-langkah berikut untuk memulai:
1. **Fork** repositori ini.
2. Buat cabang baru untuk fitur atau perbaikan: 
    ```bash
    git checkout -b fitur-baru
    ```
3. Commit perubahan Anda: 
    ```bash
    git commit -m 'Menambahkan fitur baru'
    ```
4. Push ke cabang Anda: 
    ```bash
    git push origin fitur-baru
    ```
5. Buka **Pull Request** untuk review.

## 📧 Kontak
Jika Anda memiliki pertanyaan atau saran, jangan ragu untuk menghubungi kami di [dionahza15@gmail.com](mailto:dionahza15@gmail.com).
