@extends('admin.layouts.app')
@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header"><h5>Tambah Komisi</h5></div>
        <div class="card-body">
            <form action="{{ route('admin.komisi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>
                <div class="mb-3">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}" required>
                </div>
                <div class="mb-3">
                    <label>Komisi (contoh: A)</label>
                    <input type="text" name="komisi" class="form-control" value="{{ old('komisi', 'A') }}" required>
                </div>
                <div class="mb-3">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="text-end">
                    <a href="{{ route('admin.komisi.index') }}" class="btn btn-secondary">Batal</a>
                    <button class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
