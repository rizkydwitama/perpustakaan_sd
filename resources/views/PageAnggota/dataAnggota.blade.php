@extends('layout')
@section('content')
<div class="container-fluid">
	<div class="row g-0 justify-content-end">
		<div class="col-md-10" id="anggota-card">
			<div class="row justify-content-center">
				<div class="col-md-11" id="table-card">
					<h2>Data Anggota Perpustakaan</h2>
                    <form>
                        <div class="mb-3 searchButton">
                            <input type="text" class="form-control" id="search" name="search" placeholder="search...">
                            <button class="btn btn-secondary" type="submit" id="search" value="{{ request('search') }}"><i class="fa fa-search" aria-hidden="true"></i></button>
                            &nbsp;
                            <a href="{{ route('tambahAnggota') }}" class="btn btn-primary tombolTambah">Tambah</a>
                        </div>
                    </form>
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
								<td>
								<a href="editAnggota/{{ $anggota->id }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('hapusAnggota', $anggota->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
										Hapus 
									</button>
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Hapus Anggota Perpustakaan</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>
											<div class="modal-body">
												Apakah yakin ingin menghapus anggota ini?
											</div>
											<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
											<button type="submit" class="btn btn-danger">Ya</button>
											</div>
										</div>
										</div>
									</div>
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
