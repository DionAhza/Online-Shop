<title>Toko Online | {{ $title }}</title>
<x-nav></x-nav>

<div class="container mt-5">
    <h1>Profile</h1>
    <p>Nama: {{ $akun->name }}</p>
    <p>alamat: {{ $akun->alamat }}</p>
    <p>Email: {{ $akun->email }}</p>
    <p>Pemeran: {{ $akun->role}}</p>
    <!-- Tambahkan informasi lain yang ingin ditampilkan -->
</div>
