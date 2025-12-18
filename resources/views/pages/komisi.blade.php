@extends('layouts.app')
@section('content')

{{-- 
    Asumsi: PagesController@komisi mengirim variabel $data:
    $data = Komisi::with('images')->orderBy('nama')->get(); 
--}}

<main id="main">
    
    <section id="komisi-list" class="komisi section">

        <div class="container section-title" data-aos="fade-up">
            <h2>Komisi dan Alat Kelengkapan</h2>
            <p>Informasi detail mengenai tugas pokok, fungsi, dan kegiatan setiap Komisi dan Alat Kelengkapan Dewan Perwakilan Rakyat Daerah.</p>
        </div>
        
        @forelse ($data as $komisi)
            
            {{-- Menghasilkan ID yang unik dan valid untuk setiap Komisi (contoh: komisi-a, komisi-b) --}}
            @php
                $sectionId = strtolower(str_replace(' ', '-', $komisi->nama));
            @endphp
            
            <section id="{{ $sectionId }}" class="komisi-item pt-0 pb-5">
                <div class="container" data-aos="fade-up">
                    
                    {{-- Judul dan Deskripsi Komisi --}}
                    <div class="section-title mb-4">
                        <h3>{{ $komisi->nama }}</h3>
                        <p class="mt-3">{{ $komisi->deskripsi }}</p>
                    </div>

                    {{-- Slider Galeri --}}
                    <div class="swiper init-swiper">
                        {{-- Swiper Config (Harus diulang karena terikat pada div Swiper) --}}
                        <script type="application/json" class="swiper-config">
                        {
                          "loop": true, "speed": 600, "autoplay": { "delay": 5000 },
                          "slidesPerView": "auto", "centeredSlides": true,
                          "pagination": { "el": ".swiper-pagination", "type": "bullets", "clickable": true },
                          "breakpoints": {
                            "320": { "slidesPerView": 1, "spaceBetween": 0 },
                            "768": { "slidesPerView": 3, "spaceBetween": 20 },
                            "1200": { "slidesPerView": 5, "spaceBetween": 20 }
                          }
                        }
                        </script>
                        
                        <div class="swiper-wrapper align-items-center">
                            {{-- LOOP GAMBAR DARI DATABASE --}}
                            @forelse ($komisi->images as $image)
                                <div class="swiper-slide">
                                    <a class="glightbox" data-gallery="gallery-{{ $komisi->id }}" href="{{ asset('uploads/komisi/' . $image->path_gambar) }}">
                                        <img src="{{ asset('uploads/komisi/' . $image->path_gambar) }}" class="img-fluid rounded shadow" alt="Galeri {{ $komisi->nama }}">
                                    </a>
                                </div>
                            @empty
                                <div class="swiper-slide text-center p-3">
                                    <small class="text-muted">Tidak ada gambar galeri yang tersedia.</small>
                                </div>
                            @endforelse
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>
            
            {{-- Tambahkan pemisah visual (jika Anda tidak ingin Komisi berdekatan) --}}
            @if (!$loop->last)
                <div class="container"><hr class="my-5"></div>
            @endif

        @empty
            <div class="container">
                <p class="alert alert-warning text-center">Data Komisi belum tersedia.</p>
            </div>
        @endforelse

    </section>

</main>
@endsection