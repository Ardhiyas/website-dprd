@extends('layouts.app')

@section('content')
<div class="container py-5">
    @forelse($data_komisi as $kategori => $items)
        @php
            $info = $items->where('type', 'info')->first();
            $galeri = $items->where('type', 'anggota');
        @endphp

        <!-- Header Section untuk Komisi -->
        <section id="komisi-{{ $kategori }}" class="mb-5 pb-4">
            <div class="row align-items-center mb-5" data-aos="fade-up">
                <div class="col-lg-8 mx-auto text-center">
                    <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary px-4 py-2 mb-3 d-inline-block fw-medium">
                        Komisi {{ $kategori }}
                    </span>
                    <h2 class="display-5 fw-bold mb-3 text-dark">{{ $info->judul ?? 'Komisi ' . $kategori }}</h2>
                    <div class="mx-auto mb-4" style="width: 80px; height: 3px; background: linear-gradient(90deg, #106eea, #0dcaf0);"></div>
                    <p class="lead text-muted mb-0">
                        {{ $info->deskripsi ?? 'Deskripsi Komisi ' . $kategori . ' belum diatur.' }}
                    </p>
                </div>
            </div>

            <!-- Grid Anggota Komisi -->
            <div class="row g-4 justify-content-center">
                @forelse($galeri as $foto)
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 50 }}">
                        <div class="member-card text-center h-100">
                            <div class="card border-0 shadow-sm h-100 overflow-hidden position-relative" style="border-radius: 16px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                <!-- Gambar Anggota -->
                                <div class="member-img-wrapper overflow-hidden position-relative" style="height: 300px;">
                                    <img src="{{ asset('uploads/komisi/' . $foto->gambar) }}" 
                                         class="img-fluid h-100 w-100" 
                                         style="object-fit: cover; transition: transform 0.5s ease;"
                                         alt="Anggota Komisi {{ $kategori }}">
                                    
                                    <!-- Overlay Gradient -->
                                    <div class="member-overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-end p-4">
                                        <div class="overlay-content text-white">
                                            <h5 class="fw-bold mb-1">Anggota Komisi</h5>
                                            <p class="small mb-3">Komisi {{ $kategori }}</p>
                                            
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ asset('uploads/komisi/' . $foto->gambar) }}" 
                                                   class="glightbox btn btn-light btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                                   style="width: 40px; height: 40px;"
                                                   data-gallery="gallery{{ $kategori }}"
                                                   title="Anggota Komisi {{ $kategori }}">
                                                    <i class="bi bi-zoom-in text-primary"></i>
                                                </a>
                                                <button class="btn btn-primary btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                                        style="width: 40px; height: 40px;"
                                                        onclick="showMemberDetail('{{ $foto->id }}', '{{ $kategori }}')">
                                                    <i class="bi bi-info-lg"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Nama Anggota (Tampil di Bawah Gambar) -->
                                <div class="card-body p-4">
                                    <h6 class="card-title fw-bold mb-1">Anggota Komisi {{ $kategori }}</h6>
                                    <p class="card-text text-muted small mb-0">
                                        {{ $info->judul ?? 'Anggota Terpilih' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Placeholder jika tidak ada anggota -->
                    <div class="col-12 text-center py-5">
                        <div class="empty-state" data-aos="fade-up">
                            <div class="empty-icon mb-4">
                                <i class="bi bi-people display-4 text-light bg-primary bg-opacity-10 rounded-circle p-4"></i>
                            </div>
                            <h4 class="fw-medium text-muted mb-3">Belum ada anggota</h4>
                            <p class="text-muted">Anggota untuk Komisi {{ $kategori }} akan segera diumumkan.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </section>

        <!-- Separator antar komisi -->
        @if(!$loop->last)
            <div class="my-5 py-4">
                <div class="text-center">
                    <div class="d-inline-block" style="width: 100px; height: 1px; background: linear-gradient(90deg, transparent, #dee2e6, transparent);"></div>
                </div>
            </div>
        @endif

    @empty
        <!-- State jika tidak ada data komisi sama sekali -->
        <div class="py-5 my-5 text-center">
            <div class="empty-state" data-aos="fade-up">
                <div class="empty-icon mb-4">
                    <i class="bi bi-building display-1 text-light bg-primary bg-opacity-10 rounded-circle p-5"></i>
                </div>
                <h3 class="fw-bold text-dark mb-3">Data Komisi Belum Tersedia</h3>
                <p class="text-muted col-lg-6 mx-auto mb-4">
                    Informasi mengenai komisi-komisi kami sedang dalam proses persiapan. 
                    Silakan kembali lagi nanti untuk melihat detail komisi dan anggota-anggotanya.
                </p>
                <a href="{{ url('/') }}" class="btn btn-outline-primary px-4">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Beranda
                </a>
            </div>
        </div>
    @endforelse
</div>

<!-- Modal untuk Detail Anggota -->
<div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 px-4 pb-4">
                <div class="row">
                    <div class="col-md-5 text-center">
                        <div class="rounded-circle overflow-hidden mx-auto mb-3" style="width: 140px; height: 140px;">
                            <img id="modalMemberImg" src="" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="Foto Anggota">
                        </div>
                        <h5 id="modalMemberName" class="fw-bold mb-1">Nama Anggota</h5>
                        <p id="modalMemberPosition" class="text-primary small fw-medium">Posisi</p>
                    </div>
                    <div class="col-md-7">
                        <h6 class="fw-bold text-dark mb-3">Detail Informasi</h6>
                        <div id="modalMemberDetail" class="small text-muted">
                            Informasi detail tentang anggota akan ditampilkan di sini.
                        </div>
                        <div class="mt-4 pt-3 border-top">
                            <h6 class="fw-bold text-dark mb-2">Kontak</h6>
                            <div class="d-flex gap-3">
                                <a href="#" class="text-decoration-none text-primary">
                                    <i class="bi bi-envelope me-1"></i> Email
                                </a>
                                <a href="#" class="text-decoration-none text-primary">
                                    <i class="bi bi-telephone me-1"></i> Telepon
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styles Kustom -->
<style>
    /* Animasi dan efek hover untuk kartu anggota */
    .member-card .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 24px rgba(16, 110, 234, 0.15) !important;
    }
    
    .member-img-wrapper:hover img {
        transform: scale(1.05);
    }
    
    /* Overlay dengan gradient */
    .member-overlay {
        background: linear-gradient(to top, rgba(16, 110, 234, 0.85), transparent 60%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }
    
    .member-card:hover .member-overlay {
        opacity: 1;
    }
    
    /* Styling untuk badge komisi */
    .badge.bg-primary.bg-opacity-10 {
        letter-spacing: 0.5px;
    }
    
    /* Styling untuk empty state */
    .empty-state {
        padding: 3rem 1rem;
    }
    
    .empty-icon {
        display: inline-flex;
    }
    
    /* Responsif untuk judul */
    @media (max-width: 768px) {
        h2.display-5 {
            font-size: 2rem;
        }
        
        .member-img-wrapper {
            height: 250px !important;
        }
    }
    
    /* Efek smooth untuk seluruh bagian */
    section {
        scroll-margin-top: 100px;
    }
    
    /* Modal styling */
    .modal-content {
        overflow: hidden;
    }
</style>

<!-- JavaScript untuk interaksi -->
<script>
    // Inisialisasi AOS
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    });
    
    // Inisialisasi GLightbox setelah DOM siap
    document.addEventListener('DOMContentLoaded', function() {
        const lightbox = GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true,
            zoomable: true
        });
    });
    
    // Fungsi untuk menampilkan detail anggota
    function showMemberDetail(memberId, komisiKategori) {
        // Dalam implementasi nyata, Anda akan mengambil data dari server berdasarkan memberId
        // Contoh data statis untuk demo:
        const baseUrl = '{{ asset("uploads/komisi") }}';
        
        // Set data contoh untuk modal
        document.getElementById('modalMemberImg').src = baseUrl + '/default-member.jpg';
        document.getElementById('modalMemberName').textContent = 'Anggota Komisi ' + komisiKategori;
        document.getElementById('modalMemberPosition').textContent = 'Anggota Komisi ' + komisiKategori;
        
        // Detail informasi
        document.getElementById('modalMemberDetail').innerHTML = `
            <p>Informasi detail tentang anggota komisi. Deskripsi tentang peran, tanggung jawab, dan kontribusi dalam komisi.</p>
            <ul class="mb-0">
                <li>Masa jabatan: 2023-2026</li>
                <li>Bidang keahlian: Hukum dan Legislasi</li>
                <li>Pengalaman: 10 tahun</li>
                <li>Komisi: ${komisiKategori}</li>
            </ul>
        `;
        
        // Set link email dan telepon
        const emailLink = document.querySelector('#memberModal a[href="#"]:first-child');
        const phoneLink = document.querySelector('#memberModal a[href="#"]:last-child');
        
        if(emailLink) {
            emailLink.href = 'mailto:anggota@komisi' + komisiKategori + '.dprd.go.id';
            emailLink.innerHTML = '<i class="bi bi-envelope me-1"></i> Email';
        }
        
        if(phoneLink) {
            phoneLink.href = 'tel:+622112345678';
            phoneLink.innerHTML = '<i class="bi bi-telephone me-1"></i> Telepon';
        }
        
        // Tampilkan modal
        const memberModal = new bootstrap.Modal(document.getElementById('memberModal'));
        memberModal.show();
    }
</script>
@endsection