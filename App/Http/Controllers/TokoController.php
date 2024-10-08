<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($userId)
{
    // Mengambil barang yang diinput oleh user yang sedang login berdasarkan user_id
    $barang = Barang::where('user_id', $userId)->get();

    if ($barang->isEmpty()) {
        return view('pelanggan.toko', ['title' => 'Toko'])->with('error', 'Anda belum menambahkan barang.');
    }
        // Jika tidak ada barang yang diinput oleh user

    return view('pelanggan.toko', ['title' => 'Toko'], compact('barang'));
}

public function show()
{
    //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
