@extends('layout')

@section('content')
<div class="content-wrapper">
    <div class="latest-added">
        <div class="heading">
            <h1> Katalog Buku </h1>
            <div class="mb-3 searchButton">
                <input type="nama" class="form-control" id="exampleFormControlInput1" placeholder="laravel">
                <a href="#" class="btn btn-secondary"><i class="fa fa-search" aria-hidden="true"></i></a>
                &nbsp;
                <a href="{{route('tambahBuku')}}" class="btn btn-primary tombolTambah">Tambah</a>
            </div>
        </div>
        <div class="latest-row" id="booknamesearch">
            <div class="latest-col">
                <div class="latest-img"> 
                    <img src="{{asset('img/cover_buku.jpg')}}"> 
                </div>
                <div class="info">
                    <a href="{{route('detailBuku')}}" >
                        <h3> Judul Buku 1 </h3>
                    </a>
                    <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat, voluptatibus. </p>
                </div>
            </div>
            <div class="latest-col">
                <div class="latest-img"> 
                    <img src="{{asset('img/cover_buku.jpg')}}"> 
                </div>
                <div class="info">
                    <h3> Judul Buku 2 </h3>
                    <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat, voluptatibus. </p>
                </div>
            </div>
            <div class="latest-col">
                <div class="latest-img"> 
                    <img src="{{asset('img/cover_buku.jpg')}}"> 
                </div>
                <div class="info">
                    <h3> Judul Buku 3 </h3>
                    <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat, voluptatibus. </p>
                </div>
            </div>
            <div class="latest-col">
                <div class="latest-img"> 
                    <img src="{{asset('img/cover_buku.jpg')}}"> 
                </div>
                <div class="info">
                    <h3> Judul Buku 4 </h3>
                    <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat, voluptatibus. </p>
                </div>
            </div>
            <div class="latest-col">
                <div class="latest-img"> 
                    <img src="{{asset('img/cover_buku.jpg')}}"> 
                </div>
                <div class="info">
                    <h3> Judul Buku 5 </h3>
                    <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat, voluptatibus. </p>
                </div>
            </div>
            <div class="latest-col">
                <div class="latest-img"> 
                    <img src="{{asset('img/cover_buku.jpg')}}"> 
                </div>
                <div class="info">
                    <h3> Judul Buku 6 </h3>
                    <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat, voluptatibus. </p>
                </div>
            </div>
            <div class="latest-col">
                <div class="latest-img"> 
                    <img src="{{asset('img/cover_buku.jpg')}}"> 
                </div>
                <div class="info">
                    <h3> Judul Buku 7 </h3>
                    <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat, voluptatibus. </p>
                </div>
            </div>
            <div class="latest-col">
                <div class="latest-img"> 
                    <img src="{{asset('img/cover_buku.jpg')}}"> 
                </div>
                <div class="info">
                    <h3> Judul Buku 8 </h3>
                    <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat, voluptatibus. </p>
                </div>
            </div>
            <div class="latest-col">
                <div class="latest-img"> 
                    <img src="{{asset('img/cover_buku.jpg')}}"> 
                </div>
                <div class="info">
                    <h3> Judul Buku 9 </h3>
                    <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat, voluptatibus. </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection