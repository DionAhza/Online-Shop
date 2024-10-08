
<title>Halaman | {{ $title }}</title>
<x-nav></x-nav>
<div class="container">
    <h1 class="text-center m-4">
        Toko 
        @if($barang->isNotEmpty())
            {{ $barang->first()->user->name }}
        @else
            (Tidak ada barang)
        @endif
    </h1>
    <div class="row">
        @if (session('berhasil_cari'))
    <div class="alert alert-success">
        {{ session('berhasil_cari') }}
    </div>
@endif



        @foreach ($barang as $produk)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100"> <!-- h-100 membuat tinggi card sama -->
                    <a href="{{ route('barang.show', $produk->id) }}" class="text-decoration-none text-black">
                        <img src="{{ asset('img/' . $produk->gambar) }}" alt="{{ $produk->nama_barang }}" class="img-fluid card-img-top" style="height: 200px; object-fit: cover;"> <!-- height dan object-fit memastikan gambar tetap proporsional -->
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $produk->nama_barang }}</h5>
                        <h5 class="card-title">{{ $produk->alamat }}</h5>
                        <p class="card-text mb-2">Rp: {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    </a>
                        <div class="mt-auto"> <!-- Ini agar tombol ada di bagian bawah -->
                            <a href="#" class="btn btn-outline-primary">Masukan keranjang</a>
                            <a href="" class="btn btn-outline-secondary">Beli langsung</a>
                        </div>
                    </div>
                </div>
            </div>
            
            
            @endforeach