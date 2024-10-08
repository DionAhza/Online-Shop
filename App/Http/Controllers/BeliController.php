<?php

namespace App\Http\Controllers;

use App\Models\Beli;
use App\Models\Cart;
use App\Models\Barang;
use Illuminate\Http\Request;

class BeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show($id)
    {
        // Mengambil barang berdasarkan id
        $barang = Barang::with('user')->findOrFail($id);
    
        // Mengambil cart berdasarkan user yang sedang login dan barang_id
        $cart = Cart::where('user_id', auth()->id())->where('barang_id', $id)->first();
        $pembayaranOptions = json_decode($barang->bayar, true);
    
        // Mengirim data barang dan cart ke view
        return view('pelanggan.beli', [
            "title" => "Beli", 
            'barang' => $barang, 
            'cart' => $cart,
            'pembayaranOptions'=>$pembayaranOptions
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beli $beli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beli $beli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beli $beli)
    {
        //
    }
}
