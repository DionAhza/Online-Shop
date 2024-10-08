<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id(); // Mendapatkan user yang sedang login
        $userName = auth()->user(); // Mendapatkan user yang sedang login
        $carts = Cart::where('user_id', $userId)->get(); // Mengambil data keranjang sesuai user

        return view('pelanggan.cart', ['carts' => $carts,"title"=>"cart","user"=>$userName->name]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi barang_id dari request
    $validated = $request->validate([
        'barang_id' => 'required|exists:barangs,id', // Barang harus ada di tabel barangs
    ]);

    // Ambil user ID yang sedang login
    $userId = auth()->id();

    // Cek apakah produk sudah ada di keranjang
    $cartItem = Cart::where('user_id', $userId)
                    ->where('barang_id', $request->barang_id)
                    ->first();

    // Jika sudah ada, tambahkan quantity, jika belum buat item baru di keranjang
    if ($cartItem) {
        $cartItem->quantity += 1;
        $cartItem->save();
    } else {
        Cart::create([
            'user_id' => $userId,
            'barang_id' => $request->barang_id,
            'quantity' => 1, // Default jumlah 1
        ]);
    }

    // Redirect ke halaman keranjang atau tempat lain dengan pesan sukses
    return redirect()->route('cart')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
}

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input agar quantity tidak lebih dari stock
        $cartItem = Cart::findOrFail($id);
        $newQuantity = $request->input('quantity');
        
        if ($newQuantity < 1) {
            return redirect()->back()->with('error', 'Jumlah barang tidak boleh kurang dari 1.');
        }
    
        if ($newQuantity > $cartItem->barang->stock) {
            return redirect()->back()->with('error', 'Jumlah barang melebihi stok yang tersedia.');
        }
    
        // Update quantity di keranjang
        $cartItem->quantity = $newQuantity;
        $cartItem->save();
    
        return redirect()->back()->with('success', 'Jumlah barang berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $cart = Cart::findOrFail($id);

        $cart->delete();

        return redirect()->route('cart')->with('hapus',"berhasil menghapus keranjang");
    }
}
