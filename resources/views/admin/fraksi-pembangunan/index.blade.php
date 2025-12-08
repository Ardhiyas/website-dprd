@extends('admin.layouts.app')
@section('content')
<div class="container py-5">
    <div class="card bg-secondary">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Fraksi Pembangunan</h5>
                <a href="{{route('fraksi-pembangunan.create" class="btn btn-round btn-primary">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>JUDUL FRAKSI</th>
                        <th>LOGO FRAKSI</th>
                        <th>DESKRIPSI FRKASI</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="container py-5">
    <div class="card bg-secondary">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Fraksi Pembangunan</h5>
                <a href="{{route('fraksi-pembangunan.create" class="btn btn-round btn-primary">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>JABATAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection