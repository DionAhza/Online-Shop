<title>Halaman | {{ $title }}</title>
<x-nav></x-nav>
@if (session('berhasil_cari'))
<div class="alert alert-success">
    {{ session('berhasil_cari') }}
</div>
@endif
@if (session('gagal_cari'))
<div class="alert alert-danger">
    {{ session('gagal_cari') }}
</div>
@endif
<h2 class="text-center text-opacity-20 m-2">Hasil Pencarian: {{ $judul }}</h2>
<div class="row m-4">
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
                    @guest
                    <button  data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-outline-primary">Masukan keranjang</button>
                    <button  data-bs-toggle="modal" data-bs-target="#loginModal"  class="btn btn-outline-secondary">Beli langsung</button>
                    {{-- Modalll --}}
                    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="loginModalLabel">Silahkan login terlebih dahulu</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                          
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    {{-- /Modall --}}
                    @endguest
                    @auth
                    <a href="" class="btn btn-outline-primary">Masukan keranjang</a>
                    <a href="" class="btn btn-outline-secondary">Beli langsung</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    
    
    @endforeach
    <!-- Card 2 -->
    <!-- Add more cards as needed -->
</div>
</div>