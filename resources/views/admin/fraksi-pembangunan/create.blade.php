@extends('admin.layouts.app')
@section('content')
<div class="container py-5">
    <div class="card bg-secondary">
        <div class="card-header">
            <h5 class="card-title">Tambah Anggota Fraksi Pembangunan</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('fraksi-pembangunan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" required>
                </div>

                <div class="text-end">
                    <a href="{{ route('fraksi-pembangunan.index') }}" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
