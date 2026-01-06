@extends('admin.layouts.app')
@section('content')
    <div class="container py-5">
        <div class="card bg-secondary">
            <div class="card-header">
                <h5 class="card-title">Edit Fraksi: {{ $data->nama }}</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('fraksi.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama Fraksi</label>
                        <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Logo</label>
                        @if($data->logo)
                            <div class="mb-2">
                                <img src="{{ asset('uploads/fraksi/' . $data->logo) }}" width="100">
                            </div>
                        @endif
                        <input type="file" name="logo" class="form-control">
                        <small class="text-light">Biarkan kosong jika tidak ingin mengubah logo.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4">{{ $data->deskripsi }}</textarea>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('fraksi.index') }}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection