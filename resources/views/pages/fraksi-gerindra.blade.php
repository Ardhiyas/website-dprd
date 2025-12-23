@extends('layouts.app')
@section('content')

<section id="features" class="features section">

    <div class="container">

        <div class="row gy-4">
            {{-- Bagian Gambar --}}
            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-start mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                <div class="features-image-wrapper text-center" id="foto-fraksi">
                    @if ($config)
                        <img src="{{ asset('uploads/fraksi-gerindra/' . $config->logo) }}" 
                             alt="{{ $config->judul }}" 
                             class="img-fluid rounded shadow-sm" 
                             style="max-height: 300px; width: auto;">
                    @else
                        <img src="URL_LOGO_DEFAULT_JIKA_KOSONG" 
                             alt="Logo Default" 
                             class="img-fluid rounded shadow-sm">
                    @endif
                </div>
            </div>

            {{-- Bagian Konten --}}
            <div class="col-12 col-lg-8" data-aos="fade-up" data-aos-delay="200">
                @if ($config)
                    <h3 class="text-center text-lg-start mb-3">{{ $config->judul }}</h3>
                    <p class="fst-italic text-center text-lg-start mb-4" id="deskripsi">{{ $config->deskripsi }}</p>
                @else
                    <h3 class="text-center text-lg-start mb-3">Struktur Anggota Fraksi PKS (Data Belum Tersedia)</h3>
                    <p class="fst-italic text-center text-lg-start mb-4" id="deskripsi">Silakan masukkan data fraksi melalui halaman admin.</p>
                @endif
                
                {{-- Tabel Anggota dengan Wrapper Responsive --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover shadow-sm">
                        <thead class="table-primary">
                            <tr>
                                <th style="width: 60px;" class="text-center">No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @forelse ($fraksiData as $key => $anggota)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $anggota->nama }}</td>
                                    <td>
                                        <span class="badge bg-danger px-3 py-2 text-white d-inline-block text-truncate" 
                                              style="max-width: 200px;">
                                            {{ $anggota->jabatan }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4">Belum ada anggota fraksi yang terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                {{-- Informasi Tambahan untuk Mobile --}}
                <div class="alert alert-info d-lg-none mt-3">
                    <small>
                        <i class="bi bi-arrows-angle-expand"></i> Geser tabel ke kanan/kiri untuk melihat data lengkap
                    </small>
                </div>
            </div>
        </div>

    </div>

</section>

<style>
    /* Media Query untuk perangkat kecil */
    @media (max-width: 768px) {
        .features-image-wrapper img {
            max-height: 200px !important;
        }
        
        .table th, .table td {
            padding: 0.5rem !important;
            font-size: 0.9rem;
        }
        
        .badge {
            font-size: 0.8rem;
            padding: 0.25rem 0.5rem !important;
            max-width: 150px !important;
        }
    }
    
    @media (max-width: 576px) {
        h3 {
            font-size: 1.5rem;
        }
        
        .table {
            font-size: 0.85rem;
        }
        
        .badge {
            max-width: 120px !important;
        }
    }
</style>

@endsection