<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko Online | {{ $title }}</title>
    
</head>
<x-nav></x-nav>
<body>
<main>
    <section id="carousel">
        <section id="barang" class="pb-5">
    <style>
        /* CSS untuk gambar carousel */
        .carousel-item img {
            width: 100%; /* Memenuhi lebar container carousel */
            height: auto; /* Mempertahankan rasio aspek gambar */
            object-fit: cover; /* Memastikan gambar mengisi area tanpa distorsi */
        }
        .carousel-inner {
            max-height: 550px; /* Atur tinggi maksimum untuk carousel */
            overflow: hidden; /* Sembunyikan bagian gambar yang melebihi batas tinggi */
        }
    </style>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators (dot navigation) -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Carousel Images -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.mygetplus.id/wp-content/uploads/2024/06/shopee-Visual-Blog-eShop-payday-june-768x461.png" class="d-block" alt="First Slide">
            </div>
            <div class="carousel-item">
                <img src="https://www.mygetplus.id/wp-content/uploads/2024/02/non-eshop-users-Visual-Blog-eShop-Payday-Feb-1-768x461.png" class="d-block" alt="Second Slide">
            </div>
            <div class="carousel-item">
                <img src="https://www.bee.id/wp-content/uploads/2022/03/Promo-Online-Shop-Reseller_web.jpg" class="d-block" alt="Third Slide">
            </div>
        </div>

        <!-- Carousel controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>



    <!-- Card 1 -->
    <div class="container">
        @if (session('delete'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('delete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
@endif 
        <div class="row">
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
                            <form action="{{ route('cart.add')}}" method="POST">
                                @csrf
                                <input type="hidden" name="barang_id" value="{{ $produk->id }}">
                                <button type="submit" class="btn btn-outline-warning mb-2">Masukan keranjang</button>
                            </form>
                            {{-- {{ dd(route('beli',$produk->id)) }} --}}
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
</section>


    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2JDzQ/o8ttI1zqWxnwIl24qPw1qZZhmfS2qFTwFtG5/8M8ZZU2K3NEN5pXG" crossorigin="anonymous"></script>
</main>
</body>

</html>