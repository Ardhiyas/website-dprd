@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white flex flex-col justify-center items-center py-12 px-4">
  <div class="max-w-4xl w-full">

    <!-- Judul -->
    <div class="text-center mb-8">
      <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">FRAKSI PKB</h1>
      <h2 class="text-lg md:text-xl text-gray-800 font-medium tracking-wide">
        FRAKSI PARTAI KEBANGKITAN BANGSA
      </h2>
    </div>

    <!-- ✅ Logo sekarang bakal di tengah layar -->
    <div class="flex justify-center items-center mb-10">
      <img
        src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Logo_PKB_2024.png/1200px-Logo_PKB_2024.png"
        alt="Logo PKB"
        class="w-48 h-48 object-contain"
      />
    </div>

    <!-- Tabel Struktur -->
    <div class="border border-gray-800 text-gray-800">
      <div class="grid grid-cols-12 border-b border-gray-800">
        <div class="col-span-8 p-6 border-r border-gray-800 flex items-center">
          <span class="text-xl font-bold">1. MUJIJATIN</span>
        </div>
        <div class="col-span-4 p-6 flex items-center justify-center font-bold text-xl">KETUA</div>
      </div>

      <div class="grid grid-cols-12 border-b border-gray-800">
        <div class="col-span-8 p-6 border-r border-gray-800 flex items-center">
          <span class="text-xl font-bold">2. SASMOYO YUDHI HANTARNO, S.Sos</span>
        </div>
        <div class="col-span-4 p-6 flex items-center justify-center font-bold text-xl">WAKIL KETUA</div>
      </div>

      <div class="grid grid-cols-12 border-b border-gray-800">
        <div class="col-span-8 p-6 border-r border-gray-800 flex items-center">
          <span class="text-xl font-bold">3. TRI SURYATI, A.Md</span>
        </div>
        <div class="col-span-4 p-6 flex items-center justify-center font-bold text-xl">SEKERTARIS</div>
      </div>

      <div class="grid grid-cols-12 border-b border-gray-800">
        <div class="col-span-8 p-6 border-r border-gray-800 flex items-center">
          <span class="text-xl font-bold">4. DWI AGUS PRAYITNO, S.H., M.Si</span>
        </div>
        <div class="col-span-4 p-6 flex items-center justify-center font-bold text-xl">ANGGOTA</div>
      </div>

      <div class="grid grid-cols-12">
        <div class="col-span-8 p-6 border-r border-gray-800 flex items-center">
          <span class="text-xl font-bold">5. H. MASHUDI, S.H</span>
        </div>
        <div class="col-span-4 p-6 flex items-center justify-center font-bold text-xl">ANGGOTA</div>
      </div>
    </div>

  </div>
</div>
@endsection
