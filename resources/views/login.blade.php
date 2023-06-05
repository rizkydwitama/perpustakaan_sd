<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/logo_sd_darul_hikam.png')}}">

    <title>Halaman Masuk | Perpustakaan SD 1 Darul Hikam</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/signin.css')}}" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post" action="/login">      
      @csrf
      <img class="mb-4" src="{{asset('img/logo_sd_darul_hikam.png')}}" alt="" width="125" height="125">      
      <h1 class="h3 mb-3 font-weight-normal">Selamat Datang!</h1>
      @if (session()->has('success'))
				<div class="alert alert-success" role="alert">
					{{ session('success') }}
				</div>	
			@endif

      @if (session()->has('loginError'))
				<div class="alert alert-danger" role="alert">
					{{ session('loginError') }}
				</div>	
			@endif
      <label for="inputUsername" class="sr-only">Nama Pengguna</label>
      <input type="text" id="inputUsername" name="nama" class="form-control @error ('nama') is-invalid @enderror" placeholder="Nama Pengguna" autofocus required>
      <label for="inputPassword" class="sr-only">Kata Sandi</label>
      <input type="password" id="inputPassword" name="password" class="form-control @error ('password') is-invalid @enderror" placeholder="Kata Sandi" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Ingat saya
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
      <p class="mt-5 mb-3 text-muted">&copy;2023 Universitas Telkom </p>
    </form>
  </body>
</html>
