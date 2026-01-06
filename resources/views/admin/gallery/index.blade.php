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

        <div class="card bg-secondary">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Daftar Konten gallery Kegiatan</h5>
                    <a href="{{ route('gallery.create') }}" class="btn btn-round btn-primary">Tambah Konten Baru</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 50px;">NO</th>
                                <th>GAMBAR</th>
                                <th>JUDUL</th>
                                <th>DESKRIPSI (Singkat)</th>
                                <th>NO BERITA (Body)</th>
                                <th style="width: 150px;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Looping data dari Controller index() --}}
                            @forelse ($galleryItems as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/gallery/' . $item->path_gambar) }}" alt="Gambar"
                                            style="width: 80px; height: 50px; object-fit: cover; border-radius: 4px;">
                                    </td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ Str::limit($item->deskripsi_singkat, 70) }}</td>
                                    <td>{{ Str::limit($item->body, 50) }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('gallery.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning text-white">Edit</a>

                                            <form action="{{ route('gallery.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus konten ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada konten gallery yang ditambahkan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection