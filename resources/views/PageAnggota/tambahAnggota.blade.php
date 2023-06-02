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
					<h2>Tambah Anggota Perpustakaan</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-9" id="form-content">
					<form action="/tambahAnggota/store" method="post" enctype="multipart/form-data">
						@csrf
                        <div class="mb-3">
							<label for="nama_anggota" class="form-label">Nama</label>
							<input type="text" name="nama_anggota" class="form-control" id="nama_anggota">
						</div>

						<div class="mb-3">
							<label for="nomor_induk_anggota" class="form-label">Nomor Induk Anggota</label>
							<input type="text" name="nomor_induk_anggota" class="form-control" id="nomor_induk_anggota">
						</div>

						<div class="mb-3">
							<label for="kelas" class="form-label">Kelas</label>
							<input type="text" name="kelas" class="form-control" id="kelas">
						</div>

                        <div class="mb-3">
							<label for="jumlah_pinjam" class="form-label">Jumlah Pinjam</label>
							<input type="number" name="jumlah_pinjam" class="form-control" id="jumlah_pinjam">
						</div>

						<div class="mb-3">
							<label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
							<br>
							<input type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-Laki">
							<label class="form-check-label" for="laki_laki"> Laki-Laki </label>
							<br>
							<input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
							<label class="form-check-label" for="perempuan"> Perempuan </label>
						</div>

						<button type="submit" class="btn btn-outline-primary">Tambah Anggota</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
