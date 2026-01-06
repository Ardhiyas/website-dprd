@extends('admin.layouts.app')
@section('content')
    <div class="container py-5">
        <div class="card bg-secondary">
            <div class="card-header">
                <h5 class="card-title">Tambah Komisi</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('komisi.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Komisi</label>
                        <input type="text" name="nama" class="form-control" placeholder="Contoh: Komisi A" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bidang</label>
                        <input type="text" name="bidang" class="form-control" placeholder="Contoh: Bidang Pemerintahan">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('komisi.index') }}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection