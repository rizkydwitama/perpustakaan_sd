@extends('layout')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('storage/' . $buku->gambar) }}" alt="{{ $buku->judul_buku }}">
                </div>
                <div class="col">
                    <h1> {{ $buku->judul_buku }}</h1>
                    <h3> {{ $buku->pengarang }} </h3>
                    <h5> <b> Impresium: </b> {{ $buku->impresium }} </h5>
                    <h5> <b> ISBN: </b> {{ $buku->ISBN }} </h5>
                    <h5> <b> Kolasi: </b> {{ $buku->kolasi }} </h5>
                    <h5> <b> Jumlah Buku: </b> {{ $buku->jumlah_buku }} </h5>
                    <h5> <b> Nomor Class: </b> {{ $buku->no_class}} </h5>
                    <a href="editBuku/{{ $buku->slug }}">
                        <button type="button" class="btn btn-success btn-lg btn-block">
                            Edit Buku
                        </button>
                    </a>
                    <form action="{{ route('hapusBuku', $buku->slug) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-lg btn-block" onclick="return confirm('Apakah Anda ingin menghapus data?')">Hapus Buku</button>
                    </form>
                    <a href="/buku">
                        <button type="button" class="btn btn-secondary btn-lg btn-block">
                            Kembali ke halaman <b> Katalog Buku </b>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
