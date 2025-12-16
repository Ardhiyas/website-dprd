@extends('admin.layouts.app')
@section('content')
<div class="container py-5">
    <div class="card bg-secondary">
        <div class="card-header">
            <h5 class="card-title">Tambah Konten Galeri Baru</h5>
        </div>

        <div class="card-body">
            {{-- Menggunakan rute resource gallery.store --}}
            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                {{-- Input Gambar --}}
                <div class="mb-3">
                    <label class="form-label">Gambar Kegiatan</label>
                    <input type="file" name="path_gambar" class="form-control @error('path_gambar') is-invalid @enderror" required>
                    @error('path_gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    <small class="form-text text-muted">Format: Gambar (max 2MB)</small>
                </div>
                
                {{-- Input Judul --}}
                <div class="mb-3">
                    <label class="form-label">Judul Kegiatan</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required>
                    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- Input Deskripsi Singkat --}}
                <div class="mb-3">
                    <label class="form-label">Deskripsi Singkat</label>
                    <textarea name="deskripsi_singkat" class="form-control @error('deskripsi_singkat') is-invalid @enderror" rows="3" required>{{ old('deskripsi_singkat') }}</textarea>
                    @error('deskripsi_singkat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    <small class="form-text text-muted">Deskripsi ini akan tampil di halaman utama Galeri.</small>
                </div>
                
                {{-- Input Slug (Opsional, jika Anda ingin Admin menginputnya manual) --}}
                <div class="mb-3">
                    <label class="form-label">URL Slug (Contoh: liga-santri-2025)</label>
                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}">
                    @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    <small class="form-text text-muted">Jika dikosongkan, akan dibuat otomatis dari Judul.</small>
                </div>


                <div class="text-end mt-4">
                    <a href="{{ route('gallery.index') }}" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan Konten Galeri</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection