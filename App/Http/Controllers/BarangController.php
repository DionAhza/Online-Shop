<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    //

    public function index()
    {
        return view('barang.create',["title"=>"Tambah Barang"]);
    }

    
    public function store(Request $request)
{
    // Validasi data
    $validatedData = $request->validate([
        'bayar' => 'required|array',
        'bayar.*' => 'in:COD,Transfer,Qris',
        'nama_barang' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'stock' => 'required|numeric',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Pindahkan file gambar ke direktori 'public/img'
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName(); // Membuat nama file unik
        $file->move(public_path('img'), $filename); // Pindah ke folder 'public/img'

        // Simpan data ke database dengan nama file gambar
        Barang::create([
            'user_id' => auth()->id(),
            'bayar' => json_encode($validatedData['bayar']),
            'nama_barang' => $validatedData['nama_barang'],
            'harga' => $validatedData['harga'],
            'stock' => $validatedData['stock'],
            'gambar' => $filename, // Simpan nama file di database
        ]);
    }

    return redirect()->route('home')->with('success', 'Barang berhasil disimpan.');
}

    


    public function show($id)
    {
        // Mengambil barang berdasarkan id
        $barang = Barang::with('user')->findOrFail($id);
        
        // Mengirim data barang ke view
        return view('pelanggan.barang',["title"=>"Detail"], compact('barang'));
    }


    public function destroy($id){
        $barang = Barang::findOrFail($id);

        $barang->delete();

        
        return redirect()->route('home')->with('delete','berhasil dihapus');
    }

    public function update(Request $request, $id) {
        $validatedData =  $request->validate([
            'bayar' => 'required|array',
            'bayar.*' => 'in:COD,Transfer,Qris',
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 'nullable' if user doesn't need to update the image
        ]);
    
        $barang = Barang::findOrFail($id);
    
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
    
            // Update with new image
            $barang->update([
                'bayar' => json_encode($validatedData['bayar']),
                'nama_barang' => $validatedData['nama_barang'],
                'harga' => $validatedData['harga'],
                'stock' => $validatedData['stock'],
                'gambar' => $filename,
            ]);
        } else {
            // Update without image
            $barang->update([
                'bayar' => json_encode($validatedData['bayar']),
                'nama_barang' => $validatedData['nama_barang'],
                'harga' => $validatedData['harga'],
                'stock' => $validatedData['stock'],
            ]);
        }
    
        return redirect()->route('barang.show',$id)->with('update', 'Barang berhasil diupdate!');
    }
    
    public function cari(Request $request) {
        $cari = $request->cari;
    
        // Cari barang berdasarkan nama_barang atau nama penjual
        $barang = Barang::with('user')
            ->where('nama_barang', 'like', "%{$cari}%")
            ->orWhereHas('user', function ($query) use ($cari) {
                $query->where('name', 'like', "%{$cari}%");
            })
            ->paginate();
    
        // Cek apakah ada hasil
        if ($barang->isEmpty()) {
            return view('pelanggan.cari', [
                'barang' => $barang,
                'title' => 'Pencarian',
                'judul' => $request->cari
            ])->with('gagal_cari', 'Tidak ada hasil pencarian yang cocok.');
        }
    
        return view('pelanggan.cari', [
            'barang' => $barang,
            'title' => 'Pencarian',
            'judul' => $request->cari
        ])->with('berhasil_cari', 'Hasil pencarian ditemukan.');
    }
    
    
    
}
