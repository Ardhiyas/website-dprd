@extends('layouts.app')
@section('content')

    <!-- Komisi Section -->
    <section id="komisi" class="doctors section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ $nama }}</h2>
            <p>{{ $deskripsi ?? 'Informasi mengenai anggota ' . $nama }}</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">
                @forelse($anggotas as $item)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="team-member">
                            <div class="member-img">
                                @if($item->foto)
                                    <img src="{{ asset('uploads/' . ($folder ?? 'anggota') . '/' . $item->foto) }}"
                                        class="img-fluid" loading="lazy" alt="{{ $item->nama }}">
                                @else
                                    <img src="https://via.placeholder.com/300x300?text=No+Image" class="img-fluid" loading="lazy"
                                        alt="No Image">
                                @endif
                            </div>
                            <div class="member-info">
                                <h4>{{ $item->nama }}</h4>
                                <span>{{ $item->jabatan }}</span>
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                @empty
                    <div class="col-12 text-center">
                        <p>Belum ada anggota yang terdaftar di {{ $nama }}.</p>
                    </div>
                @endforelse
            </div>
        </div>

    </section><!-- /Komisi Section -->

@endsection