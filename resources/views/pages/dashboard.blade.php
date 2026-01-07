@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active">
                <img src="{{ asset('dist') }}/assets/img/hero-carousel/hero-carousel-1.jpg" alt="">
                <div class="container">
                    <h2>Selamat Datang di DPRD Ponorogo</h2>
                    <p>Dewan Perwakilan Rakyat Daerah Kabupaten Ponorogo sebagai wakil rakyat yang menjalankan fungsi
                        legislasi, anggaran, dan pengawasan untuk mewujudkan Ponorogo yang maju, sejahtera, dan berkeadilan.
                    </p>
                    <a href="#about" class="btn-get-started">Selengkapnya</a>
                </div>
            </div><!-- End Carousel Item -->
            <div class="carousel-item">
                <img src="{{ asset('dist') }}/assets/img/hero-carousel/hero-carousel-2.jpg" alt="">
                <div class="container">
                    <h2>Melayani Aspirasi Rakyat</h2>
                    <p>DPRD Ponorogo berkomitmen mendengarkan suara masyarakat melalui berbagai kanal aspirasi, menyusun
                        peraturan daerah yang berpihak pada rakyat, dan mengawasi pelaksanaan pembangunan demi kesejahteraan
                        bersama.</p>
                    <a href="#services" class="btn-get-started">Layanan Masyarakat</a>
                </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
                <img src="{{ asset('dist') }}/assets/img/hero-carousel/hero-carousel-3.jpg" alt="">
                <div class="container">
                    <h2>Melestarikan Budaya Lokal</h2>
                    <p>Sebagai representasi masyarakat Ponorogo yang kaya akan budaya, kami berkomitmen melestarikan dan
                        mengembangkan warisan budaya seperti Reog Ponorogo serta memajukan potensi lokal menuju kemandirian
                        daerah.</p>
                    <a href="#tabs" class="btn-get-started">Read More</a>
                </div>
            </div><!-- End Carousel Item -->
            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
            <ol class="carousel-indicators"></ol>
        </div>
    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Tentang DPRD Ponorogo<br></h2>
            <p>Mengenal lebih dekat tugas, fungsi, dan peran Dewan Perwakilan Rakyat Daerah Kabupaten Ponorogo</p>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                    @if($about && $about->image)
                        <img src="{{ asset('uploads/about/' . $about->image) }}" class="img-fluid" alt="">
                    @else
                        <img src="{{ asset('dist') }}/assets/img/about.jpg" class="img-fluid" alt="">
                    @endif
                    <a href="{{ $about->video_url ?? 'https://youtu.be/yKbUQkkA-ks?si=2jk7nqbbuc89bJrk' }}" class="glightbox pulsating-play-btn"></a>
                </div>
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                    <h3>{{ $about->title ?? 'DPRD Ponorogo: Wadah Aspirasi Rakyat, Pengawal Pembangunan Daerah' }}</h3>
                    <p class="fst-italic">
                        {{ $about->subtitle ?? 'Sebagai representasi masyarakat Kabupaten Ponorogo, DPRD berkomitmen menjalankan fungsi konstitusional untuk mewujudkan pemerintahan yang demokratis, transparan, dan berpihak pada kesejahteraan rakyat.' }}
                    </p>
                    <ul>
                        <li><i class="bi bi-check2-all"></i> <span>{{ $about->point_1 ?? 'Fungsi Legislasi: Menyusun dan menetapkan Peraturan Daerah (Perda) yang berpihak pada kepentingan masyarakat Ponorogo' }}</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>{{ $about->point_2 ?? 'Fungsi Anggaran: Menetapkan Anggaran Pendapatan dan Belanja Daerah (APBD) secara akuntabel dan transparan' }}</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>{{ $about->point_3 ?? 'Fungsi Pengawasan: Mengawasi pelaksanaan Perda dan kebijakan pemerintah daerah demi efektivitas pembangunan' }}</span></li>
                    </ul>
                    <p>
                        {{ $about->description ?? 'DPRD Ponorogo terdiri dari perwakilan partai politik yang terpilih melalui pemilihan umum, bekerja secara kolektif-kolegial untuk menyerap, menampung, dan menindaklanjuti aspirasi masyarakat. Dengan semangat "Ngesti Wiyata, Amrih Rahayu", kami bertekad membangun Ponorogo yang maju, mandiri, dan berbudaya.' }}
                    </p>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Layanan Publik DPRD</h2>
            <p>Berbagai layanan yang disediakan DPRD untuk masyarakat dalam rangka menjalankan fungsi legislasi, anggaran,
                dan pengawasan</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item  position-relative">
                        <div class="icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Penampungan Aspirasi</h3>
                        </a>
                        <p>Melayani masyarakat dalam menyampaikan aspirasi, keluhan, dan pengaduan melalui berbagai kanal
                            resmi DPRD baik langsung, tertulis, maupun online.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-file-contract"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Konsultasi Hukum Daerah</h3>
                        </a>
                        <p>Memberikan informasi dan konsultasi mengenai Peraturan Daerah (Perda) dan produk hukum daerah
                            lainnya kepada masyarakat dan stakeholder.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-landmark"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Kunjungan Kerja & Reses</h3>
                        </a>
                        <p>Anggota DPRD melakukan kunjungan kerja ke daerah pemilihan untuk menyerap aspirasi masyarakat
                            secara langsung dan memantau pembangunan.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-search-dollar"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Pengawasan APBD</h3>
                        </a>
                        <p>Melakukan pengawasan terhadap pelaksanaan Anggaran Pendapatan dan Belanja Daerah (APBD) untuk
                            memastikan penggunaan anggaran yang efektif dan akuntabel.</p>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Dengar Pendapat Umum</h3>
                        </a>
                        <p>Menyelenggarakan forum dengar pendapat dengan masyarakat dan stakeholders dalam proses penyusunan
                            kebijakan dan peraturan daerah.</p>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Informasi Publik</h3>
                        </a>
                        <p>Menyediakan akses informasi publik seperti Perda, APBD, risalah rapat, dan laporan kinerja DPRD
                            sesuai dengan prinsip keterbukaan informasi publik.</p>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- Fraksi Section -->
    <section id="tabs" class="tabs section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Fraksi</h2>
            <p>Fraksi-fraksi yang ada di DPRD Kabupaten Ponorogo</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs responsive-tabs flex-lg-column mb-3 mb-lg-0">
                        @foreach($fraksi as $index => $item)
                            <li class="nav-item">
                                <a class="nav-link {{ $index == 0 ? 'active show' : '' }}" data-bs-toggle="tab"
                                    href="#tabs-tab-{{ $item->id }}">
                                    {{ $item->nama }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content card border-0 shadow-sm p-4 h-100">
                        @foreach($fraksi as $index => $item)
                            <div class="tab-pane {{ $index == 0 ? 'active show' : '' }}" id="tabs-tab-{{ $item->id }}">
                                <div class="row align-items-center">
                                    <div class="col-lg-8 details order-2 order-lg-1 mt-4 mt-lg-0">
                                        <h3 class="fw-bold">{{ $item->nama }}</h3>
                                        <div class="mt-3 text-muted">
                                            {!! Str::limit(strip_tags($item->deskripsi), 300) !!}
                                        </div>
                                        <div class="mt-4">
                                            @php
                                                $fraksiRoute = Str::slug($item->nama);
                                                // Mapping khusus untuk Fraksi Pembangunan yang namanya panjang di Database
                                                if ($fraksiRoute == 'fraksi-pembangunan-keadilan-sejahtera') {
                                                    $fraksiRoute = 'fraksi-pembangunan';
                                                }
                                            @endphp
                                            @if(Route::has($fraksiRoute))
                                                <a href="{{ route($fraksiRoute) }}"
                                                    class="btn btn-primary btn-sm rounded-pill px-4">
                                                    Lihat Detail Fraksi <i class="bi bi-arrow-right ms-1"></i>
                                                </a>
                                            @else
                                                <button class="btn btn-secondary btn-sm rounded-pill px-4" disabled
                                                    title="Halaman detail belum tersedia (Check route: {{ $fraksiRoute }})">
                                                    Detail Belum Tersedia
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <div class="fraksi-logo-container p-3 bg-white rounded shadow-sm">
                                            @if($item->logo)
                                                <img src="{{ asset('uploads/' . ($item->folder ?? 'fraksi') . '/' . $item->logo) }}"
                                                    alt="{{ $item->nama }}" class="img-fluid fraksi-logo">
                                            @else
                                                <img src="{{ asset('dist') }}/assets/img/departments-1.jpg" alt="Default Logo"
                                                    class="img-fluid fraksi-logo">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <style>
            /* Responsive Tabs Styling */
            .responsive-tabs {
                display: flex;
                flex-wrap: nowrap;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                border-bottom: none;
                padding-bottom: 5px;
            }

            .responsive-tabs::-webkit-scrollbar {
                height: 4px;
            }

            .responsive-tabs::-webkit-scrollbar-thumb {
                background: #007bff;
                border-radius: 10px;
            }

            .responsive-tabs .nav-item {
                flex: 0 0 auto;
            }

            @media (min-width: 992px) {
                .responsive-tabs {
                    flex-direction: column;
                    overflow-x: visible;
                }

                .responsive-tabs .nav-link {
                    margin-bottom: 10px;
                    border: 1px solid #dee2e6;
                    border-radius: 8px !important;
                }

                .responsive-tabs .nav-link.active {
                    background-color: #007bff;
                    color: white;
                    border-color: #007bff;
                }
            }

            .fraksi-logo-container {
                transition: transform 0.3s ease;
            }

            .fraksi-logo-container:hover {
                transform: scale(1.05);
            }

            .fraksi-logo {
                max-height: 150px;
                object-fit: contain;
            }

            .tab-pane .details h3 {
                color: #2c3e50;
                font-size: 24px;
            }

            .tab-content {
                background: #f8f9fa;
                border-radius: 15px !important;
            }
        </style>

    </section><!-- /Fraksi Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Pertanyaan yang Sering Diajukan</h2>
            <p>Temukan jawaban atas pertanyaan umum seputar tugas, fungsi, dan layanan DPRD Provinsi kami</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

                    <div class="faq-container">

                        @forelse($faqs as $faq)
                            <div class="faq-item">
                                <h3>{{ $faq->question }}</h3>
                                <div class="faq-content">
                                    <p>{!! nl2br(e($faq->answer)) !!}</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->
                        @empty
                            <div class="text-center py-5">
                                <p>Belum ada data FAQ untuk ditampilkan.</p>
                            </div>
                        @endforelse

                    </div>

                </div><!-- End Faq Column-->

            </div>

        </div>

        <style>
            .faq .faq-container .faq-item .faq-content p {
                text-align: justify;
                hyphens: auto;
            }

            @media (max-width: 768px) {
                .faq .faq-container .faq-item h3 {
                    font-size: 16px;
                    line-height: 1.4;
                }

                .faq .faq-container .faq-item .faq-content p {
                    font-size: 14px;
                    line-height: 1.6;
                }
            }
        </style>

    </section><!-- /Faq Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Kontak & Informasi</h2>
            <p>Hubungi DPRD Ponorogo untuk menyampaikan aspirasi, pengaduan, atau permintaan informasi terkait kebijakan
                daerah</p>
        </div><!-- End Section Title -->

        <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
            <iframe style="border:0; width: 100%; height: 370px;"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.218888625371!2d111.4607947!3d-7.8713702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e799f8534ac9527%3A0x133720168b40cb33!2sDPRD%20Kabupaten%20Ponorogo!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid"
                frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-6 ">
                    <div class="row gy-4">

                        <div class="col-lg-12">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>Jalan Alun-Alun Timur No. 29 Ponorogo</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>0352483864</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>dprdponorogo03@gmail.com</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>
                </div>

                <div class="col-lg-6">
                    <form action="{{ route('contact.send') }}" method="post" data-aos="fade-up" data-aos-delay="500">
                        @csrf
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="4" placeholder="Message"
                                    required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary mt-3">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->
    </section><!-- /Contact Section -->

    {{-- SweetAlert2 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: "{{ session('error') }}",
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Tutup'
                });
            @endif
                                                                        });
    </script>
@endsection