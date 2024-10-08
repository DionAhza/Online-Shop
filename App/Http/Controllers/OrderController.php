<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Barang;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil user yang sedang login
        $user = auth()->user();
        // Mengambil orderan berdasarkan user_id yang sama
        $orders = Order::with('user', 'barang')
            ->whereHas('barang', function($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get();
    
        return view('penjual.order', ['title' => "order","userName"=>$user], compact('orders'));
    }


    public function store(Request $request, $barangId)
    {
        // Validasi input
        $validated = $request->validate([
            'pembayaran' => 'required|string',  // Membatasi hanya satu pembayaran dipilih
        ]);
    
        // Ambil data user dan barang
        $user = auth()->user();
        $barang = Barang::findOrFail($barangId);
        
        // Cek apakah ada item di keranjang
        $cart = Cart::where('user_id', $user->id)->where('barang_id', $barangId)->first();
        if (!$cart) {
            return redirect()->back()->with('error', 'Barang belum ditambahkan ke keranjang!');
        }
    
        // Simpan pesanan ke tabel orders
        Order::create([
            'user_id' => $user->id,
            'barang_id' => $barang->id,
            'jumlah' => $cart->quantity,
            'pembayaran' => $request->pembayaran,  // Ambil metode pembayaran dari form
        ]);
    
        // Hapus barang dari cart jika perlu
        $cart->delete();
    
        // Redirect ke halaman sukses atau rincian pesanan
        return redirect()->route('cart')->with('success', 'Pesanan Anda berhasil dibuat!');
    }


    public function destroy($id)
    {
        //
      $order =  Order::findOrFail($id);

      $order->delete();

      return redirect()->route('order')->with('success','berhasil menjalin transaksi');
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
   


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
}
