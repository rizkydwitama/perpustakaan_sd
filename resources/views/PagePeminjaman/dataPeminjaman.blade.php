
@extends('layout')
@section('content')
<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel = "stylesheet" href = "https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<div class="container-fluid">
	

	<div class="row g-0 justify-content-end">
		<div class="col-md-10" id="pinjam-card">
			<div class="row justify-content-center">
				
				<div class="col-md-11" id="table-card">
					<h2>Data Peminjaman</h2>
					<form action="/dataPeminjaman">
					<div class="mb-3 searchButton">

						<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Search.." name="search" value="{{ request('search') }}">
						<button class="btn btn-secondary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
						&nbsp;
						@if(Auth::guard('user')->check())
							<a href="{{ route('AddPinjam') }}" class="btn btn-primary tombolTambah">tambah</a>
						@endif
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
					<table id="dataPinjam" class="table table-bordered table-hover tablePinjam">
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
							@if ($pinjam->status_peminjaman)
							<tr>
								<th scope="row">{{ $pinjam->id }}</th>
								<td>{{ $pinjam->judul_buku }}</td>
								<td>{{ $pinjam->nama_peminjam }}</td>
								<td>{{ $pinjam->nomor_induk_peminjam }}</td>
								<td>{{ date('d-M-Y', strtotime($pinjam->tanggal_peminjaman))}}</td>
								<td>{{ date('d-M-Y', strtotime($pinjam->tanggal_pengembalian)) }}</td>
								<td>Meminjam</td>
								<td>
									@if(Auth::guard('user')->check())
										<a href="editPeminjam/{{ $pinjam->slug }}" class="btn btn-success">Edit</a>
									@endif


									<a class="btn btn-warning" data-toggle="modal" data-target="#exampleModal2">Kembalikan</a>


									@if(Auth::guard('user')->check())
										<a class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Hapus</a>
									@endif
									
								</td>
							</tr>
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Hapus Data Peminjaman</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									</div>
									<div class="modal-body">
										Apakah yakin ingin menghapus data peminjaman ini?
									</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
									<a href="editPeminjam/{{ $pinjam->slug }}/hapus" class="btn btn-danger">Ya</a>
									</div>
								</div>
								</div>
							</div>

							<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Kembalikan Buku</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									</div>
									<div class="modal-body">
										Apakah buku sudah dikembalikan?
									</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
									<a href="editPeminjam/{{ $pinjam->slug }}/kembalikan" class="btn btn-warning">Ya</a>
									</div>
								</div>
								</div>
							</div>
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