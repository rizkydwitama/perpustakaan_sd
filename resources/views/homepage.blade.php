@extends('layout')
@section('content')
<link rel="stylesheet" href="{{asset('css/homepage.css')}}">
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>	
        @endif
        <div class="row mb-2">          
          <div class="col-sm-6">           
            <h1 class="m-0">Beranda</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>90</h3>

                <p>Anggota Perpustakaan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="{{route('dataAnggota')}}" class="small-box-footer">Informasi selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>150</h3>

                <p>Katalog Buku</p>
              </div>
              <div class="icon">
                <i class="ion ion-filing"></i>
              </div>
              <a href="{{route('buku')}}" class="small-box-footer">Informasi selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>10</h3>

                <p>Data Peminjaman</p>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-return-right"></i>
              </div>
              <a href="{{route('DataPinjam')}}" class="small-box-footer">Informasi selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>5</h3>

                <p>Data Pengembalian</p>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-return-left"></i>
              </div>
              <a href="{{route('DataKembali')}}" class="small-box-footer">Informasi selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="d-flex justify-content-center">
          <img src="{{asset('img/logo_sd_darul_hikam.png')}}" width="300" height="300">
        </div>

        <div class="d-flex justify-content-center">
          <h2> Perpustakaan SD 1 Darul Hikam Bandung </h2>
        </div>
        
        <div class="d-flex justify-content-center">
          <p> Alamat: Jl. Ir. H. Juanda 285 Bandung, Jawa Barat, Indonesia <p>
        </div>
      </div>
    </section>
  </div>
@endsection