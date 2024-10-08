<title>Toko Online | {{ $title }}</title>
<x-nav></x-nav>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data" class="p-5">
    @csrf
    <div class="form-group">
        <label for="bayar">Metode pembayaran</label>
<div class="form-check">
    <input class="form-check-input" type="checkbox" name="bayar[]" id="bayar_cod" value="COD">
    <label class="form-check-label" for="bayar_cod">
        COD
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="checkbox" name="bayar[]" id="bayar_transfer" value="Transfer">
    <label class="form-check-label" for="bayar_transfer">
        Transfer
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="checkbox" name="bayar[]" id="bayar_qris" value="Qris">
    <label class="form-check-label" for="bayar_qris">
        Qris
    </label>
</div>
    </div>
    <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
    </div>
    <div class="form-group">
        <label for="harga">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga" required>
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" required>
    </div>
    <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

