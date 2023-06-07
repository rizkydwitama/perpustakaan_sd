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
					<h2>Edit peminjam</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-9" id="form-content">
					<form action="editPeminjam/{{ $pinjam->slug }}" method="post">
						@method('put')
						@csrf
						
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Judul Buku</label>
							<input type="text" name="judul_buku" class="form-control  @error ('judul_buku') is-invalid @enderror" id="exampleFormControlInput1" value="{{ $pinjam->judul_buku }}">
							@error('judul_buku')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>

						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Nama Peminjam</label>
							<input type="text" name="nama_peminjam" class="form-control @error ('nama_peminjam') is-invalid @enderror" id="exampleFormControlInput1" value="{{ $pinjam->nama_peminjam }}">
							@error('nama_peminjam')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>

						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Nomor Induk Siswa</label>
							<input type="text" name="nomor_induk_peminjam" class="form-control @error ('nomor_induk_peminjam') is-invalid @enderror" id="exampleFormControlInput1" value="{{ $pinjam->nomor_induk_peminjam }}">
							@error('nomor_induk_peminjam')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>

						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Tanggal Pinjam</label>
							<br>
							<input type="text" name="tanggal_peminjaman" class="form-control datepicker @error ('tanggal_peminjaman') is-invalid @enderror" id="tglPinjam" value="{{ $pinjam->tanggal_peminjaman }}">
							@error('tanggal_peminjaman')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>

						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Tanggal Kembali</label>
							<br>
							<input type="text" name="tanggal_pengembalian" class="form-control datepicker @error ('tanggal_pengembalian') is-invalid @enderror" id="tglKembali" value="{{ $pinjam->tanggal_pengembalian }}">
							@error('tanggal_pengembalian')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
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