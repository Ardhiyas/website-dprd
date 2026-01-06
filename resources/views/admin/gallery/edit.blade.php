@extends('admin.layouts.app')
@section('content')
    <div class="container py-5">
        <div class="card bg-secondary">
            <div class="card-header">
                <h5 class="card-title">Edit Konten Galeri</h5>
            </div>

            <div class="card-body">
                {{-- Menggunakan rute resource gallery.update dengan ID dan Method PUT --}}
                <form action="{{ route('gallery.update', $galleryItem->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Input Gambar --}}
                    <div class="mb-3">
                        <label class="form-label">Gambar Kegiatan</label>

                        @if ($galleryItem->path_gambar)
                            <div class="mb-2">
                                <img src="{{ asset('uploads/gallery/' . $galleryItem->path_gambar) }}" alt="Gambar Saat Ini"
                                    style="width: 150px; height: 100px; object-fit: cover; border-radius: 4px;">
                                <small class="form-text text-muted d-block">Gambar saat ini.</small>
                            </div>
                        @endif

                        <input type="file" name="path_gambar"
                            class="form-control @error('path_gambar') is-invalid @enderror">
                        @error('path_gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti gambar. Format: Gambar
                            (max 2MB)</small>
                    </div>

                    {{-- Input Judul --}}
                    <div class="mb-3">
                        <label class="form-label">Judul Kegiatan</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                            value="{{ old('judul', $galleryItem->judul) }}" required>
                        @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Input Deskripsi Singkat --}}
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Singkat</label>
                        <textarea name="deskripsi_singkat"
                            class="form-control @error('deskripsi_singkat') is-invalid @enderror" rows="3"
                            required>{{ old('deskripsi_singkat', $galleryItem->deskripsi_singkat) }}</textarea>
                        @error('deskripsi_singkat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <small class="form-text text-muted">Deskripsi ini akan tampil di halaman utama Galeri.</small>
                    </div>

                    {{-- Input Body (Isi Berita Lengkap) --}}
                    <div class="mb-3">
                        <label class="form-label">Isi Berita Lengkap</label>
                        <textarea name="body" class="form-control @error('body') is-invalid @enderror" rows="10"
                            required>{{ old('body', $galleryItem->body) }}</textarea>
                        @error('body')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Input Slug --}}
                    <div class="mb-3">
                        <label class="form-label">URL Slug (Contoh: liga-santri-2025)</label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                            value="{{ old('slug', $galleryItem->slug) }}">
                        @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <small class="form-text text-muted">Harus unik. Gunakan huruf kecil dan tanda hubung (-).</small>
                    </div>

                    <div class="text-end mt-4">
                        <a href="{{ route('gallery.index') }}" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-success">Update Konten Galeri</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection