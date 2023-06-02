@extends('layout')
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<div class="container-fluid">
	<div class="row g-0 justify-content-end">
		<div class="col-md-10" id="pinjam-card">
			<div class="row justify-content-center">
				<div class="col-md-9" id="form-card">
					<h2>Edit pengembalian</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-9" id="form-content">
					<form action="editPengembalian/{{ $pinjam->slug }}" method="post">
						@method('put')
						@csrf

						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Judul Buku</label>
							<input type="text" name="judul_buku" class="form-control" id="exampleFormControlInput1" value="{{ $pinjam->judul_buku }}">
						</div>

						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Nama Peminjam</label>
							<input type="text" name="nama_peminjam" class="form-control" id="exampleFormControlInput1" value="{{ $pinjam->nama_peminjam }}">
						</div>

						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Nomor Induk Siswa</label>
							<input type="text" name="nomor_induk_peminjam" class="form-control" id="exampleFormControlInput1" value="{{ $pinjam->nomor_induk_peminjam }}">
						</div>

						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Tanggal Pinjam</label>
							<br>
							<input type="text" name="tanggal_peminjaman" class="form-control datepicker" id="tglPinjam" value="{{ $pinjam->tanggal_peminjaman }}">
						</div>

						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Tanggal Kembali</label>
							<br>
							<input type="text" name="tanggal_kembali_faktual" class="form-control datepicker" id="tglKembali" value="{{ $pinjam->tanggal_kembali_faktual }}">
						</div>

						<button type="submit" class="btn btn-outline-primary">Edit Data</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$( function() {
		$( "#tglPinjam,#tglKembali" ).datepicker({
			dateFormat: 'dd/mm/yy'
		});
	});

</script>
@endsection