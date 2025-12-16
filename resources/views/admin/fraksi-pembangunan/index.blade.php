@extends('admin.layouts.app')
@section('content')

<div class="container py-5">
    
    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Ambil data konfigurasi utama (entry pertama) --}}
    @php
        $config = $data->first();
    @endphp

    {{-- ========================================================== --}}
    {{-- BLOK 1: KONFIGURASI UMUM (JUDUL, LOGO, DESKRIPSI) (SINGLE ENTRY) --}}
    {{-- ========================================================== --}}
    <div class="card bg-secondary mb-5">
        <div class="card-header">
            <h5 class="card-title mb-0">Pengaturan Umum Fraksi Pembangunan (Judul, Logo, Deskripsi)</h5>
        </div>
        <div class="card-body">
            @if($config)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 100px;">LOGO</th>
                                <th>JUDUL FRAKSI</th>
                                <th>DESKRIPSI (Singkat)</th>
                                <th style="width: 100px;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ asset('uploads/fraksi-pembangunan/' . $config->logo) }}" alt="Logo" style="width: 50px; height: 50px; object-fit: cover;">
                                </td>
                                <td>{{ $config->judul }}</td>
                                <td>{{ Str::limit($config->deskripsi, 80) }}</td> 
                                <td>
                                    {{-- Mengarah ke halaman edit, hanya menggunakan ID entri pertama --}}
                                    <a href="{{ route('pembangunan.edit', $config->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <small class="text-muted">Mengubah data di sini akan mengubah Judul, Logo, dan Deskripsi untuk semua anggota.</small>
            @else
                <p class="text-center">Data konfigurasi belum ada. Silakan <a href="{{ route('pembangunan.create') }}">tambahkan anggota pertama</a>.</p>
            @endif
        </div>
    </div>

    {{-- ========================================================== --}}
    {{-- BLOK 2: DAFTAR ANGGOTA (NAMA & JABATAN) --}}
    {{-- ========================================================== --}}
    <div class="card bg-secondary">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Anggota Fraksi Pembangunan (Nama & Jabatan)</h5>
                <a href="{{ route('pembangunan.create') }}" class="btn btn-round btn-primary">Tambah Anggota Baru</a> 
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 50px;">NO</th>
                            <th>NAMA ANGGOTA</th>
                            <th>JABATAN</th>
                            <th style="width: 150px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        {{-- Mengarah ke halaman edit anggota. Kita edit SEMUA field, tapi fokus pada Nama/Jabatan --}}
                                        <a href="{{ route('pembangunan.edit', $item->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                                        
                                        {{-- Tombol Hapus --}}
                                        <form action="{{ route('pembangunan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada anggota fraksi yang terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection