<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth.login',["title"=>'login']);
    }

    public function login(Request $request){
 
     $credentials = $request->validate([
        // 'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('home');
    }
    return back()->withErrors([
        'email' => 'Akun tidak ditemukan',
    ]);
    }
    // ---------------------------------------------------------------\\
    public function logout(Request $request)
    {
        // Proses logout
        Auth::logout();

        // Menghapus session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login atau halaman lain
        return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_seller()
{
   
    return view('auth.registerSeller');
}


    /**
     * Store a newly created resource in storage.
     */
    public function store_seller(Request $request)
{
    // Validasi data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'alamat' => 'required|string|max:255',
        'password' => 'required|string|min:8',
    ]);
    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'alamat' => $validatedData['alamat'],
        'password' => Hash::make($validatedData['password']),
        'role' => 'seller'
    ]);
    Auth::login($user);
    return redirect()->route('login');
}


    public function create_user()
{
    return view('auth.registerUser');
}


    /**
     * Store a newly created resource in storage.
     */
    public function store_user(Request $request)
{
    // Validasi data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'alamat' => 'required|string|max:255',
        'password' => 'required|string|min:8',
    ]);
    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'alamat' => $validatedData['alamat'],
        'password' => Hash::make($validatedData['password']),
        'role' => 'user'
    ]);

    // Autentikasi pengguna setelah pendaftaran
    Auth::login($user);


    return redirect()->route('login');
}



    public function profile()
    {
        // Mengambil data pengguna yang sedang login
    $akun = Auth::user();

    // Mengirimkan data pengguna ke view
    return view('auth.profile',["title"=>"profile"], compact('akun'));
    }

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
