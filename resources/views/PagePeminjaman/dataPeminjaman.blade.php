
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
					<div class="mb-3 searchButton">
						<input type="nama" class="form-control" id="exampleFormControlInput1" placeholder="adam warlock">
						<a href="#" class="btn btn-secondary"><i class="fa fa-search" aria-hidden="true"></i></a>
						&nbsp;
						<a href="{{ route('AddPinjam') }}" class="btn btn-primary tombolTambah">tambah</a>
					</div>
				</div>
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
							<tr>
								<th scope="row">{{ $pinjam->id }}</th>
								<td>{{ $pinjam->judul_buku }}</td>
								<td>{{ $pinjam->nama_peminjam }}</td>
								<td>{{ $pinjam->nomor_induk_peminjam }}</td>
								<td>{{ date('d-M-Y', strtotime($pinjam->tanggal_peminjaman))}}</td>
								<td>{{ date('d-M-Y', strtotime($pinjam->tanggal_pengembalian)) }}</td>
								<td>
									@if ($pinjam->status_peminjaman == true)
										Meminjam
									@else
										Dikembalikan
									@endif
								</td>
								<td>
									<a href="editPeminjam/{{ $pinjam->slug }}" class="btn btn-success">edit</a>
									<a href="/editPeminjam/{{ $pinjam->slug }}/kembalikan" class="btn btn-danger">dikembalikan</a>
								</td>
							</tr>
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