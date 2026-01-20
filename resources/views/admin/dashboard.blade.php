@extends('admin.layouts.app')
@section('content')
    <!-- Statistics Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-users fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Anggota</p>
                        <h6 class="mb-0">{{ $count['anggota'] }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-university fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Fraksi</p>
                        <h6 class="mb-0">{{ $count['fraksi'] }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-landmark fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Komisi</p>
                        <h6 class="mb-0">{{ $count['komisi'] }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-images fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Berita/Galeri</p>
                        <h6 class="mb-0">{{ $count['gallery'] }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Statistics End -->


    <!-- Recent Gallery Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Berita & Galeri Terbaru</h6>
                <a href="{{ route('gallery.index') }}">Lihat Semua</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">NO</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentGalleries as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>{{ Str::limit($item->title, 50) }}</td>
                                <td>{{ $item->category ?? 'Berita' }}</td>
                                <td><a class="btn btn-sm btn-primary" href="{{ route('gallery.edit', $item->id) }}">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data terbaru</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Gallery End -->


    <!-- Widgets Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0">Akses Cepat</h6>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-3">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0"><a href="{{ route('pimpinan.index') }}" class="text-white"><i
                                            class="fa fa-user-tie me-2"></i>Kelola Pimpinan</a></h6>
                            </div>
                            <small>Update data pimpinan DPRD</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-3">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0"><a href="{{ route('gallery.create') }}" class="text-white"><i
                                            class="fa fa-plus me-2"></i>Tambah Berita</a></h6>
                            </div>
                            <small>Posting berita atau galeri baru</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-3">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0"><a href="{{ route('about.index') }}" class="text-white"><i
                                            class="fa fa-cog me-2"></i>Setting Dashboard</a></h6>
                            </div>
                            <small>Ubah konten About & FAQ</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Calender</h6>
                        <a href="">Show All</a>
                    </div>
                    <div id="calender"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Widgets End -->
@endsection