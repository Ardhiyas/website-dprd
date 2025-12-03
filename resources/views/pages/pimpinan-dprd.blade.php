@extends('layouts.app')
@section('content')
            <!-- Doctors Section -->
        <section id="doctors" class="doctors section light-background">

          <!-- Section Title -->
          <div class="container section-title" data-aos="fade-up">
            <h2>Pimpinan DPRD Kabupaten Ponorogo</h2>
            <p>Informasi lengkap mengenai struktur dan jajaran pimpinan DPRD Kabupaten Ponorogo.</p>
          </div><!-- End Section Title -->

          <div class="container">

            <div class="row gy-4">
              @foreach($data as $item)
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="team-member">
                  <div class="member-img">
                    @if($item->foto)
                        <img src="{{ asset('uploads/pimpinan/'.$item->foto) }}" class="img-fluid" alt="">
                    @else
                        <img src="https://via.placeholder.com/300x300?text=No+Image" class="img-fluid" alt="No Image">
                    @endif
                    <!-- <div class="social">
                      <a href=""><i class="bi bi-twitter-x"></i></a>
                      <a href=""><i class="bi bi-facebook"></i></a>
                      <a href=""><i class="bi bi-instagram"></i></a>
                      <a href=""><i class="bi bi-linkedin"></i></a>
                    </div> -->
                  </div>
                  <div class="member-info">
                    <h4>{{ $item->nama }}</h4>
                    <span>{{ $item->jabatan }}</span>
                  </div>
                </div>
              </div><!-- End Team Member -->
              @endforeach
            </div>

          </div>

        </section><!-- /Doctors Section -->
@endsection