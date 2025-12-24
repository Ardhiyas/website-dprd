@extends('admin.layouts.app')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-header"><h5>Update Deskripsi Komisi</h5></div>
                <div class="card-body">
                    <form action="{{ route('admin.komisi.store_info') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Pilih Komisi</label>
                            <select name="kategori" class="form-select bg-dark text-white border-0">
                                <option value="A">Komisi A</option>
                                <option value="B">Komisi B</option>
                                <option value="C">Komisi C</option>
                                <option value="D">Komisi D</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Deskripsi Singkat</label>
                            <textarea name="deskripsi" class="form-control bg-dark text-white border-0" rows="5" placeholder="Masukkan deskripsi komisi..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan Deskripsi</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card bg-secondary text-white">
                <div class="card-header d-flex justify-content-between">
                    <h5>Foto Anggota Komisi</h5>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addFoto">Tambah Foto</button>
                </div>
                <div class="card-body">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Komisi</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                                @if($item->type == 'anggota')
                                <tr>
                                    <td>Komisi {{ $item->kategori }}</td>
                                    <td><img src="{{ asset('uploads/komisi/'.$item->gambar) }}" width="50"></td>
                                    <td>
                                        <form action="{{ route('admin.komisi.destroy', $item->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addFoto" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.komisi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content bg-secondary text-white">
                <div class="modal-body">
                    <input type="hidden" name="type" value="anggota">
                    <div class="mb-3">
                        <label>Pilih Komisi</label>
                        <select name="kategori" class="form-select bg-dark text-white border-0">
                            <option value="A">Komisi A</option>
                            <option value="B">Komisi B</option>
                            <option value="C">Komisi C</option>
                            <option value="D">Komisi D</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Foto Anggota</label>
                        <input type="file" name="gambar" class="form-control bg-dark text-white border-0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection