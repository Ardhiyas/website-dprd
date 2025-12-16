@extends('admin.layouts.app')
@section('content')

<div class="container py-5">
    <div class="card bg-secondary">
        <div class="card-header">
            <h5 class="card-title">Edit Konten Komisi: {{ $komisi->nama }}</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('komisi.update', $komisi->id) }}" method="POST" enctype="multipart/form-data" id="komisiForm">
                @csrf
                @method('PUT') 
                
                {{-- Input Hidden untuk Gambar yang akan dihapus --}}
                <input type="hidden" name="delete_images_ids" id="deleteImagesInput" value="[]">

                {{-- BLOK 1: Data Dasar Komisi --}}
                <h4 class="mb-3">Informasi Dasar</h4>
                
                <div class="mb-3">
                    <label class="form-label">Nama Komisi (Non-Editable: {{ $komisi->nama }})</label>
                    <input type="text" name="nama" class="form-control" value="{{ $komisi->nama }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Komisi (Paragraf di bawah Judul)</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi', $komisi->deskripsi) }}</textarea>
                    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <hr class="my-5">

                {{-- BLOK 2: Galeri Gambar Slider --}}
                <h4 class="mb-3">Galeri Gambar Slider</h4>

                {{-- Bagian Menampilkan Gambar yang Sudah Ada --}}
                <div class="row mb-4">
                    <p>Klik tombol 'X' pada gambar untuk menandainya agar dihapus saat tombol Update ditekan.</p>
                    @forelse ($komisi->images as $image)
                        <div class="col-md-3 col-sm-4 col-6 mb-3 image-item" data-id="{{ $image->id }}">
                            <div class="position-relative">
                                <img src="{{ asset($uploadDir . $image->path_gambar) }}" class="img-fluid rounded shadow" style="height: 120px; width: 100%; object-fit: cover;" alt="Gambar Komisi">
                                <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 delete-image-btn" data-id="{{ $image->id }}" style="opacity: 0.8;">X</button>
                            </div>
                        </div>
                    @empty
                        <div class="col-12"><p class="text-muted">Belum ada gambar yang diunggah untuk Komisi ini.</p></div>
                    @endforelse
                </div>

                {{-- Bagian Upload Gambar Baru --}}
                <div class="mb-3">
                    <label class="form-label">Unggah Gambar Baru (Dapat memilih lebih dari satu)</label>
                    <input type="file" name="new_images[]" class="form-control @error('new_images.*') is-invalid @enderror" multiple>
                    @error('new_images.*')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    <small class="form-text text-muted">Format: Gambar (max 2MB per file).</small>
                </div>

                <div class="text-end mt-4">
                    <a href="{{ route('komisi.index') }}" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-success">Update Data Komisi</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-image-btn');
        const deleteImagesInput = document.getElementById('deleteImagesInput');
        let idsToDelete = [];

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const imageId = this.getAttribute('data-id');
                const imageItem = document.querySelector(`.image-item[data-id="${imageId}"]`);

                if (imageItem) {
                    // Tandai untuk dihapus (sembunyikan di frontend dan masukkan ID ke array)
                    imageItem.style.opacity = '0.3';
                    this.textContent = 'Undo';
                    this.classList.remove('btn-danger');
                    this.classList.add('btn-info');
                    
                    idsToDelete.push(imageId);
                    deleteImagesInput.value = JSON.stringify(idsToDelete);

                    this.removeEventListener('click', arguments.callee); // Hapus listener lama
                    
                    // Tambahkan listener untuk Undo
                    this.addEventListener('click', function undoDelete() {
                        imageItem.style.opacity = '1';
                        this.textContent = 'X';
                        this.classList.remove('btn-info');
                        this.classList.add('btn-danger');
                        
                        // Hapus ID dari array
                        idsToDelete = idsToDelete.filter(id => id !== imageId);
                        deleteImagesInput.value = JSON.stringify(idsToDelete);

                        this.removeEventListener('click', undoDelete); // Hapus listener Undo
                        // Re-tambahkan listener Delete asli
                        button.addEventListener('click', arguments.callee);
                    });
                }
            });
        });
    });
</script>
@endsection