@extends('layout')
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<div class="container-fluid">
	<div class="row g-0 justify-content-end">
		<div class="col-md-10" id="buku-card">
			<div class="row justify-content-center">
				<div class="col-md-9" id="form-card">
					<h2><b>Edit Buku</b></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-9" id="form-content">
					<form action="editBuku/{{ $buku->slug }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
						<div class="mb-3">
							<label for="judul_buku" class="form-label">Judul Buku</label>
							<input type="text" name="judul_buku" class="form-control" id="judul_buku" value="{{ $buku->judul_buku }}">
						</div>

						<div class="mb-3">
							<label for="pengarang" class="form-label">Pengarang</label>
							<input type="text" name="pengarang" class="form-control" id="pengarang" value="{{ $buku->pengarang }}">
						</div>

                        <div class="mb-3">
							<label for="impresium" class="form-label">Impresium</label>
							<input type="text" name="impresium" class="form-control" id="impresium" value="{{ $buku->impresium }}">
						</div>

                        <div class="mb-3">
							<label for="ISBN" class="form-label">ISBN</label>
							<input type="text" name="ISBN" class="form-control" id="ISBN" value="{{ $buku->ISBN }}">
						</div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="hidden" name="oldGambar" value="{{ $buku->gambar }}">
                            <input class="form-control" type="file" id="gambar" name="gambar">
						</div>

                        <div class="mb-3">
							<label for="jumlah_buku" class="form-label">Jumlah Buku</label>
							<input type="text" name="jumlah_buku" class="form-control" id="jumlah_buku" value="{{ $buku->jumlah_buku}}">
						</div>

                        <div class="mb-3">
							<label for="kolasi" class="form-label">Kolasi</label>
							<input type="text" name="kolasi" class="form-control" id="kolasi" value="{{ $buku->kolasi }}">
						</div>

                        <div class="mb-3">
							<label for="no_class" class="form-label">No Class</label>
							<input type="text" name="no_class" class="form-control" id="no_class" value="{{ $buku->no_class }}">
						</div>
						<button type="submit" class="btn btn-outline-primary">Edit Buku</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
