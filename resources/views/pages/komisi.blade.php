@extends('layouts.app')
@section('content')
{{-- Asumsikan $komisiA dan $komisiB berisi data Komisi::with('images') --}}

<section id="komisi-a" class="komisi section">

    <div class="container section-title" data-aos="fade-up">
        {{-- Mengambil data dari Komisi A --}}
        <h2>{{ $komisiA->nama }}</h2>
        <p>{{ $komisiA->deskripsi }}</p>
    </div><div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
            {{-- Swiper Config dipertahankan --}}
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
                {{-- LOOP DENGAN DATA GAMBAR DARI DATABASE --}}
                @foreach ($komisiA->images as $image)
                    <div class="swiper-slide">
                        <a class="glightbox" data-gallery="komisiA-gallery" href="{{ asset('uploads/komisi/' . $image->path_gambar) }}">
                            <img src="{{ asset('uploads/komisi/' . $image->path_gambar) }}" class="img-fluid" alt="{{ $komisiA->nama }} Image">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section><section id="komisi-b" class="komisi section">

    <div class="container section-title" data-aos="fade-up">
        {{-- Mengambil data dari Komisi B --}}
        <h2>{{ $komisiB->nama }}</h2>
        <p>{{ $komisiB->deskripsi }}</p>
    </div><div class="container" data-aos="fade-up" data-aos-delay="100">
        
        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {{-- (Swiper Config sama) --}}
            </script>
            <div class="swiper-wrapper align-items-center">
                {{-- LOOP DENGAN DATA GAMBAR DARI DATABASE --}}
                @foreach ($komisiB->images as $image)
                    <div class="swiper-slide">
                        <a class="glightbox" data-gallery="komisiB-gallery" href="{{ asset('uploads/komisi/' . $image->path_gambar) }}">
                            <img src="{{ asset('uploads/komisi/' . $image->path_gambar) }}" class="img-fluid" alt="{{ $komisiB->nama }} Image">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>{{-- ... Lanjutkan dengan Komisi C, D, dst. --}}
@endsection