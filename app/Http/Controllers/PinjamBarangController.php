<?php

namespace App\Http\Controllers;

use App\Models\pinjambarang;
use Illuminate\Http\Request;

class pinjambarangController extends Controller {
   
   public function index()
   {
       $pinjamBarangs = pinjambarang::all();
       return view('pinjam_barang.index', compact('pinjamBarangs'));
   }

   public function create()
   {
       return view('pinjam_barang.create');
   }

   public function store(Request $request)
   {
       $validated = $request->validate([
           'id_pinjam' => 'required|integer',
           'peminjam' => 'required|string|max:255',
           'tgl_pinjam' => 'nullable|string',
           'id_barang' => 'nullable|string|max:15',
           'nama_barang' => 'nullable|string|max:15',
           'jml_barang' => 'nullable|string|max:15',
           'tgl_kembali' => 'nullable|string|max:15',
           'kondisi' => 'nullable|string|max:15',
       ]);

       pinjambarang::create($validated);

       return redirect()->route('pinjam_barang.index')->with('success', 'Pinjam Barang berhasil ditambahkan.');
   }

   public function destroy(pinjambarang $pinjamBarang)
   {
       $pinjamBarang->delete();

       return redirect()->route('pinjam_barang.index')->with('success', 'Data Pinjam Barang berhasil dihapus.');
   }

   public function edit($id)
   {
       $pinjamBarangs = pinjambarang::find($id);

       if (!$pinjamBarangs) {
           return redirect()->route('pinjam_barang.index')->with('error', 'Pinjam Barang not found.');
       }

       return view('pinjam_barang.edit', compact('pinjamBarangs'));
   }

   public function update(pinjambarang $pinjamBarang, Request $request)
   {
       $validatedData = $request->validate([
           'peminjam' => 'required|string|max:255',
           'tgl_pinjam' => 'nullable|string',
           'id_barang' => 'nullable|string|max:15',
           'nama_barang' => 'nullable|string|max:15',
           'jml_barang' => 'nullable|string|max:15',
           'tgl_kembali' => 'nullable|string|max:15',
           'kondisi' => 'nullable|string|max:15',
       ]);

       $pinjamBarang->update($validatedData);

       return redirect()->route('pinjam_barang.index')->with('success', 'Pinjam Barang data successfully updated.');
   }
}
