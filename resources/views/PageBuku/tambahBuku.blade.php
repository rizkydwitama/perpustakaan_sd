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
					<h2><b>Tambah Buku</b></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-9" id="form-content">
					<form action="/tambahBuku/store" method="post" enctype="multipart/form-data">
						@csrf
						<div class="mb-3">
							<label for="judul_buku" class="form-label">Judul Buku</label>
							<input type="text" name="judul_buku" class="form-control @error ('judul_buku') is-invalid @enderror" id="judul_buku" required autofocus value="{{ old('judul_buku') }}">
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

						<div class="mb-3">
							<label for="pengarang" class="form-label">Pengarang</label>
							<input type="text" name="pengarang" class="form-control @error ('pengarang') is-invalid @enderror" id="pengarang" required value="{{ old('pengarang') }}">
                            @error('pengarang')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
                        </div>

                        <div class="mb-3">
							<label for="impresium" class="form-label">Impresium</label>
							<input type="text" name="impresium" class="form-control @error ('impresium') is-invalid @enderror" id="impresium" required value="{{ old('impresium') }}">
                            @error('impresium')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
                        </div>

                        <div class="mb-3">
							<label for="ISBN" class="form-label">ISBN</label>
							<input type="text" name="ISBN" class="form-control @error ('ISBN') is-invalid @enderror" id="ISBN" required value="{{ old('ISBN') }}">
                            @error('ISBN')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" name="gambar" class="form-control" id="gambar">
                        </div>

                        <div class="mb-3">
							<label for="jumlah_buku" class="form-label">Jumlah Buku</label>
							<input type="number" min=0 name="jumlah_buku" class="form-control @error ('jumlah_buku') is-invalid @enderror" id="jumlah_buku" required value="{{ old('jumlah_buku') }}">
                            @error('jumlah_buku')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
                        </div>

                        <div class="mb-3">
							<label for="kolasi" class="form-label">Kolasi</label>
							<input type="text" name="kolasi" class="form-control @error ('kolasi') is-invalid @enderror" id="kolasi" required value="{{ old('kolasi') }}">
                            @error('kolasi')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
                        </div>

                        <div class="mb-3">
							<label for="no_class" class="form-label">No Class</label>
							<input type="text" name="no_class" class="form-control @error ('no_class') is-invalid @enderror" id="no_class" required value="{{ old('no_class') }}">
                            @error('no_class')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
                        </div>

						<button type="submit" class="btn btn-outline-primary">Tambah Buku</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
