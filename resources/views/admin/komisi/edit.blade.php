@extends('admin.layouts.app')
@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header"><h5>Edit Komisi</h5></div>
        <div class="card-body">
            <form action="{{ route('admin.komisi.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $data->nama) }}" required>
                </div>
                <div class="mb-3">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $data->jabatan) }}" required>
                </div>
                <div class="mb-3">
                    <label>Komisi</label>
                    <input type="text" name="komisi" class="form-control" value="{{ old('komisi', $data->komisi) }}" required>
                </div>
                <div class="mb-3">
                    <label>Foto Saat ini</label><br>
                    @if($data->foto)
                        <img src="{{ asset('uploads/komisi/'.$data->foto) }}" width="120" class="mb-2 rounded">
                    @else
                        <p class="text-muted">Tidak ada foto</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label>Ganti Foto (opsional)</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="text-end">
                    <a href="{{ route('admin.komisi.index') }}" class="btn btn-secondary">Batal</a>
                    <button class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
