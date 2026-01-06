@extends('layouts.app')
@section('content')

    <section class="section">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">
                <div class="col-lg-10">

                    {{-- Judul Berita --}}
                    <div class="text-center mb-5">
                        <h1 class="display-4 fw-bold">{{ $item->judul }}</h1>
                        <div class="text-muted mt-2">
                            <i class="bi bi-calendar"></i> {{ $item->created_at->format('d F Y') }}
                            <span class="mx-2">|</span>
                            <i class="bi bi-person"></i> Humas DPRD
                        </div>
                    </div>

                    {{-- Gambar Utama --}}
                    <div class="mb-5 text-center">
                        <img src="{{ asset('uploads/gallery/' . $item->path_gambar) }}" alt="{{ $item->judul }}"
                            class="img-fluid rounded shadow-lg" style="max-height: 500px; width: 100%; object-fit: cover;">
                    </div>

                    {{-- Isi Berita --}}
                    <div class="article-content fs-5 lh-lg mb-5 text-justify">
                        {{-- Menampilkan isi berita dengan line breaks yang dihormati (nl2br) --}}
                        @if($item->body)
                            {!! nl2br(e($item->body)) !!}
                        @else
                            <p class="text-muted fst-italic text-center">Belum ada isi berita lengkap untuk kegiatan ini.</p>
                        @endif
                    </div>

                    {{-- Tombol Kembali --}}
                    <div class="text-center mt-5 mb-5">
                        <a href="{{ route('gallery') }}" class="btn btn-outline-primary rounded-pill px-4">
                            <i class="bi bi-arrow-left me-2"></i> Kembali ke Galeri
                        </a>
                    </div>

                    <div class="related-posts mt-5">
                        <h3 class="mb-4 text-center">Berita Terkait</h3>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            @foreach ($relatedItems as $rel)
                                <div class="col">
                                    <div class="card h-100 shadow-sm border-0 rounded-4 card-hover">
                                        <div class="img-container rounded-top-4">
                                            <img src="{{ asset('uploads/gallery/' . $rel->path_gambar) }}"
                                                class="card-img-top img-hover" loading="lazy" alt="{{ $rel->judul }}">
                                        </div>
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title fw-bold">{{ $rel->judul }}</h5>
                                            <p class="card-text text-secondary mb-3 text-truncate">{{ $rel->deskripsi_singkat }}
                                            </p>
                                            <a href="{{ route('gallery.detail', $rel->slug ?? $rel->id) }}"
                                                class="btn btn-primary btn-rounded px-4 mt-auto">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <style>
        .related-posts .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 18px;
        }

        .related-posts .card:hover {
            transform: translateY(-6px);
            box-shadow: 0px 12px 30px rgba(0, 0, 0, 0.15);
        }

        .related-posts .card-img-top {
            height: 180px;
            object-fit: cover;
        }

        .related-posts .card-title {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .related-posts .card-text {
            font-size: 0.9rem;
            color: #555;
        }
    </style>

@endsection