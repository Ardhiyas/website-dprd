@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Fraksi PKB</title>
</head>
<body class="bg-white text-gray-800">

<section class="max-w-4xl mx-auto py-12 px-4">
    <!-- Judul -->
    <h1 class="text-3xl font-bold text-center tracking-wide mb-2">FRAKSI PKB</h1>
    <!-- Subjudul -->
    <h2 class="text-center text-sm uppercase tracking-widest mb-8">Fraksi Partai Kebangkitan Bangsa</h2>

    <!-- Logo -->
    <div class="flex justify-center mb-10">
        <img 
            src="{{ asset('path-logo/pkb.png') }}" 
            alt="logo PKB" 
            class="w-40 h-40 object-contain"
        />
    </div>

    <!-- List Struktur -->
    <div class="grid grid-cols-1 gap-4 text-lg">
        <!-- Kolom Kiri (Nama + No) -->
        <div class="space-y-4 px-6">
            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold">1. Mujijatin</span>
                <span>Ketua</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold">2. Sasmoyo Yudhi Hantarno, S.Sos</span>
                <span>Wakil Ketua</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold">3. Tri Suryati, A.Md</span>
                <span>Sekretaris</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold">4. Dwi Agus Prayitno, S.H., M.Si</span>
                <span>Anggota</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold">5. H. Mashudi, S.H</span>
                <span>Anggota</span>
            </div>
        </div>
    </div>
</section>

</body>
</html>
@endsection