@extends('layout')

@section('content')
<div class="content-wrapper">
    <div class="latest-added">
        <div class="heading">
            <h1> Katalog Buku </h1>
            <form action="">
                <div class="mb-3 searchButton">
                    <input type="text" class="form-control" id="search" name="search" placeholder="search...">
                    <button class="btn btn-outline-secondary" type="submit" id="search" value="{{ request('search') }}"><i class="fa fa-search" aria-hidden="true"></i></button>
                    &nbsp;
                    <a href="{{route('tambahBuku')}}" class="btn btn-primary tombolTambah">Tambah</a>
                </div>
            </form>
        </div>
        <div class="latest-row" id="booknamesearch">
            @foreach ($bukus as $buku)
            <div class="latest-col">
                <div class="latest-img">
                    <img src="{{ asset($buku->gambar) }}" alt="{{ $buku->judul_buku }}" class="img-fluid mt-3">
                </div>
                <div class="info">
                    <a href="detailBuku/{{ $buku->slug }}"  >
                        <h3>{{ $buku->judul_buku }}</h3>
                    </a>
                    <p>{{ $buku->pengarang }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
