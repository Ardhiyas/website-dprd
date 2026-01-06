@extends('admin.layouts.app')
@section('content')
    <div class="container py-5">
        <div class="card bg-secondary">
            <div class="card-header">
                <h5 class="card-title">Edit Anggota Komisi B</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('komisi-b.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" value="{{ $data->nama }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" value="{{ $data->jabatan }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Lama</label><br>
                        @if($data->foto)
                            <img src="{{ asset('uploads/komisi-b/' . $data->foto) }}" width="100" class="mb-2 rounded">
                        @else
                            <p class="text-muted">Tidak ada foto</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Baru (opsional)</label>
                        <input type="file" name="foto" class="form-control">
                    </div>

                    <div class="text-end">
                        <a href="{{ route('komisi-b.index') }}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection