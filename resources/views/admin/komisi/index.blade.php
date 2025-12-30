@extends('admin.layouts.app')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-header"><h5>1. Pengaturan Komisi</h5></div>
                <div class="card-body">
                    <form action="{{ route('komisi.store_info') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Pilih Kategori</label>
                            <select name="kategori" class="form-select bg-dark text-white border-0">
                                <option value="A">Komisi A</option>
                                <option value="B">Komisi B</option>
                                <option value="C">Komisi C</option>
                                <option value="D">Komisi D</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Komisi (Judul)</label>
                            <input type="text" name="judul" class="form-control bg-dark text-white border-0" placeholder="Contoh: Bidang Pemerintahan" required>
                            <small class="text-info">*Judul akan muncul di bawah kata KOMISI A/B/C/D</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Singkat Komisi</label>
                            <textarea name="deskripsi" class="form-control bg-dark text-white border-0" rows="4" placeholder="Masukkan penjelasan singkat tentang tugas komisi ini..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan/Update Info Komisi</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card bg-secondary text-white">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>2. Galeri Foto Anggota</h5>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addFoto">
                        <i class="fa fa-plus me-1"></i> Tambah Foto Anggota
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Foto</th>
                                    <th>Tipe Data</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{ $item->kategori }}</td>
                                    <td>
                                        @if($item->type == 'anggota')
                                            <img src="{{ asset('uploads/komisi/'.$item->gambar) }}" width="60" class="rounded">
                                        @else
                                            <span class="badge bg-info">Teks (Deskripsi)</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge {{ $item->type == 'anggota' ? 'bg-success' : 'bg-primary' }}">
                                            {{ strtoupper($item->type) }}
                                        </span>
                                    </td>
                                    <td>
                                        <form action="{{ route('komisi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addFoto" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('komisi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content bg-secondary text-white">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Unggah Foto Anggota</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="type" value="anggota">
                    <input type="hidden" name="judul" value="Foto Anggota">
                    
                    <div class="mb-3">
                        <label class="form-label">Pilih Komisi</label>
                        <select name="kategori" class="form-select bg-dark text-white border-0" required>
                            <option value="A">Komisi A</option>
                            <option value="B">Komisi B</option>
                            <option value="C">Komisi C</option>
                            <option value="D">Komisi D</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Anggota</label>
                        <input type="file" name="gambar" class="form-control bg-dark text-white border-0" required>
                        <small class="text-warning">*Ukuran maksimal 2MB (JPG/PNG)</small>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Mulai Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection