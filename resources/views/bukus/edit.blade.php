@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<h2 class="mb-4">Edit Buku</h2>
<form action="{{ route('bukus.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" id="judul" name="judul" class="form-control" value="{{ $buku->judul }}" required>
    </div>
    <div class="mb-3">
        <label for="pengarang" class="form-label">Pengarang</label>
        <input type="text" id="pengarang" name="pengarang" class="form-control" value="{{ $buku->pengarang }}" required>
    </div>
    <div class="mb-3">
        <label for="isi" class="form-label">Isi</label>
        <textarea id="isi" name="isi" class="form-control" rows="5" required>{{ $buku->isi }}</textarea>
    </div>
    <div class="mb-3">
        <label for="cover_image" class="form-label">Cover Image</label>
        <input type="file" id="cover_image" name="cover_image" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Update Buku</button>
</form>
@endsection
