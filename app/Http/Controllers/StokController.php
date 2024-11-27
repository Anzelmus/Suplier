<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class stokController extends Controller {
   public function index()
   {
       $stoks = Stok::all();
       return view('stok.index', compact('stoks'));
   }

   public function create()
   {
       return view('stok.create'); 
   }

   public function store(Request $request)
   {
       $validated = $request->validate([
           'id_barang' => 'required|integer',
           'nama_barang' => 'required|string|max:255',
           'jml_masuk' => 'nullable|string',
           'jml_keluar' => 'nullable|string|max:15',
           'total_barang' => 'nullable|string|max:15',
       ]);

       Stok::create($validated);

       return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan.');
   }

   public function destroy(Stok $stok)
   {
       $stok->delete();

       return redirect()->route('stok.index')->with('success', 'Data Stok berhasil dihapus.');
   }

   public function edit($id)
   {
       $stok = Stok::find($id);

       if (!$stok) {
           return redirect()->route('stok.index')->with('error', 'Stok not found.');
       }
       return view('stok.edit', compact('stok'));
   }

   public function update(Stok $stok, Request $request)
   {
       $validatedData = $request->validate([
           'nama_barang' => 'required|string|max:255',
           'jml_masuk' => 'nullable|string',
           'jml_keluar' => 'nullable|string|max:15',
           'total_barang' => 'nullable|string|max:15',
       ]);

       $stok->update($validatedData);

       return redirect()->route('stok.index')->with('success', 'Stok data successfully updated.');
   }
}
