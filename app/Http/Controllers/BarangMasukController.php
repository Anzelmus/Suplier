<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class barangmasukController extends Controller {
   public function index()
   {
       $barangMasuks = barangmasuk::all();
       return view('barang_masuk.index', compact('barangMasuks'));
   }

   public function create()
   {
       return view('barang_masuk.create'); 
   }

   public function store(Request $request)
   {
       $validated = $request->validate([
           'id_barang' => 'required|integer',
           'nama_barang' => 'required|string|max:255',
           'tgl_masuk' => 'nullable|string',
           'jml_masuk' => 'nullable|string|max:15',
           'id_suplier' => 'nullable|string|max:15',
       ]);

       barangmasuk::create($validated);

       return redirect()->route('barang_masuk.index')->with('success', 'Barang Masuk berhasil ditambahkan.');
   }

   public function destroy(barangmasuk $barangMasuk)
   {
       $barangMasuk->delete();

       return redirect()->route('barang_masuk.index')->with('success', 'Data Barang Masuk berhasil dihapus.');
   }

   public function edit($id)
   {
       $barangMasuks = barangmasuk::find($id);

       if (!$barangMasuks) {
           return redirect()->route('barang_masuk.index')->with('error', 'Barang Masuk not found.');
       }
       return view('barang_masuk.edit', compact('barangMasuks'));
   }

   public function update(barangmasuk $barangMasuk, Request $request)
   {
       $validatedData = $request->validate([
           'nama_barang' => 'required|string|max:255',
           'tgl_masuk' => 'nullable|string',
           'jml_masuk' => 'nullable|string|max:15',
           'id_suplier' => 'nullable|string|max:15',
       ]);

       $barangMasuk->update($validatedData);

       return redirect()->route('barang_masuk.index')->with('success', 'Barang Masuk data successfully updated.');
   }
}
