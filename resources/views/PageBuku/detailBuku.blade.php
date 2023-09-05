
@extends('layout')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="{{ asset($buku->gambar) }}" alt="{{ $buku->judul_buku }}" class="img-fluid mt-3">
                </div>
                <div class="col">
                    <h1> {{ $buku->judul_buku }}</h1>
                    <h3> {{ $buku->pengarang }} </h3>
                    <h5> <b> Impresium: </b> {{ $buku->impresium }} </h5>
                    <h5> <b> ISBN: </b> {{ $buku->ISBN }} </h5>
                    <h5> <b> Kolasi: </b> {{ $buku->kolasi }} </h5>
                    <h5> <b> Jumlah Buku: </b> {{ $buku->jumlah_buku }} </h5>
                    <h5> <b> Nomor Class: </b> {{ $buku->no_class}} </h5>
                    {{-- <a href="{{ route('AddPinjam') }}" class="btn btn-primary tombolTambah">tambah</a> --}}

                    @if (Auth::guard('anggota')->check())

                        <a href="/addPeminjam?slugBuku={{ $buku->slug }}">
                            <button type="button" class="btn btn-success btn-lg btn-block">
                                Pinjam Buku
                            </button>
                        </a>
                    @else
                    <a href="/addPeminjam?slugBuku={{ $buku->slug }}">
                        <button type="button" class="btn btn-success btn-lg btn-block">
                            Pinjam Buku
                        </button>
                    </a>
                        
                    <a href="editBuku/{{ $buku->slug }}">
                        <button type="button" class="btn btn-warning btn-lg btn-block">
                            Edit Buku
                        </button>
                    </a>
                    <form action="{{ route('hapusBuku', $buku->slug) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
                            Hapus Buku
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Buku</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    Apakah yakin ingin menghapus buku ini?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                <button type="submit" class="btn btn-danger">Ya</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
                    @endif
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
