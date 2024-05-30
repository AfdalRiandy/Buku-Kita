@extends('layouts.app')
@section('title', 'Daftar Buku')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Dashboard Admin</h2>
    <a class="btn btn-primary" href="{{ route('bukus.create') }}">Tambah Buku</a>
</div>
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
                            <a href="{{ route('bukus.edit', $buku->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('bukus.destroy', $buku->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
