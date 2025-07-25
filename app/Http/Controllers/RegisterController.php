<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register.index');
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
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required'
    ], [
        'name.required' => 'Nama tidak boleh kosong!',
        'email.required' => 'Email tidak boleh kosong!',
        'email.email' => 'Email tidak valid!',
        'email.unique' => 'Email sudah digunakan!',
        'password.required' => 'Password tidak boleh kosong!',
    ]);


   User::create([
    'name' => $request->name, // ✅ Benar: 'name' lowercase
    'email' => $request->email,
    'password' => Hash::make($request->password),
    'role' => 'pengunjung'
]);

    session()->flash('success', 'Berhasil didaftarkan!');

    return redirect()->route('register');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
