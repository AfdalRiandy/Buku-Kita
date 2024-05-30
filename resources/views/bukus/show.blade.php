@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<div class="container">
    <div class="my-4">
        <h1>{{ $buku->judul }}</h1>
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset($buku->cover_image) }}" class="img-fluid mb-4" style="height: 250px;" alt="Cover Image">
            </div>
            <div class="col-md-9">
                <p class="text-muted">Penulis: {{ $buku->pengarang }}</p>
                <p  style="text-align: justify;">{{ $buku->isi }}</p>
            </div>
        </div>
        <a href="{{ route('bukus.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
