@extends('layouts.app')

@section('content')
<section class="komisi-section">
    <div class="container">
        <div class="section-title">
            <h2>Komisi DPRD Kabupaten Ponorogo</h2>
        </div>

        @foreach($data_komisi as $kategori => $komisis)
        <div class="komisi-kategori mb-5">
            <h3 class="mb-4">Komisi {{ $kategori }}</h3>
            
            <div class="row">
                @foreach($komisis as $komisi)
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $komisi->nama_komisi }}</h5>
                            <p class="card-text">{{ $komisi->deskripsi }}</p>
                            
                            @if($komisi->fotos->count() > 0)
                            <div class="row mt-3">
                                @foreach($komisi->fotos as $foto)
                                <div class="col-md-3 mb-2">
                                    <img src="{{ asset('storage/' . $foto->foto) }}" 
                                         class="img-fluid rounded" 
                                         alt="{{ $foto->keterangan }}">
                                </div>
                                @endforeach
                            </div>
                            @endif
                            
                            <a href="{{ route('komisi.show', $komisi->slug) }}" 
                               class="btn btn-primary mt-3">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection