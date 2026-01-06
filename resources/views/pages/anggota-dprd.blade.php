@extends('layouts.app')
@section('content')
  <section id="doctors" class="doctors section light-background">

    <div class="container section-title" data-aos="fade-up">
      <h2>Anggota DPRD Kabupaten Ponorogo</h2>
      <p>Informasi lengkap mengenai struktur dan jajaran Anggota DPRD Kabupaten Ponorogo.</p>
    </div>

    <div class="container">
      <div class="row gy-4">
        @foreach($data as $item)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="team-member w-100 shadow-sm bg-white"
              style="border-radius: 8px; overflow: hidden; display: flex; flex-direction: column;">

              <div class="member-img"
                style="position: relative; width: 100%; aspect-ratio: 3 / 4; overflow: hidden; background-color: #f8f9fa;">
                @if($item->foto)
                  <img src="{{ asset('uploads/anggota/' . $item->foto) }}" class="img-fluid w-100 h-100"
                    style="object-fit: cover; object-position: top;" loading="lazy" alt="{{ $item->nama }}">
                @else
                  <img src="https://via.placeholder.com/600x800?text=No+Image" class="img-fluid w-100 h-100"
                    style="object-fit: cover;" loading="lazy" alt="No Image">
                @endif
              </div>

              <div class="member-info p-3 text-center"
                style="flex-grow: 1; display: flex; flex-direction: column; justify-content: center;">
                <h4 style="font-size: 1.1rem; font-weight: bold; margin-bottom: 5px; color: #333;">{{ $item->nama }}</h4>
                <span class="text-muted text-uppercase"
                  style="font-size: 0.8rem; letter-spacing: 1px;">{{ $item->jabatan }}</span>
              </div>

            </div>
          </div>
        @endforeach
      </div>
    </div>

  </section>
@endsection