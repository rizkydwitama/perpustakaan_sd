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
					<form action="#" method="#" enctype="multipart/form-data">
						@csrf
                        <div class="mb-3">
							<label for="judul_buku" class="form-label">Judul Buku</label>
							<input type="text" name="judul_buku" class="form-control" id="judul_buku">
						</div>

						<div class="mb-3">
							<label for="nama_pengarang" class="form-label">Nama Pengarang</label>
							<input type="text" name="nama_pengarang" class="form-control" id="nama_pengarang">
						</div>

						<div class="mb-3">
							<label for="impresium" class="form-label">Impresium</label>
							<input type="text" name="impresium" class="form-control" id="impresium">
						</div>

                        <div class="mb-3">
							<label for="isbn" class="form-label">ISBN</label>
							<input type="text" name="isbn" class="form-control" id="isbn">
						</div>

						<form>
                            <div class="form-group">
                              <label for="exampleFormControlFile1">Sampul Buku</label>
                              <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                          </form>

                        <div class="mb-3">
							<label for="jumlah_buku" class="form-label">Jumlah Buku</label>
							<input type="number" name="jumlah_buku" class="form-control" id="jumlah_buku">
						</div>

                        <div class="mb-3">
							<label for="kolasi" class="form-label">Kolasi</label>
							<input type="text" name="kolasi" class="form-control" id="kolasi">
						</div>

                        <div class="mb-3">
							<label for="nomor_class" class="form-label">Nomor Class</label>
							<input type="text" name="nomor_class" class="form-control" id="nomor_class">
						</div>

						<button type="submit" class="btn btn-outline-primary">Edit Buku</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
