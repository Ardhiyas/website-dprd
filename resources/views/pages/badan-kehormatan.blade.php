@extends('layouts.app')
@section('content')

<section id="fraksi" class="section py-5">

    <div class="container">

        <div class="text-center mb-4" data-aos="fade-up">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTg43KTrzAUQdc-fXA6Km5edix7FSTQo0Fn9vao4d_Iu-S1zVcxgUIM81nMbh-mA4Etnhg&usqp=CAU"
                 alt="Fraksi PDIP MAPAN" class="img-fluid rounded shadow" style="max-width: 350px;">
            <h2 class="mt-3 fw-bold">FRAKSI PDIP MAPAN</h2>
            <p class="text-muted">FRAKSI PDI PERJUANGAN MAPAN</p>
        </div>

        <!-- Card Ketua -->
        <div class="card mb-5 mx-auto shadow rounded-4 p-3" style="max-width: 700px;" data-aos="fade-up">
            <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/120x160"
                     class="rounded me-4" width="120" height="160">
                <div>
                    <h4 class="fw-bold mb-1">RELEYANDA SOLEKHA WIJAYANTI, S.Ip</h4>
                    <span class="badge bg-danger px-3 py-2">KETUA</span>
                </div>
            </div>
        </div>

        <!-- Grid Anggota -->
        <div class="row g-4">
            @php
                $anggota = [
                    ['nama' => 'H. PURYONO S.Ag. M.Pd.i', 'jabatan'=>'WAKIL KETUA'],
                    ['nama' => 'SISWANDI', 'jabatan'=>'SEKRETARIS'],
                    ['nama' => 'EVI DWITASARI, S. Sos', 'jabatan'=>'ANGGOTA'],
                    ['nama' => 'H. AGUNG PRIYANTO, S.E. M.M', 'jabatan'=>'ANGGOTA'],
                    ['nama' => 'TEGUH PUJIANTO', 'jabatan'=>'ANGGOTA'],
                    ['nama' => 'SUNYOTO, S.Pd', 'jabatan'=>'ANGGOTA'],
                    ['nama' => 'RIYANTO, S.IP.', 'jabatan'=>'ANGGOTA'],
                    ['nama' => 'H. WAHYUDI PURNOMO, M.Si', 'jabatan'=>'ANGGOTA'],
                    ['nama' => 'dr. H. BURHANUDIN', 'jabatan'=>'ANGGOTA'],
                ];
            @endphp

            @foreach ($anggota as $orang)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="card shadow rounded-4 text-center p-3">
                    <img src="https://via.placeholder.com/150x180"
                         class="rounded mx-auto mb-3" width="130" height="180">
                    <h5 class="fw-bold">{{ $orang['nama'] }}</h5>
                    <span class="badge bg-primary">{{ $orang['jabatan'] }}</span>
                </div>
            </div>
            @endforeach
        </div>

    </div>

</section>

@endsection
