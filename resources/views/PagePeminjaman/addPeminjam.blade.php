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
					<h2>Tambah peminjam</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-9" id="form-content">
					<form action="/addPeminjam/store" method="post" enctype="multipart/form-data">
						@csrf
						<div class="mb-3">
							<label for="judul_buku" class="form-label">Judul Buku</label>
							@if($buku != null)
								<input type="text" name="judul_buku" class="form-control @error ('judul_buku') is-invalid @enderror" id="judul_buku" value="{{ $buku->judul_buku }}">
							@else
								<input type="text" name="judul_buku" class="form-control @error ('judul_buku') is-invalid @enderror" id="judul_buku">
							@endif
							@error('judul_buku')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>

						<div class="mb-3" hidden>
							<label for="slug" class="form-label">slug</label>
							<input type="text" name="slug" class="form-control" id="slug">
						</div>
						@if($slugBuku)
						<div class="mb-3" hidden>
							<label for="slugBuku" class="form-label">slugBuku</label>
							<input type="text" value="{{ $slugBuku }}" name="slugBuku" class="form-control" id="slugBuku">
						</div>
						@endif

						<div class="mb-3">
							<label for="nama_peminjam" class="form-label">Nama Peminjam</label>
							@if(Auth::guard('anggota')->check())
							<input type="text" name="nama_peminjam" class="form-control @error ('nama_peminjam') is-invalid @enderror" id="nama_peminjam" value="{{ Auth::guard('anggota')->user()->nama_anggota }}">
							@else
							<input type="text" name="nama_peminjam" class="form-control @error ('nama_peminjam') is-invalid @enderror" id="nama_peminjam">

							@endif
							@error('nama_peminjam')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>

						<div class="mb-3">
							<label for="nomor_induk_peminjam" class="form-label">Nomor Induk Siswa</label>
							@if(Auth::guard('anggota')->check())
							<input type="text" name="nomor_induk_peminjam" class="form-control @error ('nomor_induk_peminjam') is-invalid @enderror" id="nomor_induk_peminjam" value="{{ Auth::guard('anggota')->user()->nomor_induk_anggota }}">
							@else
							<input type="text" name="nomor_induk_peminjam" class="form-control @error ('nomor_induk_peminjam') is-invalid @enderror" id="nomor_induk_peminjam">

							@endif
							@error('nomor_induk_peminjam')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>

						<div class="mb-3">
							<label for="tanggal_peminjaman" class="form-label">Tanggal Pinjam</label>
							<br>
							<input type="text" name="tanggal_peminjaman" class="form-control datepicker @error ('tanggal_peminjaman') is-invalid @enderror" id="tanggal_peminjaman">
							@error('tanggal_peminjaman')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>

						<div class="mb-3">
							<label for="tanggal_pengembalian" class="form-label">Tanggal Kembali</label>
							<br>
							<input type="text" name="tanggal_pengembalian" class="form-control datepicker @error ('tanggal_pengembalian') is-invalid @enderror" id="tanggal_pengembalian">
							@error('tanggal_pengembalian')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>

						<button type="submit" class="btn btn-outline-primary">Add Data</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$( function() {
		$( "#tanggal_peminjaman,#tanggal_pengembalian" ).datepicker({
			dateFormat: 'dd/mm/yy'
		});
	});

</script>

<script>
	const judul_buku = document.querySelector('#judul_buku');
	const slug = document.querySelector('#slug');

	judul_buku.addEvenListener('change', function(){
		fetch('/addPeminjam/checkSlug?judul_buku=' + judul_buku.value)
		  .then(response=>response.json())
		  .then(data => slug.value = data.slug)
	});
</script>
@endsection