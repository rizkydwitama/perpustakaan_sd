@extends('layout')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="{{asset('img/cover_buku.jpg')}}">
                </div>
                <div class="col">
                    <h1> Semua Bisa Menjadi Programmer Laravel Basic </h1>
                    <h3> Yuniar Supardi </h3>
                    <h5> <b> Impresium: </b> Bandung : PT Elex Media Komputindo, 2019 </h5>
                    <h5> <b> ISBN: </b> 978-623-00-1046-0 </h5>
                    <h5> <b> Kolasi: </b> 332 Halaman </h5>
                    <h5> <b> Jumlah Buku: </b> 10 </h5>
                    <h5> <b> Nomor Class: </b> 808, 8.3 ISM </h5>
                    <a href="buku">
                        <button type="button" class="btn btn-secondary btn-lg btn-block">
                            Kembali ke halaman <b> Katalog Buku </b>
                        </button>
                    </a>
                    <a href="{{route('editBuku')}}">
                        <button type="button" class="btn btn-secondary btn-lg btn-block">
                            Edit Buku
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
@endsection