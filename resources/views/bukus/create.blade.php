@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<h2 class="mb-4">Tambah Buku</h2>
<form action="{{ route('bukus.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" id="judul" name="judul" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="pengarang" class="form-label">Pengarang</label>
        <input type="text" id="pengarang" name="pengarang" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="isi" class="form-label">Isi</label>
        <textarea id="isi" name="isi" class="form-control" rows="5" required></textarea>
    </div>
    <div class="mb-3">
        <label for="cover_image" class="form-label">Cover Image</label>
        <input type="file" id="cover_image" name="cover_image" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Tambah Buku</button>
</form>
@endsection
