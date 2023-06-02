@extends('layout')
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<div class="container-fluid">
	<div class="row g-0 justify-content-end">
		<div class="col-md-10" id="anggota-card">
			<div class="row justify-content-center">
				<div class="col-md-9" id="form-card">
					<h2>Edit Anggota Perpustakaan</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-9" id="form-content">
					<form action="#" method="#" enctype="multipart/form-data">
						<div class="mb-3">
							<label for="nama_lengkap" class="form-label">Nama Lengkap</label>
							<input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap">
						</div>

						<div class="mb-3">
							<label for="nomor_induk" class="form-label">Nomor Induk</label>
							<input type="text" name="nomor_induk" class="form-control" id="nomor_induk">
						</div>

						<div class="mb-3">
							<label for="kelas" class="form-label">Kelas</label>
							<input type="text" name="kelas" class="form-control" id="kelas">
						</div>

						<div class="mb-3">
							<label for="jumlah_peminjaman" class="form-label">Jumlah Peminjaman</label>
							<br>
							<input type="text" name="jumlah_peminjaman" class="form-control" id="jumlah_peminjaman">
						</div>

						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
							<br>
							<input type="radio"  name="jenis_kelamin" id="laki_laki" value="Laki-Laki">
							<label class="form-check-label" for="laki_laki"> Laki-Laki </label>
							<br>
							<input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
							<label class="form-check-label" for="perempuan"> Perempuan </label>
						</div>

						<button type="submit" class="btn btn-outline-primary">Edit Anggota</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection