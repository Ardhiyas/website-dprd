@extends('admin.layouts.app')
@section('content')
<div class="container py-5">
    <div class="card bg-secondary">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Pimpinan</h5>
                <a href="{{route('pimpinan.create" class="btn btn-round btn-primary">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>JABATAN</th>
                        <th>FOTO</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection