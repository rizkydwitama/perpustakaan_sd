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
                            @foreach ($anggotas as $anggota)
							<tr>
								<th scope="row">{{ $anggota->id }}</th>
								<td>{{ $anggota->nama_anggota }}</td>
								<td>{{ $anggota->nomor_induk_anggota }}</td>
								<td>{{ $anggota->kelas}}</td>
								<td>{{ $anggota->jumlah_pinjam}}</td>
								<td>{{ $anggota->jenis_kelamin}}</td>
								<td>
								<a href="editAnggota/{{ $anggota->id }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('hapusAnggota', $anggota->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                                </td>

							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
