@extends('layouts.app')

@section('content')
<!-- component -->

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="max-w-[720px] mx-auto py-32 sm:py-8 lg:py-16">
  <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border px-6 py-6">
    {{-- Form --}}
    <form action="{{ route('pinjam_barang.update', $pinjamBarangs->id) }}" method="POST"> <!-- Changed route from barang_keluar.update to pinjam_barang.update -->
      @csrf
      @method('put')
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Edit Pinjam Barang Data</h2> <!-- Changed "Barang Keluar" to "Pinjam Barang" -->
        <p class="mt-1 text-sm/6 text-gray-600">Update the necessary information carefully.</p>

        <div class="mt-10 col-span-full gap-y-8">
          <label for="id_pinjam" class="block text-sm/6 font-medium text-gray-900">ID Pinjam</label> <!-- Changed "Barang Keluar" to "Pinjam Barang" -->
          <div class="mt-2">
            <input id="id_pinjam" name="id_pinjam" type="text" autocomplete="id_pinjam" value="{{ old('id_pinjam', $pinjamBarangs->id_pinjam) }}" required class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
          </div>
        </div>

        <div class="mt-5 col-span-full gap-y-8">
          <label for="peminjam" class="block text-sm/6 font-medium text-gray-900">Peminjam</label>
          <div class="mt-2">
            <input id="peminjam" name="peminjam" type="text" autocomplete="peminjam" value="{{ old('peminjam',  $pinjamBarangs->peminjam) }}" required class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
          </div>
        </div>

        <div class="mt-5 col-span-full gap-y-8">
          <label for="tgl_pinjam" class="block text-sm/6 font-medium text-gray-900">Tanggal Pinjam</label>
          <div class="mt-2">
            <input id="tgl_pinjam" name="tgl_pinjam" type="text" autocomplete="tgl_pinjam" value="{{ old('tgl_pinjam',  $pinjamBarangs->tgl_pinjam) }}" required class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
          </div>
        </div>


        <div class="mt-10 col-span-full gap-y-8">
        <label for="id_barang" class="block text-sm/6 font-medium text-gray-900">ID Barang</label> <!-- Changed "Barang Masuk" to "Barang Keluar" -->
        <div class="mt-2">
          <input id="id_barang" name="id_barang" type="text" autocomplete="id_barang" value="{{ old('id_barang' , $pinjamBarangs->id_barang) }}" required class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
        </div>
      </div>

      <div class="mt-5 col-span-full gap-y-8">
        <label for="nama_barang" class="block text-sm/6 font-medium text-gray-900">Nama Barang</label>
        <div class="mt-2">
          <input id="nama_barang" name="nama_barang" type="text" autocomplete="nama_barang" value="{{ old('nama_barang' ,  $pinjamBarangs->nama_barang) }}" required class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
        </div>
      </div>

      <div class="mt-5 col-span-full gap-y-8">
          <label for="jml_barang" class="block text-sm/6 font-medium text-gray-900">Jumlah Barang</label>
          <div class="mt-2">
            <input id="jml_barang" name="jml_barang" type="text" autocomplete="jml_barang" value="{{ old('jml_barang',  $pinjamBarangs->jml_barang) }}" required class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
          </div>
        </div>

        <div class="mt-5 col-span-full gap-y-8">
          <label for="tgl_kembali" class="block text-sm/6 font-medium text-gray-900">Tanggal Kembali</label>
          <div class="mt-2">
            <input id="tgl_kembali" name="tgl_kembali" type="text" autocomplete="tgl_kembali" value="{{ old('tgl_kembali',  $pinjamBarangs->tgl_kembali) }}" required class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
          </div>
        </div>

        <div class="mt-5 col-span-full gap-y-8">
          <label for="kondisi" class="block text-sm/6 font-medium text-gray-900">Kondisi</label>
          <div class="mt-2">
            <input id="kondisi" name="kondisi" type="text" autocomplete="kondisi" value="{{ old('kondisi',  $pinjamBarangs->kondisi) }}" required class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
          </div>
        </div>


      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
      </div>
    </form>
  </div>
</div>
@endsection