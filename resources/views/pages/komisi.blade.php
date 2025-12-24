@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    @forelse($data_komisi as $kategori => $items)
        <section id="gallery-{{ $kategori }}" class="gallery section mb-5">

            <div class="container section-title" data-aos="fade-up">
                @php
                    // Cari data info/deskripsi untuk kategori ini
                    $info = $items->where('type', 'info')->first();
                    // Ambil semua foto anggota untuk kategori ini
                    $galeri = $items->where('type', 'anggota');
                @endphp

                <h2>KOMISI {{ $kategori }}</h2>
                <p>{{ $info->deskripsi ?? 'Deskripsi Komisi ' . $kategori . ' belum diatur.' }}</p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                    {
                        "loop": true,
                        "speed": 600,
                        "autoplay": { "delay": 5000 },
                        "slidesPerView": "auto",
                        "centeredSlides": true,
                        "pagination": { "el": ".swiper-pagination", "type": "bullets", "clickable": true },
                        "breakpoints": {
                            "320": { "slidesPerView": 1, "spaceBetween": 0 },
                            "768": { "slidesPerView": 3, "spaceBetween": 20 },
                            "1200": { "slidesPerView": 5, "spaceBetween": 20 }
                        }
                    }
                    </script>

                    <div class="swiper-wrapper align-items-center">
                        @foreach($galeri as $foto)
                            <div class="swiper-slide">
                                <a class="glightbox" data-gallery="gallery-{{ $kategori }}" href="{{ asset('uploads/komisi/' . $foto->gambar) }}">
                                    <img src="{{ asset('uploads/komisi/' . $foto->gambar) }}" class="img-fluid" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </section>
        <hr> @empty
        <div class="text-center">
            <p>Belum ada data komisi yang ditambahkan.</p>
        </div>
    @endforelse

</div>
@endsection