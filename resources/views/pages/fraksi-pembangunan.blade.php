@extends('layouts.app')
@section('content')

<section id="features" class="features section">

    <div class="container">

        <div class="row justify-content-around gy-4">
            {{-- Bagian Gambar/Logo (Menggunakan data dari $config) --}}
            <div class="features-image col-lg-4" data-aos="fade-up" data-aos-delay="100" id="foto-fraksi">
                {{-- Cek apakah data ada sebelum ditampilkan --}}
                @if ($config)
                    {{-- Menggunakan path yang sesuai dengan method store/update di Controller Admin --}}
                    <img src="{{ asset('uploads/fraksi-pembangunan/' . $config->logo) }}" alt="{{ $config->judul }}">
                @else
                    <img src="URL_LOGO_DEFAULT_JIKA_KOSONG" alt="Logo Default">
                @endif
            </div>

            <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                
                {{-- Judul (Menggunakan data dari $config) --}}
                @if ($config)
                    <h3>{{ $config->judul }}</h3>
                    {{-- Deskripsi (Menggunakan data dari $config) --}}
                    <p class="fst-italic" id="deskripsi">{{ $config->deskripsi }}</p>
                @else
                    <h3>Struktur Anggota Fraksi PKS (Data Belum Tersedia)</h3>
                    <p class="fst-italic" id="deskripsi">Silakan masukkan data fraksi melalui halaman admin.</p>
                @endif
                
                {{-- Tabel Anggota (Looping melalui $fraksiData) --}}
                <table class="table table-bordered table-striped table-hover mt-4 shadow-sm">
                    <thead class="table-primary text-center">
                        <tr>
                            <th style="width: 70px;">No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        {{-- Melakukan perulangan untuk setiap anggota yang ada di database --}}
                        @forelse ($fraksiData as $key => $anggota)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $anggota->nama }}</td>
                                {{-- Jabatan --}}
                                <td>
                                    <span class="badge bg-warning px-3 py-2 text-dark">{{ $anggota->jabatan }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Belum ada anggota fraksi yang terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</section>@endsection