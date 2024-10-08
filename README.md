# 🛒 Online Shop Laravel

## 📋 Deskripsi Proyek
**Online Shop** adalah aplikasi e-commerce berbasis Laravel yang memungkinkan penjual untuk mengelola produk mereka dan pelanggan dapat dengan mudah berbelanja. Aplikasi ini menyediakan fitur autentikasi pengguna, manajemen produk, sistem keranjang belanja, dan proses pembayaran yang mudah dan aman.

## 🚀 Fitur Utama
- **Autentikasi Pengguna**: Registrasi dan login untuk pelanggan dan penjual, dengan akses yang berbeda.
- **Manajemen Produk**: Penjual dapat menambahkan, mengedit, dan menghapus produk yang mereka jual.
- **Keranjang Belanja**: Pelanggan dapat menambahkan produk ke keranjang sebelum melakukan pembayaran.
- **Pembayaran**: Berbagai metode pembayaran tersedia dan dicatat untuk setiap transaksi.
- **Manajemen Pesanan**: Penjual dapat melihat dan mengelola pesanan yang diterima.
- **Pencarian Produk**: Pelanggan dapat mencari produk berdasarkan nama atau penjual.

## 📦 Instalasi

1. **Clone** repositori ini ke lokal Anda:
    ```bash
    git clone https://github.com/DionAhza/Online-Shop
    cd online-shop
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
- **MySQL** - Sistem manajemen database relasional untuk menyimpan data produk, pengguna, dan pesanan.
- **Bootstrap** - Framework CSS untuk membuat desain responsif.
- **Blade** - Templating engine Laravel untuk pembuatan tampilan dinamis.
- **JavaScript** - Untuk fitur interaktif dan dinamis pada aplikasi.

## 📄 Dokumentasi API
| Endpoint                     | HTTP Method | Deskripsi                               |
|------------------------------|-------------|-----------------------------------------|
| `/register`                   | POST        | Mendaftarkan pengguna baru              |
| `/login`                      | POST        | Login untuk pengguna                    |
| `/products`                   | GET         | Mengambil daftar produk                 |
| `/products/{id}`              | GET         | Mengambil detail produk                 |
| `/cart/add`                   | POST        | Menambahkan produk ke keranjang         |
| `/order`                      | POST        | Membuat pesanan dari keranjang          |

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
Jika Anda memiliki pertanyaan atau saran, jangan ragu untuk menghubungi kami di [dionahza15@gmail.com](dionahza15@gmail.com).

