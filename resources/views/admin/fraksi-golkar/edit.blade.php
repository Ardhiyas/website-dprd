@extends('admin.layouts.app')
@section('content')
<div class="container py-5">
    <div class="card bg-secondary">
        <div class="card-header">
            <h5 class="card-title">Edit Data Anggota Fraksi Golkar</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('golkar.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 

                {{-- ========================================================== --}}
                {{-- BLOK EDIT KONFIGURASI UMUM (MEMPENGARUHI SEMUA ANGGOTA) --}}
                {{-- ========================================================== --}}
                <h4 class="mb-3">Pengaturan Umum Fraksi</h4>
                <div class="alert alert-danger">
                    <strong>Peringatan!</strong> Perubahan pada Judul, Logo, atau Deskripsi di bawah ini akan **mengubah data yang sama pada semua anggota** yang terdaftar di database.
                </div>

                {{-- Input Judul --}}
                <div class="mb-3">
                    <label class="form-label">Judul Fraksi</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                           value="{{ old('judul', $data->judul) }}" required>
                    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- Input Logo --}}
                <div class="mb-3">
                    <label class="form-label">Logo Fraksi</label>
                    @if ($data->logo)
                        <div class="mb-2">
                            <img src="{{ asset('uploads/fraksi-golkar/' . $data->logo) }}" alt="Logo Saat Ini" style="width: 100px; height: 100px; object-fit: cover;">
                            <small class="form-text text-muted d-block">Biarkan kosong jika tidak ingin mengubah logo.</small>
                        </div>
                    @endif
                    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
                    @error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    <small class="form-text text-muted">Format: Gambar (max 2MB)</small>
                </div>

                {{-- Input Deskripsi --}}
                <div class="mb-3">
                    <label class="form-label">Deskripsi Fraksi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi', $data->deskripsi) }}</textarea>
                    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <hr class="my-4">
                
                {{-- ========================================================== --}}
                {{-- BLOK EDIT DATA ANGGOTA (NAMA DAN JABATAN) --}}
                {{-- ========================================================== --}}
                <h4>Data Anggota yang Diedit</h4>
                <div class="alert alert-secondary">
                    Perubahan pada Nama dan Jabatan hanya berlaku untuk anggota ini.
                </div>

                {{-- Input Nama --}}
                <div class="mb-3">
                    <label class="form-label">Nama Anggota</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" 
                           value="{{ old('nama', $data->nama) }}" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- Input Jabatan --}}
                <div class="mb-3">
                    <label class="form-label">Jabatan Anggota</label>
                    <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" 
                           value="{{ old('jabatan', $data->jabatan) }}" required>
                    @error('jabatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="text-end mt-4">
                    <a href="{{ route('golkar.index') }}" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Update Data Anggota</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection