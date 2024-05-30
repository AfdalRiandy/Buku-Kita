
@extends('layouts.app')
@section('title', 'Daftar Buku')

@section('content')
<h2 class="mb-4">Informasi Terbaru</h2>
<div id="carouselExampleControls" class="carousel slide mb-4" data- bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($bukus as $buku)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ asset('slide/2.png') }}" class="d-block w-100" style="height: 200px;" alt="Cover Image">
            </div>
        @endforeach
    </div>
</div>

<h2 class="mb-4">Rekomendasi Buku</h2>
<div class="row">
    @foreach($bukus as $key => $buku)
        @if($key < 3)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ asset($buku->cover_image) }}" class="card-img" alt="Cover Image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $buku->judul }}</h5>
                                <p class="card-text">{{ $buku->pengarang }}</p>
                                <p class="card-text">{{ implode(' ', array_slice(str_word_count($buku->isi, 1), 0, 10)) }}</p>
                                <a href="{{ route('bukus.show', $buku->id) }}" class="btn btn-info">Baca</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>

<h2 class="mb-4">Daftar Buku</h2>
<div class="row">
    @foreach($bukus as $buku)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset($buku->cover_image) }}" class="card-img" alt="Cover Image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $buku->judul }}</h5>
                            <p class="card-text">{{ $buku->pengarang }}</p>
                            <a href="{{ route('bukus.show', $buku->id) }}" class="btn btn-info">Baca</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
