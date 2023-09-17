<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <!-- Tambahkan link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
@auth <!-- Memeriksa apakah pengguna telah login -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">Dashboard</a>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <!-- Sidebar content -->
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('transactions.index') }}">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="transaksiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Data Transaksi
                            </a>
                            <div class="dropdown-menu" aria-labelledby="transaksiDropdown">
                                <a class="dropdown-item" href="{{ route('transactions.create') }}">Tambah Data Transaksi</a>
                            </div>
                        </li>
                        <!-- Tambahkan menu lainnya sesuai kebutuhan -->
                    </ul>
                </div>
            </nav>

            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </div>
        </div>
    </div>
    @endauth

    @guest <!-- Jika pengguna belum login -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Tampilkan tampilan login di sini -->
                @yield('content')
            </div>
        </div>
    </div>
    @endguest

    <!-- Tambahkan link ke Bootstrap JS (optional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
