<title>Halaman | {{ $title }}</title>

<x-nav></x-nav>

<div class="container mt-5 mb-4">
    <h1 class="text-center mb-4">Daftar Orderan untuk {{ $userName->name }} </h1>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-4 col-xl-3">
            <div class="card shadow-sm bg-primary text-white order-card text-center">
                <div class="card-body">
                    <h6 class="mb-3">Orders Received</h6>
                    <div class="d-flex  align-items-center mb-0">
                        <svg  xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                          </svg>
                        <h2 class=""><span>{{ count($orders) }}</span></h2>
                    </div>
                    <hr class="my-4">
                    {{-- <p class="mb-0">Completed Orders <span class="float-end">351</span></p> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Pesanan</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($orders as $order)
            <div class="col">
                <div class="card h-100 shadow-lg border-0">

                    <img src="{{ asset('img/' . $order->barang->gambar) }}" class="card-img-top rounded-top" alt="{{ $order->barang->nama_barang }}" style="object-fit: cover; height: 200px;">
                    
                    <div class="card-body bg-light">
                        <h5 class="card-title fw-bold text-primary">{{ $order->barang->nama_barang }}</h5>
                        <p class="card-text"><strong>Pembeli: </strong>{{ $order->user->name }}</p>
                        <p class="card-text"><strong>Jumlah: </strong>{{ $order->jumlah }}</p>
                        <p class="card-text"><strong>Harga: </strong>Rp. {{ number_format($order->jumlah * $order->barang->harga, 0, ',', '.') }}</p>
                        <p class="card-text"><strong>Alamat: </strong>{{ $order->user->alamat }}</p>
                        <p class="card-text"><strong>Metode Pembayaran: </strong>{{ $order->pembayaran }}</p>
                    </div>

                    <div class="card-footer bg-white">
                        <form action="{{ route('terima',$order->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-success w-100">Sudah Diterima</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
