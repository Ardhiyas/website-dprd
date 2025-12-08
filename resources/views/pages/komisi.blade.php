@extends('layouts.app')

@section('content')

<div class="swiper-wrapper align-items-center">
    @forelse($data as $m)
        <div class="swiper-slide">
            <a class="glightbox" data-gallery="images-gallery" href="{{ $m->foto ? asset('uploads/komisi/'.$m->foto) : '#' }}">
                <img src="{{ $m->foto ? asset('uploads/komisi/'.$m->foto) : asset('path/to/default.jpg') }}" class="img-fluid" alt="">
            </a>
            <div class="text-center mt-2 fw-bold">{{ $m->nama }}</div>
            <div class="text-center text-muted">{{ $m->jabatan }}</div>
        </div>
    @empty
        <div class="swiper-slide">
            <div class="p-4 text-center">Belum ada data anggota.</div>
        </div>
    @endforelse
</div>


@endsection