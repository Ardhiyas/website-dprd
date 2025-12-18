@extends('admin.layouts.app')
@section('content')

<div class="container py-5">
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card bg-secondary">
        <div class="card-header">
            <h5 class="card-title">Edit Konten Komisi: {{ $komisi->nama }}</h5>
        </div>

        <div class="card-body">
            {{-- Form akan mengirim data ke KomisiController@update --}}
            <form action="{{ route('komisi.update', $komisi->id) }}" method="POST" enctype="multipart/form-data" id="komisiForm">
                @csrf
                @method('PUT') 
                
                {{-- Input Hidden untuk menyimpan ID Gambar yang akan dihapus (diisi oleh JS) --}}
                <input type="hidden" name="delete_images_ids" id="deleteImagesInput" value="[]">

                {{-- BLOK 1: Data Dasar Komisi --}}
                <h4 class="mb-3">Informasi Dasar Komisi</h4>
                
                <div class="mb-3">
                    <label class="form-label">Nama Komisi</label>
                    {{-- Nama Komisi biasanya hanya dibaca atau tidak diubah --}}
                    <input type="text" name="nama" class="form-control" value="{{ $komisi->nama }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Komisi (Paragraf di bawah Judul)</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi', $komisi->deskripsi) }}</textarea>
                    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <hr class="my-5">

                {{-- BLOK 2: Galeri Gambar Slider --}}
                <h4 class="mb-3">Kelola Galeri Gambar Slider</h4>

                {{-- Bagian Menampilkan Gambar yang Sudah Ada --}}
                <div class="row mb-4">
                    <p class="text-muted">Klik tombol **'X'** pada gambar untuk menandainya agar **dihapus** saat tombol **Update** ditekan. (Data yang sudah ada: {{ $komisi->images->count() }} gambar)</p>
                    
                    @forelse ($komisi->images as $image)
                        <div class="col-md-3 col-sm-4 col-6 mb-3 image-item" data-id="{{ $image->id }}">
                            <div class="position-relative">
                                {{-- Menggunakan variabel $uploadDir yang dikirim dari KomisiController@edit --}}
                                <img src="{{ asset($uploadDir . $image->path_gambar) }}" 
                                     class="img-fluid rounded shadow" 
                                     style="height: 120px; width: 100%; object-fit: cover;" 
                                     alt="Gambar Komisi">
                                
                                {{-- Tombol untuk menandai penghapusan --}}
                                <button type="button" 
                                        class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 delete-image-btn" 
                                        data-id="{{ $image->id }}" 
                                        style="opacity: 0.8; cursor: pointer;">
                                    X
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="col-12"><p class="alert alert-info">Belum ada gambar yang diunggah untuk Komisi ini.</p></div>
                    @endforelse
                </div>

                {{-- Bagian Upload Gambar Baru --}}
                <div class="mb-3">
                    <label class="form-label">Unggah Gambar Baru (Dapat memilih lebih dari satu)</label>
                    <input type="file" name="new_images[]" class="form-control @error('new_images.*') is-invalid @enderror" multiple>
                    @error('new_images.*')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    <small class="form-text text-muted">Format: Gambar (max 2MB per file). Gambar baru akan ditambahkan ke slider.</small>
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

        // Fungsi untuk mengupdate input hidden JSON
        const updateHiddenInput = () => {
            deleteImagesInput.value = JSON.stringify(idsToDelete);
        };

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const imageId = this.getAttribute('data-id');
                const imageItem = document.querySelector(`.image-item[data-id="${imageId}"]`);

                if (!imageItem) return;

                // Cek apakah ID sudah ada di array (artinya sedang dalam status "siap dihapus")
                const isMarkedForDeletion = idsToDelete.includes(imageId);

                if (isMarkedForDeletion) {
                    // --- UNDO DELETE ---
                    // Hapus ID dari array
                    idsToDelete = idsToDelete.filter(id => id !== imageId);
                    
                    // Reset tampilan
                    imageItem.style.opacity = '1';
                    this.textContent = 'X';
                    this.classList.remove('btn-info');
                    this.classList.add('btn-danger');
                    this.setAttribute('title', 'Tandai untuk dihapus');

                } else {
                    // --- MARK FOR DELETION ---
                    // Tambahkan ID ke array
                    idsToDelete.push(imageId);
                    
                    // Ubah tampilan
                    imageItem.style.opacity = '0.3';
                    this.textContent = 'Undo';
                    this.classList.remove('btn-danger');
                    this.classList.add('btn-info');
                    this.setAttribute('title', 'Batalkan penghapusan');
                }
                
                updateHiddenInput();
            });
        });
    });
</script>
@endsection