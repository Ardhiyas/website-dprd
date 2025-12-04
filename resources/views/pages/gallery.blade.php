@extends('layouts.app')
@section('content')

<style>
    .card-hover {
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        border-radius: 18px;
    }
    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0px 18px 40px rgba(0, 0, 0, 0.18);
    }

    .img-hover {
        transition: transform 0.7s ease;
    }
    .img-hover:hover {
        transform: scale(1.08);
    }

    .card-title {
        font-size: 1.15rem;
    }

    .btn-rounded {
        border-radius: 999px !important;
    }
</style>

<div class="container py-4">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

        @for ($i = 1; $i <= 6; $i++)
            <div class="col">
                <div class="card h-100 shadow-lg border-0 rounded-4 card-hover">
                    <div class="overflow-hidden rounded-top-4">
                        <img src="https://dprd-ponorogo.go.id/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-29-at-09.57.16-383x200.jpeg"
                             class="card-img-top img-hover"
                             alt="image">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Ketua DPRD Ponorogo Serahkan Piala Bergilir Pemenang Kompetisi Voli Liga Santri Cup II 2025</h5>
                        <p class="card-text text-secondary">
                            Konten singkat yang menjelaskan informasi penting dengan gaya menarik dan mudah dipahami.
                        </p>
                        <a href="#" class="btn btn-primary btn-rounded px-4 mt-2">Selengkapnya</a>
                    </div>
                </div>
            </div>
        @endfor

    </div>
</div>
@endsection
