<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Riwayat Pemesanan</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: "Space Grotesk", sans-serif;
            color: var(--dark);
            background-image: url("{{ asset('image/10.png') }}");
        }

        .navbar {
            margin-top: 4px;
            margin-bottom: 4px;
        }

        .navbar-toggler {
            height: 30px;
        }

        .navbar-toggler-icon {
            height: 20px;
            width: 20px;
        }

        .btnL {
            padding: 7px 20px;
            color: #009CE1;
            background: var(--purple);
            border-color: #009CE1;
            border-radius: 5px;
            transition: 0.4s ease;
            text-decoration: none;
            text-align: center;
        }

        .btnL:hover {
            border-color: #009CE1;
            background: linear-gradient(to right, #406AD3, #009CE1);
            color: #fff;
        }

        .container {
            padding-top: 4px;
            padding-bottom: 4px;
        }

        .row {
            gap: 24px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
        }

        .card-title {
            font-weight: bold;
            color: #009CE1;
            font-size: 30px;
        }

        .card {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #fff;
            transition: transform 0.3s ease-in-out;
            margin-bottom: 24px;
            max-width: calc(40% - 24px); /* Adjust the width here */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-color: #fff;
            align-items: center;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 24px;
        }

        .card img {
            object-fit: cover;
            object-position: center;
            border-radius: 10px;
            width: 100%;
            height: 300px;
            margin-bottom: 20px;
        }

        .card-text {
            text-align: center;
            margin-bottom: 10px;
        }

        .btn-primary {
            display: block;
            padding: 10px;
            color: #f8f9fa;
            background: var(--purple);
            border-color: #009CE1;
            border-radius: 10px;
            transition: 0.5s ease;
            text-decoration: none;
            text-align: center;
            width: 100%;
            background: linear-gradient(to right, #406AD3, #009CE1);
        }

        .btn-primary:hover {
            color: #f8f9fa;
            border-color: #009CE1;
            background: linear-gradient(to right, #406AD3, #009CE1);
        }

        .footer {
            background-color: #f8f9fa;
            padding: 40px 0;
            margin-top: 20px;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .footer-section {
            flex: 1 1 20%;
            margin-left: 1px;
            margin-bottom: 20px;
        }

        .link-effect {
            text-decoration: none;
            position: relative;
            color: #000;
            transition: color 0.3s;
        }

        .link-effect::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 100%;
            background-color: #FF5733;
            height: 2px;
            transition: right 0.3s;
        }

        .link-effect:hover::after {
            right: 0;
        }

        .link-effect:active {
            color: #009CE1;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/admin/home">Laundry Bethelau | Layanan Laundry Terbaik</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <div class="container">
                <div class="row mt-3">
                    <div class="col">
                    </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li>
                    <a class="nav-link active" aria-current=" page" href="{{ url('/user/home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Laundry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pemesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Layanan</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-3">
        @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bsdismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (Session::get('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bsdismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row mt-4">
            <div class="col"></div>
            <div class="col-6">
                <form action="{{ route('user.riwayat') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="search" name="search" class="formcontrol rounded" placeholder="Cari Layanan"
                            aria-label="Search" aria-describedby="searchaddon" />
                        <button type="submit" class="btn btn-outlineprimary">search</button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
        <div class="row mt-5">
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="container mt-4">
        <div class="row mt-4">
            <table class="table table-striped table-bordered" style="border: #009CE1;">
                <thead style=" color: #009CE1;">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor Handphone</th>
                    <th scope="col">Jenis Layanan</th>
                  
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $pemesanan)
                <tr>
                    <td>{{ $pemesanan->id_user }}</td>
                    <td>{{ $pemesanan->nama }}</td>
                    <td>{{ $pemesanan->alamat }}</td>
                    <td>{{ $pemesanan->no_hp }}</td>
                    <td>{{ $pemesanan->jenis }}</td>
                
                    <td>{{ $pemesanan->total }}</td>
                    <td>
                        <span
                            class="{{ $pemesanan->status === 'Selesai' ? 'fw-semibold text-success' : 'fw-semibold text-danger'}}">
                            {{ $pemesanan->status }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><br> {{ $data->links() }}
    </div><br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>