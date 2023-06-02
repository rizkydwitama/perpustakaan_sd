@extends('layout')
@section('content')
<div class="container-fluid">
	<div class="row g-0 justify-content-end">
		<div class="col-md-10" id="anggota-card">
			<div class="row justify-content-center">
				<div class="col-md-11" id="table-card">
					<h2>Data Anggota Perpustakaan</h2>
					<div class="mb-3 searchButton">
						<input type="nama" class="form-control" id="exampleFormControlInput1" placeholder="cari anggota">
						<a href="#" class="btn btn-secondary"><i class="fa fa-search" aria-hidden="true"></i></a>
						&nbsp;
						<a href="{{ route('tambahAnggota') }}" class="btn btn-primary tombolTambah">Tambah</a>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-11" id="table-content">
					<table id="dataAnggota" class="table table-bordered table-hover tableAnggota">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Nama Lengkap</th>
								<th scope="col">Nomor Induk</th>
								<th scope="col">Kelas</th>
								<th scope="col">Jumlah Peminjaman</th>
								<th scope="col">Jenis Kelamin</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">0</th>
								<td>A</td>
								<td>A</td>
								<td>A</td>
								<td>A</td>
								<td>A</td>
								<td>
									<a href="{{route('editAnggota')}}" class="btn btn-success">Edit</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection