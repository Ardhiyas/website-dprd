@extends('layouts.app')
@section('content')

<!-- Features Section -->
    <section id="features" class="features section">

        <div class="container">

            <div class="row justify-content-around gy-4">
                <div class="features-image col-lg-4" data-aos="fade-up" data-aos-delay="100"><img
                        src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgMwTqnnAKEY0IeyeDwwkWepi_BtrmsvCPSJDvvHaRXhkDw666GnWVcySgz9z3VMfJl3z18llgpH9dFQH22EVMgQBoXIyFvXh31yn90IN8i4V4ef4STO6Re4C5EsgBafAWsHfdHORVt64KJqURTOAB95unYeawkYMWRY5uO_-jBftZMeaCsFsEx0A/w400-h400/Logo%20PKS%20Terbaru.png" alt=""></div>

                <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <h3>Struktur Anggota</h3>
                    <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed
                        minima temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi</p>

                    <table class="table table-bordered table-striped table-hover mt-4 shadow-sm">
                        <thead class="table-primary text-center">
                            <tr>
                                <th style="width: 70px;">No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <tr>
                                <td class="text-center">1</td>
                                <td>CHRISTINE HERY PURNAWATI, S.E</td>
                                <td><span class="badge bg-success px-3 py-2">KETUA</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>RIBUT RIYANTO</td>
                                <td><span class="badge bg-info px-3 py-2">WAKIL KETUA</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>UDIN IRCHAMNA</td>
                                <td><span class="badge bg-warning px-3 py-2 text-dark">SEKRETARIS</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>ABU KOLAR</td>
                                <td><span class="badge bg-secondary px-3 py-2">ANGGOTA</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </section><!-- /Features Section -->
@endsection