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
                    @if(Auth::guard('user')->check())
                        <a href="{{route('tambahBuku')}}" class="btn btn-primary tombolTambah">Tambah</a>
                    @endif
                </div>
            </form>
            
            <form action="">
            @csrf
                <div class="d-flex justify-content-center">
                    <select name='category' class="form-select bg-dark mx-2 rounded" aria-label="Default select example">
                        <option selected>Category</option>
                        @foreach( $categories as $category)
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-dark">Apply</button>
                </div>
            
            </form>
        </div>
        <div class="latest-row" id="booknamesearch">
            @foreach ($bukus as $buku)
            @if($buku->jumlah_buku > 0)
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
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
