@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Edit FAQ</h6>
                    <form action="{{ route('faq.update', $faq->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Pertanyaan</label>
                            <input type="text" name="question" class="form-control" value="{{ $faq->question }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jawaban</label>
                            <textarea name="answer" class="form-control" rows="5" required>{{ $faq->answer }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('faq.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection