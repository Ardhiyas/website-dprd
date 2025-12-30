@extends('layouts.app')

@section('content')
<style>
    .sakip-container {
        min-height: calc(100vh - 200px);
        padding-top: 2rem;
        padding-bottom: 4rem;
    }
    
    .sakip-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }
    
    .sakip-item {
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
        border-radius: 16px;
        padding: 2.5rem 1.5rem;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        text-align: center;
        border: 1px solid rgba(0, 102, 204, 0.1);
        box-shadow: 0 4px 12px rgba(0, 102, 204, 0.08);
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    
    .sakip-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #0066cc, #0099ff, #00ccff);
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 1;
    }
    
    .sakip-item::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(0, 102, 204, 0.05), transparent);
        transition: left 0.6s ease;
        z-index: 0;
    }
    
    .sakip-item:hover {
        background: #ffffff;
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 16px 32px rgba(0, 102, 204, 0.12);
        border-color: rgba(0, 102, 204, 0.2);
    }
    
    .sakip-item:hover::before {
        opacity: 1;
    }
    
    .sakip-item:hover::after {
        left: 100%;
    }
    
    .sakip-icon-wrapper {
        width: 90px;
        height: 90px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, rgba(0, 102, 204, 0.1), rgba(0, 153, 255, 0.1));
        border-radius: 20px;
        transition: all 0.4s ease;
        position: relative;
        z-index: 2;
    }
    
    .sakip-item:hover .sakip-icon-wrapper {
        background: linear-gradient(135deg, rgba(0, 102, 204, 0.15), rgba(0, 153, 255, 0.15));
        transform: scale(1.1) rotate(5deg);
    }
    
    .sakip-icon {
        font-size: 2.5rem;
        color: #0066cc;
        transition: all 0.3s ease;
    }
    
    .sakip-item:hover .sakip-icon {
        color: #004d99;
        transform: scale(1.1);
    }
    
    .sakip-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
        line-height: 1.4;
        transition: color 0.3s ease;
        position: relative;
        z-index: 2;
    }
    
    .sakip-subtitle {
        font-size: 0.875rem;
        color: #666;
        font-weight: 400;
        position: relative;
        z-index: 2;
    }
    
    .sakip-link {
        text-decoration: none;
        display: block;
        height: 100%;
        position: relative;
        z-index: 1;
    }
    
    .sakip-link:hover .sakip-title {
        color: #0066cc;
    }
    
    .sakip-badge {
        font-size: 0.75rem;
        font-weight: 500;
        padding: 0.25rem 0.75rem;
        border-radius: 12px;
        background: rgba(0, 102, 204, 0.1);
        color: #0066cc;
        position: absolute;
        top: 1rem;
        right: 1rem;
        z-index: 2;
        transition: all 0.3s ease;
    }
    
    .sakip-item:hover .sakip-badge {
        background: rgba(0, 102, 204, 0.2);
        transform: translateY(-2px);
    }
    
    /* Preloader untuk mencegah FOUC */
    .sakip-preloader {
        display: none;
    }
    
    /* Animasi fade in */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .sakip-item {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
    }
    
    /* Delay untuk animasi staggered */
    .sakip-item:nth-child(1) { animation-delay: 0.1s; }
    .sakip-item:nth-child(2) { animation-delay: 0.2s; }
    .sakip-item:nth-child(3) { animation-delay: 0.3s; }
    .sakip-item:nth-child(4) { animation-delay: 0.4s; }
    .sakip-item:nth-child(5) { animation-delay: 0.5s; }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
        .sakip-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.25rem;
        }
        
        .sakip-item {
            padding: 2rem 1.25rem;
        }
        
        .sakip-icon-wrapper {
            width: 80px;
            height: 80px;
        }
        
        .sakip-icon {
            font-size: 2rem;
        }
    }
    
    @media (max-width: 768px) {
        .sakip-grid {
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
        }
        
        .sakip-item {
            padding: 1.75rem 1rem;
        }
        
        .sakip-icon-wrapper {
            width: 70px;
            height: 70px;
            margin-bottom: 1.25rem;
        }
        
        h1 {
            font-size: 2rem;
        }
    }
    
    @media (max-width: 576px) {
        .sakip-grid {
            grid-template-columns: 1fr;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .sakip-container {
            padding: 1.5rem 0;
        }
    }
</style>

<div class="container py-5 sakip-container">
    <!-- Header dengan tahun dinamis -->
    <div class="text-center mb-4" data-aos="fade-up">
        <div class="d-inline-block p-3 rounded-circle bg-primary bg-opacity-10 mb-3">
            <i class="bi bi-bar-chart-fill fs-1 text-primary"></i>
        </div>
        <h1 class="fw-bold mb-3 text-primary">SAKIP SEKRETARIAT DPRD</h1>
        <div class="d-flex align-items-center justify-content-center gap-3 mb-3">
            <div class="badge bg-primary bg-opacity-10 text-primary px-4 py-2 fs-5 fw-semibold">
                <i class="bi bi-calendar-check me-2"></i>Tahun {{ date('Y') }}
            </div>
            <div class="badge bg-success bg-opacity-10 text-success px-3 py-2">
                <i class="bi bi-check-circle me-1"></i>Aktif
            </div>
        </div>
        <p class="text-muted col-lg-8 mx-auto">
            Sistem Akuntabilitas Kinerja Instansi Pemerintah - Dokumen resmi kinerja Sekretariat DPRD
        </p>
    </div>

    <!-- Preloader (hidden by default) -->
    <div class="sakip-preloader text-center py-5">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Memuat...</span>
        </div>
        <p class="text-muted mt-3">Memuat dokumen SAKIP...</p>
    </div>

    <!-- Grid Items -->
    <div class="sakip-grid" id="sakipGrid">
        @php
            $sakipItems = [
                [
                    'icon' => 'bi-diagram-3-fill',
                    'title' => 'RENSTRA 2021–2026',
                    'subtitle' => 'Rencana Strategis Jangka Menengah',
                    'link' => 'https://drive.google.com/file/d/1YoY-7th_mqWMcbcIyiDhhEMiEFl1PXQ1/view',
                    'badge' => 'PDF',
                    'color' => '#0066cc'
                ],
                [
                    'icon' => 'bi-calendar-month-fill',
                    'title' => 'RENJA 2024',
                    'subtitle' => 'Rencana Kerja Tahunan 2024',
                    'link' => 'https://drive.google.com/file/d/18PQH-5VtJ73wVSzLsuM3yoJvM2dniWkL/view',
                    'badge' => 'PDF',
                    'color' => '#009933'
                ],
                [
                    'icon' => 'bi-graph-up-arrow',
                    'title' => 'IKU 2024',
                    'subtitle' => 'Indikator Kinerja Utama',
                    'link' => 'https://drive.google.com/file/d/15k2aI9YveY8-Chws_QSe44S2xl2-NwWh/view',
                    'badge' => 'PDF',
                    'color' => '#ff9900'
                ],
                [
                    'icon' => 'bi-file-earmark-text-fill',
                    'title' => 'PERKIN 2024',
                    'subtitle' => 'Perjanjian Kinerja Tahun 2024',
                    'link' => 'https://drive.google.com/file/d/1aCYCFHysgaGGYkRz0trPsAlz38LO-S38/view',
                    'badge' => 'PDF',
                    'color' => '#cc3300'
                ],
                [
                    'icon' => 'bi-file-earmark-bar-graph-fill',
                    'title' => 'LKj 2024',
                    'subtitle' => 'Laporan Kinerja Tahunan 2024',
                    'link' => 'https://drive.google.com/file/d/1hizpji2hn3Dwu32tntmRiJlMOsso7-qz/view',
                    'badge' => 'PDF',
                    'color' => '#6633cc'
                ],
                [
                    'icon' => 'bi-journal-check',
                    'title' => 'LAKIP 2023',
                    'subtitle' => 'Laporan Akuntabilitas Kinerja',
                    'link' => '#',
                    'badge' => 'COMING SOON',
                    'color' => '#666666'
                ]
            ];
        @endphp
        
        @foreach($sakipItems as $index => $item)
            <a href="{{ $item['link'] }}" 
               class="sakip-link" 
               target="_blank"
               rel="noopener noreferrer"
               aria-label="{{ $item['title'] }} - {{ $item['subtitle'] }}"
               @if($item['link'] == '#') onclick="return false;" @endif>
                <div class="sakip-item" style="--item-color: {{ $item['color'] }}">
                    @if(isset($item['badge']))
                        <span class="sakip-badge">{{ $item['badge'] }}</span>
                    @endif
                    <div class="sakip-icon-wrapper">
                        <i class="sakip-icon {{ $item['icon'] }}"></i>
                    </div>
                    <div class="sakip-title">{{ $item['title'] }}</div>
                    <div class="sakip-subtitle">{{ $item['subtitle'] }}</div>
                    <div class="mt-3 pt-2 border-top w-100 opacity-50">
                        <small class="text-muted">
                            <i class="bi bi-box-arrow-up-right me-1"></i>Buka Dokumen
                        </small>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Informasi tambahan -->
    <div class="mt-5 pt-5 text-center border-top" data-aos="fade-up" data-aos-delay="300">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="alert alert-info bg-info bg-opacity-10 border-info border-opacity-25">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-info-circle-fill fs-4 text-info me-3"></i>
                        <div class="text-start">
                            <h6 class="alert-heading mb-1">Informasi Dokumen</h6>
                            <p class="mb-0 small">
                                Semua dokumen SAKIP dalam format PDF dan dapat diunduh melalui Google Drive. 
                                Untuk akses lebih cepat, pastikan koneksi internet Anda stabil.
                            </p>
                        </div>
                    </div>
                </div>
                
                <p class="text-muted mb-0">
                    <small>
                        <i class="bi bi-clock-history me-1"></i>Update terakhir: {{ date('d F Y') }} | 
                        <i class="bi bi-copyright ms-2 me-1"></i>{{ date('Y') }} Sekretariat DPRD
                    </small>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi AOS (jika belum ada di layout)
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });
        }
        
        // Optimasi loading: Preload font icons
        const iconLinks = document.querySelectorAll('.sakip-link');
        iconLinks.forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.willChange = 'transform';
            });
            
            link.addEventListener('mouseleave', function() {
                this.style.willChange = 'auto';
            });
        });
        
        // Smooth scroll untuk anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Log loading time (untuk debugging)
        window.addEventListener('load', function() {
            const loadTime = window.performance.timing.domContentLoadedEventEnd - window.performance.timing.navigationStart;
            console.log('SAKIP page loaded in', loadTime, 'ms');
        });
    });
</script>
@endsection