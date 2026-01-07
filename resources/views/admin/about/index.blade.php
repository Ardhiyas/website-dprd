@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Setting Section About</h6>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Judul (Main Title)</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ $about->title ?? 'DPRD Ponorogo: Wadah Aspirasi Rakyat, Pengawal Pembangunan Daerah' }}"
                                    required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Sub Judul (Subtitle/Italic)</label>
                                <input type="text" name="subtitle" class="form-control"
                                    value="{{ $about->subtitle ?? 'Sebagai representasi masyarakat Kabupaten Ponorogo, DPRD berkomitmen menjalankan fungsi konstitusional untuk mewujudkan pemerintahan yang demokratis, transparan, dan berpihak pada kesejahteraan rakyat.' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Link Video YouTube</label>
                                <input type="url" name="video_url" class="form-control"
                                    value="{{ $about->video_url ?? 'https://youtu.be/yKbUQkkA-ks?si=2jk7nqbbuc89bJrk' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gambar Section</label>
                                <input type="file" name="image" class="form-control">
                                @if($about && $about->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('uploads/about/' . $about->image) }}" width="150"
                                            class="rounded shadow-sm">
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Deskripsi Utama</label>
                                <textarea name="description" class="form-control"
                                    rows="4">{{ $about->description ?? 'DPRD Ponorogo terdiri dari perwakilan partai politik yang terpilih melalui pemilihan umum, bekerja secara kolektif-kolegial untuk menyerap, menampung, dan menindaklanjuti aspirasi masyarakat. Dengan semangat "Ngesti Wiyata, Amrih Rahayu", kami bertekad membangun Ponorogo yang maju, mandiri, dan berbudaya.' }}</textarea>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Poin Legislasi</label>
                                <input type="text" name="point_1" class="form-control"
                                    value="{{ $about->point_1 ?? 'Fungsi Legislasi: Menyusun dan menetapkan Peraturan Daerah (Perda) yang berpihak pada kepentingan masyarakat Ponorogo' }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Poin Anggaran</label>
                                <input type="text" name="point_2" class="form-control"
                                    value="{{ $about->point_2 ?? 'Fungsi Anggaran: Menetapkan Anggaran Pendapatan dan Belanja Daerah (APBD) secara akuntabel dan transparan' }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Poin Pengawasan</label>
                                <input type="text" name="point_3" class="form-control"
                                    value="{{ $about->point_3 ?? 'Fungsi Pengawasan: Mengawasi pelaksanaan Perda dan kebijakan pemerintah daerah demi efektivitas pembangunan' }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection