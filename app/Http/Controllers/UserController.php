<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller {
   // Menampilkan semua data user
   public function index()
   {
       $user = User::all();
       return view('user.index', compact('user'));
   }

   // Menampilkan form untuk membuat user baru
   public function create()
   {
       return view('user.create');
   }

   // Menyimpan data User ke database
   public function store(Request $request)
   {
       $validated = $request->validate([
           'id_user' => 'required|integer',
           'nama' => 'required|string|max:255',
           'username' => 'nullable|string',
           'password' => 'nullable|string|max:15',
       ]);

       User::create($validated);

       return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
   }

   // Menghapus data User dari database
   public function destroy(User $user)
   {
       $user->delete();

       return redirect()->route('user.index')->with('success', 'Data User berhasil dihapus.');
   }

   // Show the edit form for a specific user
   public function edit($id)
   {
       $user = User::find($id);

       // Check if the user exists
       if (!$user) {
           return redirect()->route('user.index')->with('error', 'User not found.');
       }
       return view('user.edit', compact('user'));
   }

   // Update user data
   public function update(User $user, Request $request)
   {
       // Validasi data request jika diperlukan
       $validatedData = $request->validate([
           'nama' => 'required|string|max:255',
           'username' => 'nullable|string',
           'password' => 'nullable|string|max:15',
       ]);

       // Update user data
       $user->update($validatedData);

       return redirect()->route('user.index')->with('success', 'User data successfully updated.');
   }
}