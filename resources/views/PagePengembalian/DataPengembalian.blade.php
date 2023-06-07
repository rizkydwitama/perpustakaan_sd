@extends('layout')
@section('content')
<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel = "stylesheet" href = "https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<div class="container-fluid">
	<div class="row g-0 justify-content-end">
		<div class="col-md-10" id="pinjam-card">
			<div class="row justify-content-center">
				<div class="col-md-11" id="table-card">
					<h2>Data Pengembalian</h2>
					<form action="/dataPengembalian">
						<div class="mb-3 searchButton">
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Search.." name="search" value="{{ request('search') }}">
							<button class="btn btn-secondary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
							&nbsp;
							<a href="{{ route('DataKembali') }}" class="btn btn-primary tombolTambah">tambah</a>
						</div>
					</form>
				</div>
				@if (session()->has('success'))
				<div class="alert alert-success col-md-11" role="alert">
					{{ session('success') }}
				</div>	
				@endif
			</div>
			<div class="row justify-content-center">
				<div class="col-md-11" id="table-content">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th scope="col">id</th>
								<th scope="col">judul buku</th>
								<th scope="col">nama</th>
								<th scope="col">nomor induk</th>
								<th scope="col">tanggal peminjaman</th>
								<th scope="col">tanggal pengembalian</th>
								<th scope="col">status</th>
								<th scope="col">aksi</th>

							</tr>
						</thead>
						<tbody>
							@foreach ($pinjams as $pinjam)
							@if ($pinjam->status_peminjaman == 0)															
							<tr>
								<th scope="row">{{ $pinjam->id }}</th>
								<td>{{ $pinjam->judul_buku }}</td>
								<td>{{ $pinjam->nama_peminjam }}</td>
								<td>{{ $pinjam->nomor_induk_peminjam }}</td>
								<td>{{ date('d-M-Y', strtotime($pinjam->tanggal_peminjaman))}}</td>
								<td>{{ date('d-M-Y', strtotime($pinjam->tanggal_kembali_faktual)) }}</td>
								<td>Dikembalikan</td>
								<td>
									<a href="editPengembalian/{{ $pinjam->slug }}" class="btn btn-primary">edit</a>
									<a href="editPengembalian/{{ $pinjam->slug }}/batal" class="btn btn-warning">batal</a>
									<a href="editPengembalian/{{ $pinjam->slug }}/hapus" class="btn btn-danger" onclick="return confirm('Apakah Anda ingin menghapus data?')">hapus</a>
								</td>
							</tr>
							@endif
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
@endsection