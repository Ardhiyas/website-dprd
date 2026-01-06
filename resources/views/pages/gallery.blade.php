@extends('layouts.app')
@section('content')

    <style>
        /* Styling Anda */
        .card-hover {
            transition: transform 0.35s ease, box-shadow 0.35s ease;
            border-radius: 18px;
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0px 18px 40px rgba(0, 0, 0, 0.18);
        }

        .img-container {
            height: 200px;
            /* Atur tinggi container gambar */
            overflow: hidden;
        }

        .img-hover {
            transition: transform 0.7s ease;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Memastikan gambar mengisi area tanpa merusak rasio */
        }

        .card-hover:hover .img-hover {
            transform: scale(1.08);
        }

        .card-title {
            font-size: 1.15rem;
        }

        .btn-rounded {
            border-radius: 999px !important;
        }
    </style>

    <div class="container py-4">

        {{-- Tambahkan judul halaman jika diperlukan --}}
        <h2 class="mb-4 fw-bold">GALERI KEGIATAN DPRD</h2>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

            {{-- Menggunakan loop dinamis dari database --}}
            @forelse ($galleryItems as $item)
                <div class="col">
                    <div class="card h-100 shadow-lg border-0 rounded-4 card-hover">
                        <div class="img-container rounded-top-4">
                            {{-- Menggunakan path gambar dari database. Sesuaikan folder path jika berbeda --}}
                            <img src="{{ asset('uploads/gallery/' . $item->path_gambar) }}" class="card-img-top img-hover"
                                loading="lazy" alt="{{ $item->judul }}">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $item->judul }}</h5>
                            <p class="card-text text-secondary mb-3 text-align-justify">
                                {{ $item->deskripsi_singkat }}
                            </p>
                            {{-- Link ke halaman detail, menggunakan slug jika ada --}}
                            <a href="{{ route('gallery.detail', $item->slug ?? $item->id) }}"
                                class="btn btn-primary btn-rounded px-4 mt-auto">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        Belum ada kegiatan yang dipublikasikan dalam galeri.
                    </div>
                </div>
            @endforelse

        </div>
    </div>
@endsection