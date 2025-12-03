@extends('layouts.app')
@section('content')

<section id="fraksi" class="section py-5">

    <div class="container">

        <!-- Card Ketua -->
        <div class="card mb-5 mx-auto shadow rounded-4 p-3" style="max-width: 700px;" data-aos="fade-up">
            <div class="d-flex align-items-center">
                <img src="https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_2956-scaled-1.jpg"
                     class="rounded me-4" width="120" height="160">
                <div>
                    <h4 class="fw-bold mb-1">DWI AGUS PRAYITNO, S.H., M.Si</h4>
                    <span class="badge bg-danger px-3 py-2">KETUA</span>
                </div>
            </div>
        </div>

        <!-- Grid Anggota -->
        <div class="row g-4">
            @php
                $anggota = [
                    [
                        'nama' => 'EVI DWITASARI, S.Sos',
                        'jabatan' => 'WAKIL KETUA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_2933-scaled.jpg'
                    ],
                    [
                        'nama' => 'PAMUJI, S.Pd',
                        'jabatan' => 'WAKIL KETUA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_2858-scaled.jpg'
                    ],
                    [
                        'nama' => 'ANIK SUHARTO, S.Sos',
                        'jabatan' => 'WAKIL KETUA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_2910-200x300.jpg'
                    ],
                    [
                        'nama' => 'H. SUHARI, S.H',
                        'jabatan' => 'ANGGOTA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_2890-1-200x300.jpg'
                    ],
                    [
                        'nama' => 'FIKSO RUBIANTO',
                        'jabatan' => 'ANGGOTA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_3023-200x300.jpg'
                    ],
                    [
                        'nama' => 'MUJIATIN',
                        'jabatan' => 'ANGGOTA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_3020-scaled.jpg'
                    ],
                    [
                        'nama' => 'TRI SURYATI, A.Md',
                        'jabatan' => 'ANGGOTA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_2906-200x300.jpg'
                    ],
                    [
                        'nama' => 'H. AGUNG PRIYANTO, S.E., M.M',
                        'jabatan' => 'ANGGOTA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_3012-200x300.jpg'
                    ],
                    [
                        'nama' => 'RELELYANDA SOLEKHA W. S.IP',
                        'jabatan' => 'ANGGOTA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_3193-200x300.jpg'
                    ],
                    [
                        'nama' => 'TEGUH PUJIANTO',
                        'jabatan' => 'ANGGOTA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_2961-200x300.jpg'
                    ],
                    [
                        'nama' => 'H. WAHYUDI PURNOMO, M.S',
                        'jabatan' => 'ANGGOTA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_2925-scaled.jpg'
                    ],
                    [
                        'nama' => 'SUNARTO, S.Pd',
                        'jabatan' => 'ANGGOTA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_2881-200x300.jpg'
                    ],
                    [
                        'nama' => 'SUKIRNO, S.H',
                        'jabatan' => 'ANGGOTA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_2916-200x300.jpg'
                    ],
                    [
                        'nama' => 'H. AGUNG PRIYANTO, S.E., M.M',
                        'jabatan' => 'ANGGOTA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_3012-200x300.jpg'
                    ],
                    [
                        'nama' => 'H. AGUNG PRIYANTO, S.E., M.M',
                        'jabatan' => 'ANGGOTA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_3012-200x300.jpg'
                    ],
                    [
                        'nama' => 'H. AGUNG PRIYANTO, S.E., M.M',
                        'jabatan' => 'ANGGOTA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_3012-200x300.jpg'
                    ],
                    [
                        'nama' => 'H. AGUNG PRIYANTO, S.E., M.M',
                        'jabatan' => 'ANGGOTA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_3012-200x300.jpg'
                    ],
                    [
                        'nama' => 'H. AGUNG PRIYANTO, S.E., M.M',
                        'jabatan' => 'ANGGOTA',
                        'foto' => 'https://dprd-ponorogo.go.id/wp-content/uploads/2024/09/DSC_3012-200x300.jpg'
                    ],
                ];
            @endphp

            @foreach ($anggota as $orang)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="card shadow rounded-4 text-center p-3">
                    <img src="{{ $orang['foto'] }}"
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