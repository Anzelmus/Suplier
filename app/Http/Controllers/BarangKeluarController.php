<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller {
   
   public function index()
   {
       $barangKeluars = BarangKeluar::all();
       return view('barang_keluar.index', compact('barangKeluars'));
   }

   public function create()
   {
       return view('barang_keluar.create');
   }

   public function store(Request $request)
   {
       $validated = $request->validate([
           'id_barang' => 'required|integer',
           'nama_barang' => 'required|string|max:255',
           'tgl_keluar' => 'nullable|string',
           'jml_keluar' => 'nullable|string|max:15',
           'lokasi' => 'nullable|string|max:15',
           'penerima' => 'nullable|string|max:15',
       ]);

       BarangKeluar::create($validated);

       return redirect()->route('barang_keluar.index')->with('success', 'Barang Keluar berhasil ditambahkan.');
   }

   public function destroy(BarangKeluar $barangKeluar)
   {
       $barangKeluar->delete();

       return redirect()->route('barang_keluar.index')->with('success', 'Data Barang Keluar berhasil dihapus.');
   }

   public function edit($id)
   {
       $barangKeluars = BarangKeluar::find($id);

       if (!$barangKeluars) {
           return redirect()->route('barang_keluar.index')->with('error', 'Barang Keluar not found.');
       }

       return view('barang_keluar.edit', compact('barangKeluars'));
   }

   public function update(BarangKeluar $barangKeluar, Request $request)
   {
       $validatedData = $request->validate([
           'nama_barang' => 'required|string|max:255',
           'tgl_keluar' => 'nullable|string',
           'jml_keluar' => 'nullable|string|max:15',
           'lokasi' => 'nullable|string|max:15',
           'penerima' => 'nullable|string|max:15',
       ]);

       $barangKeluar->update($validatedData);

       return redirect()->route('barang_keluar.index')->with('success', 'Barang Keluar data successfully updated.');
   }
}
