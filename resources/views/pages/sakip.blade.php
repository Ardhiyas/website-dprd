@extends('layouts.app')
@section('content')

<style>
    .sakip-container {
        min-height: calc(100vh - 200px);
    }
    
    .sakip-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }
    
    .sakip-item {
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
        border-radius: 16px;
        padding: 2.5rem 1.5rem;
        transition: all 0.3s ease;
        text-align: center;
        border: 1px solid rgba(0,0,0,0.05);
        box-shadow: 0 4px 6px rgba(0,0,0,0.03);
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
        background: linear-gradient(90deg, #0066cc, #0099ff);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .sakip-item:hover {
        background: #ffffff;
        transform: translateY(-8px);
        box-shadow: 0 12px 20px rgba(0,0,0,0.08);
        border-color: rgba(0,102,204,0.1);
    }
    
    .sakip-item:hover::before {
        opacity: 1;
    }
    
    .sakip-icon {
        width: 80px;
        height: 80px;
        margin-bottom: 1.5rem;
        object-fit: contain;
        transition: transform 0.3s ease;
    }
    
    .sakip-item:hover .sakip-icon {
        transform: scale(1.1);
    }
    
    .sakip-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }
    
    .sakip-subtitle {
        font-size: 0.875rem;
        color: #666;
        font-weight: 400;
    }
    
    .sakip-link {
        text-decoration: none;
        display: block;
        height: 100%;
    }
    
    .sakip-link:hover .sakip-title {
        color: #0066cc;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .sakip-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1rem;
        }
        
        .sakip-item {
            padding: 2rem 1rem;
        }
        
        .sakip-icon {
            width: 70px;
            height: 70px;
        }
    }
    
    @media (max-width: 576px) {
        .sakip-grid {
            grid-template-columns: 1fr;
        }
        
        h2 {
            font-size: 1.75rem;
        }
    }
</style>

<div class="container py-5 sakip-container">
    <!-- Header dengan tahun dinamis -->
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-3 text-primary">SAKIP SEKRETARIAT DPRD</h1>
        <div class="badge bg-primary bg-opacity-10 text-primary px-4 py-2 fs-5 fw-semibold">
            Tahun {{ date('Y') }}
        </div>
        <p class="text-muted mt-3">Sistem Akuntabilitas Kinerja Instansi Pemerintah</p>
    </div>

    <!-- Grid Items -->
    <div class="sakip-grid">
        @php
            $sakipItems = [
                [
                    'icon' => '/img/sakip/calendar.png',
                    'title' => 'RENSTRA 2021–2026',
                    'subtitle' => 'Rencana Strategis',
                    'link' => '#'
                ],
                [
                    'icon' => '/img/sakip/timer.png',
                    'title' => 'RENJA 2024',
                    'subtitle' => 'Rencana Kerja Tahun 2024',
                    'link' => '#'
                ],
                [
                    'icon' => '/img/sakip/money.png',
                    'title' => 'IKU 2024',
                    'subtitle' => 'Indikator Kinerja Utama',
                    'link' => '#'
                ],
                [
                    'icon' => '/img/sakip/pencil.png',
                    'title' => 'PERKIN 2024',
                    'subtitle' => 'Perjanjian Kinerja',
                    'link' => '#'
                ],
                [
                    'icon' => '/img/sakip/document.png',
                    'title' => 'LKj 2024',
                    'subtitle' => 'Laporan Kinerja',
                    'link' => '#'
                ]
            ];
        @endphp
        
        @foreach($sakipItems as $item)
            <a href="{{ $item['link'] }}" class="sakip-link" 
               aria-label="{{ $item['title'] }} - {{ $item['subtitle'] }}">
                <div class="sakip-item">
                    <img src="{{ $item['icon'] }}" 
                         class="sakip-icon" 
                         alt="Icon {{ $item['title'] }}"
                         loading="lazy">
                    <div class="sakip-title">{{ $item['title'] }}</div>
                    <div class="sakip-subtitle">{{ $item['subtitle'] }}</div>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Informasi tambahan -->
    <div class="mt-5 pt-4 border-top text-center">
        <p class="text-muted mb-0">
            <small>
                Update terakhir: {{ date('d F Y') }} | 
                © {{ date('Y') }} Sekretariat DPRD
            </small>
        </p>
    </div>
</div>

@endsection