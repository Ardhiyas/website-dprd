@extends('layouts.app')
@section('content')

    </section><!-- /Stats Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <div class="container">

            <div class="row justify-content-around gy-4">
                <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100"><img
                        src="{{ asset('dist') }}/assets/img/features.jpg" alt=""></div>

                <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <h3>fRAKSI GOLKAR</h3>
                    <p>FRAKSI PARTAI KEBANGKITAN BANGSA</p>

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
                        <i class="fa-solid fa-hand-holding-medical flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                                occaecati cupiditate non provident</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
                        <i class="fa-solid fa-suitcase-medical flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="500">
                        <i class="fa-solid fa-staff-snake flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Dine Pad</a></h4>
                            <p>Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut
                                deserunt minus aut eligendi omnis</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="600">
                        <i class="fa-solid fa-lungs flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Tride clov</a></h4>
                            <p>Est voluptatem labore deleniti quis a delectus et. Saepe dolorem libero sit non
                                aspernatur odit amet. Et eligendi</p>
                        </div>
                    </div><!-- End Icon Box -->

                </div>
            </div>

        </div>

    </section><!-- /Features Section -->
<body>
    <div class="container">
        <div class="header">
            <h1>FRAKSI PKB</h1>
        </div>

        <div class="subtitle">
            <h2>FRAKSI PARTAI KEBANGKITAN BANGSA</h2>
        </div>

        <div class="logo-container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Logo_PKB_2024.png" alt="Logo PKB">
        </div>

        <table>
            <tbody>
                <tr>
                    <td class="no-column">1.</td>
                    <td class="name-column">MUJIATIN</td>
                    <td class="position-column">KETUA</td>
                </tr>
                <tr>
                    <td class="no-column">2.</td>
                    <td class="name-column">SASMOYO YUDHI HANTARNO, S.Sos</td>
                    <td class="position-column">WAKIL KETUA</td>
                </tr>
                <tr>
                    <td class="no-column">3.</td>
                    <td class="name-column">TRI SURYATI, A.Md</td>
                    <td class="position-column">SEKERTARIS</td>
                </tr>
                <tr>
                    <td class="no-column">4.</td>
                    <td class="name-column">DWI AGUS PRAYITNO, S.H., M.Si</td>
                    <td class="position-column">ANGGOTA</td>
                </tr>
                <tr>
                    <td class="no-column">5.</td>
                    <td class="name-column">H. MASHUDI, S.H</td>
                    <td class="position-column">ANGGOTA</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
@endsection