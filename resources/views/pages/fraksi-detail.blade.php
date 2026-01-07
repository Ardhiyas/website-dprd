@extends('layouts.app')
@section('content')

    <section id="fraksi" class="features section">

        <div class="container">

            <div class="row gy-4">
                {{-- Bagian Gambar --}}
                <div class="col-12 col-lg-4 d-flex justify-content-center align-items-start mb-4 mb-lg-0" data-aos="fade-up"
                    data-aos-once="true" data-aos-delay="100">
                    <div class="features-image-wrapper text-center">
                        @if ($fraksi && $fraksi->logo)
                            {{-- Mendeteksi folder berdasarkan prefix tabel atau model --}}
                            @php
                                $folder = 'fraksi';
                                if ($fraksi->getTable() != 'fraksis') {
                                    $folder = str_replace('_', '-', str_replace('_table', '', $fraksi->getTable()));
                                    // Hilangkan akhiran 's' jika ada, karena folder biasanya tunggal (fraksi-pkb)
                                    // Tapi kita cek rute admin untuk pastinya. Di admin: 'uploads/fraksi-pkb/'
                                    // Nama tabel: 'fraksi_pkbs' -> 'fraksi-pkbs'
                                    // Kita pastikan foldernya benar.
                                    $folder = str_replace('_', '-', rtrim($fraksi->getTable(), 's'));
                                }
                            @endphp
                            <img src="{{ asset('uploads/' . $folder . '/' . $fraksi->logo) }}" alt="{{ $fraksi->judul }}"
                                class="img-fluid rounded shadow-sm" loading="lazy" style="max-height: 300px; width: auto;">
                        @else
                            <img src="https://via.placeholder.com/300x300?text=No+Logo" alt="Logo Default"
                                class="img-fluid rounded shadow-sm" loading="lazy">
                        @endif
                    </div>
                </div>

                {{-- Bagian Konten --}}
                <div class="col-12 col-lg-8" data-aos="fade-up" data-aos-once="true" data-aos-delay="200">
                    <h3 class="text-center text-lg-start mb-3">{{ $fraksi->judul ?? 'Data Belum Tersedia' }}</h3>
                    <div class="text-center text-lg-start mb-4">
                        {!! $fraksi->deskripsi ?? 'Belum ada deskripsi untuk fraksi ini.' !!}
                    </div>

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
                                @forelse ($anggotas as $key => $anggota)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td>{{ $anggota->nama }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $badgeColor ?? 'bg-success' }} px-3 py-2 text-white d-inline-block text-truncate"
                                                style="max-width: 200px;">
                                                {{ $anggota->jabatan }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4">Belum ada anggota yang terdaftar di fraksi ini.
                                        </td>
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

            .table th,
            .table td {
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