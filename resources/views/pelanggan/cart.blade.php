<title>Halaman | {{ $title }}</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<x-nav></x-nav>

@if($carts->isEmpty())
<h1 class="text-center m-2">Isi keranjang {{ $user }} Kosong</h1>
@else
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<h1 class="text-center m-2">Isi keranjang {{ $user }} ada: {{ count($carts) }} Barang</h1>
            @foreach($carts as $item)
                <div class="container py-5">
                    <div class="row justify-content-center mb-3">
                      <div class="col-md-12 col-xl-10">
                        <div class="card shadow-0 border rounded-3">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                  <img src="{{ asset('img/' . $item->barang->gambar) }}" alt="{{ $item->barang->nama_barang }}"
                                    class="w-100" />
                                </div>
                              </div>
                              <div class="col-md-6 col-lg-6 col-xl-6">
                                <h5>{{$item->barang->nama_barang }}</h5>
                                <p class="text-truncate mb-4 mb-md-0">
                                Metode Pembayaran: <br>
                                @php
                                    $pembayaran = json_decode($item->barang->bayar)
                                @endphp
                                {{ implode(", ",$pembayaran) }}
                                </p>
                                {{-- Jumlah-------------------------- --}}
                                <div class="d-flex align-items-center">
                                    <!-- Tombol untuk kurangi jumlah -->
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                                        <button type="submit" class="btn btn-outline-secondary" 
                                            @if($item->quantity <= 1) disabled @endif>
                                            -
                                        </button>
                                    </form>
                                
                                    <!-- Jumlah Barang -->
                                    <p class="text-truncate mb-4 mb-md-0 mx-2 fs-3">{{ $item->quantity }}</p>
                                
                                    <!-- Tombol untuk tambah jumlah -->
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                        <button type="submit" class="btn btn-outline-secondary" 
                                            @if($item->quantity >= $item->barang->stock) disabled @endif>
                                            +
                                        </button>
                                    </form>
                                </div>
                                <form action="{{ route('cart.destroy',$item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger"><i class="material-icons">&#xe872;</i></button>
                            </form>
                              </div>
                              @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif
                            {{-- /Jumlah-------------------------------- --}}
                            
                              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                <div class="d-flex flex-row align-items-center mb-1">
                                  <h4 class="mb-1 me-1">Rp: {{ number_format( $item->barang->harga,0,",") }}</h4>
                                </div>
                                <a href="{{ route('toko',$item->barang->user_id) }}" >
                                <h6 class="text-success">Penjual: {{ $item->barang->user->name }}</h6>
                                </a>
                                <div class="d-flex flex-column mt-4">
                                  <a href="{{ route('barang.show',$item->barang->id) }}" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm" >Details</a>
                                  <a href="{{ route('beli',$item->barang->id) }}" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-sm mt-2" type="button">
                                    Checkout
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            @endforeach
@endif
