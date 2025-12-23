@extends('admin.layouts.app')
@section('content')
<div class="container py-5">
    <div class="card bg-secondary">
        <div class="card-header">
            <h5 class="card-title">Tambah Anggota Fraksi Demokrat</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('demokrat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                {{-- ========================================================== --}}
                {{-- BLOK KONFIGURASI UMUM (TAMPIL HANYA JIKA BELUM ADA DATA) --}}
                {{-- ========================================================== --}}
                @if (!$config)
                    <div class="alert alert-info">
                        <strong>Perhatian:</strong> Karena ini adalah anggota pertama, masukkan juga Judul, Logo, dan Deskripsi Fraksi.
                    </div>
                    
                    {{-- Input Judul --}}
                    <div class="mb-3">
                        <label class="form-label">Judul Fraksi</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required>
                        @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    
                    {{-- Input Logo --}}
                    <div class="mb-3">
                        <label class="form-label">Logo Fraksi</label>
                        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" required>
                        @error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <small class="form-text text-muted">Format: Gambar (max 2MB)</small>
                    </div>

                    {{-- Input Deskripsi --}}
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Fraksi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                @else
                    {{-- Jika data sudah ada, kita sembunyikan input Judul/Logo/Deskripsi 
                         tetapi kirimkan nilai yang sudah ada sebagai input hidden agar store() tidak error karena validasi. --}}
                    
                    <div class="alert alert-warning">
                        Judul, Logo, dan Deskripsi Fraksi telah diatur. Anda hanya perlu menambah data anggota baru.
                    </div>

                    <input type="hidden" name="judul" value="{{ $config->judul }}">
                    <input type="hidden" name="logo_existing" value="{{ $config->logo }}"> 
                    <input type="hidden" name="deskripsi" value="{{ $config->deskripsi }}">
                    
                    {{-- CATATAN: Karena input logo bersifat FILE, kita TIDAK bisa mengirimkan file via input hidden.
                         Solusi terbaik adalah MENGUBAH VALIDASI DI CONTROLLER jika $config sudah ada.
                         Kita akan atasi di Controller Store() --}}
                @endif
                
                <hr class="my-4">
                
                <h4>Data Anggota</h4>

                {{-- Input Nama --}}
                <div class="mb-3">
                    <label class="form-label">Nama Anggota</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- Input Jabatan --}}
                <div class="mb-3">
                    <label class="form-label">Jabatan Anggota</label>
                    <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan') }}" required>
                    @error('jabatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="text-end mt-4">
                    <a href="{{ route('demokrat.index') }}" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan Data Anggota</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection