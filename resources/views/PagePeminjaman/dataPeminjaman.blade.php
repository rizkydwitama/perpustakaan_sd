@extends('layout')
@section('content')
<div class="container-fluid">
	<div class="row g-0 justify-content-end">
		<div class="col-md-10" id="pinjam-card">
			<div class="row justify-content-center">
				<div class="col-md-11" id="table-card">
					<h2>Data Peminjaman</h2>
					<a href="{{ route('AddPinjam') }}" class="btn btn-primary">tambah</a>
				</div>
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
							<tr>
								<th scope="row">1</th>
								<td>buya hamka</td>
								<td>dummy name</td>
								<td>130120xxxx</td>
								<td>23-04-2023</td>
								<td>25-04-2023</td>
								<td>Meminjam</td>
								<td>
									<a href="{{ route('EditPinjam') }}" class="btn btn-success">edit</a>
									<a href="#" class="btn btn-danger">dikembalikan</a>
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