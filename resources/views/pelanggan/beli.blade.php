<title>Halaman | {{ $title }}</title>

<x-nav></x-nav>
<div class="container my-5">
    <div class="row">
        <div class="card shadow-sm rounded">
        <!-- Card Column -->
        <div class="col-md-4">
                <div class="card-image position-relative">
                    <span class="badge bg-primary position-absolute top-0 start-0 m-3 p-2">{{ $barang->created_at->format('Y-m-d') }}</span>
                    <img class="img-fluid w-100 rounded-top" src="{{ asset('img/' . $barang->gambar) }}" alt="{{ $barang->nama_barang }}" style="height: 250px; object-fit: cover;">
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                    <span class="badge bg-warning text-white text-dark mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 24"><path d="M12 3c2.131 0 4 1.73 4 3.702 0 2.05-1.714 4.941-4 8.561-2.286-3.62-4-6.511-4-8.561 0-1.972 1.869-3.702 4-3.702zm0-2c-3.148 0-6 2.553-6 5.702 0 3.148 2.602 6.907 6 12.298 3.398-5.391 6-9.15 6-12.298 0-3.149-2.851-5.702-6-5.702zm0 8c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm8 6h-3.135c-.385.641-.798 1.309-1.232 2h3.131l.5 1h-4.264l-.344.544-.289.456h.558l.858 2h-7.488l.858-2h.479l-.289-.456-.343-.544h-2.042l-1.011-1h2.42c-.435-.691-.848-1.359-1.232-2h-3.135l-4 8h24l-4-8zm-12.794 6h-3.97l1.764-3.528 1.516 1.528h1.549l-.859 2zm8.808-2h3.75l1 2h-3.892l-.858-2z"/></svg>{{ $cart->user->alamat }}</span>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-info text-white text-dark">Jumlah: {{ $cart ? $cart->quantity : 'Belum di keranjang' }}</span>
                        <span class="badge bg-success">Rp. {{ number_format($barang->harga * $cart->quantity, 0, ',', '.') }}</span>
                    </div>
                    <!-- Pilihan Pembayaran -->

                    <form action="{{ route('bayar', $barang->id) }}" method="POST">
                        @csrf
                        <h6>Pilih Metode Pembayaran:</h6>
                        @if ($pembayaranOptions)
                            @foreach ($pembayaranOptions as $option)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pembayaran" id="bayar_{{ strtolower($option) }}" value="{{ $option }}">
                                    <label class="form-check-label" for="bayar_{{ strtolower($option) }}">
                                        {{ $option }}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    
                        <button type="submit" class="btn btn-primary w-100">Bayar</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

