<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
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
            max-width: calc(40% - 24px);
            /* Adjust the width here */
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
            background-color: #009CE1;
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
    <title>Homepage</title>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container" style="margin-top: auto">
            <img src="{{ asset('image/logo1.png') }}" width="38" height="36" class="d-inline-block align-text-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" style="margin-top: 5px">
                    <li class="nav-item">
                        <a class="nav-link active fw-semibold" href="{{ url('/cabang/home') }}"
                            style="color: #060355; margin-right: 10px;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('cabang.laundry') }}"
                            style="color: #060355; margin-right: 10px;">Laundry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cabang.pemesanan') }}"
                            style="color: #060355; margin-right: 10px;">Pemesanan</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" style=" text-decoration: none">
                            <p class="btnL fw-bold">Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li>
                <a class="nav-link active" aria-current=" page" href="{{ url('/cabang/home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cabang.laundry') }}">Laundry</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cabang.pemesanan') }}">Pemesanan</a>
            </li>

        </ul>
    </div>
    </nav>

    <section class="features" style="margin-top: 80px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" style="color: #060355;">
                    <div class="feature-item">
                        <i class="fa fa-cogs"></i>
                        <h1 style="font-weight: 600; font-size: 4em; margin: 3px;">Ruang Admin</h1>
                        <h1 style="font-weight: 600; font-size: 4em; color:#009CE1;">Bethelau .</h1>
                    </div>
                </div>

                <div class="container user-container">
                    <div class="row mt-3">
                        <div class="col">
                            <h4 class="text-secondary">Selamat Datang {{Auth::user()->name}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <a href="http://polbeng.ac.id/" target="_blank">
                        <img src="{{ asset('image/logo1.png') }}" width="50" height="50"
                            class="d-inline-block align-text-top" alt="Logo" style="margin-bottom: 60px; margin-top: 40px">
                    </a>
                </div>
                <div class="footer-section">
                    <h5>Politeknik Negeri Bengkalis</h5>
                    <p class="p2">
                        <a href="https://polbeng.siakadcloud.com/gate/login" class="text-secondary link-effect"
                            target="_blank">Siakad Politeknik Negeri Bengkalis</a>
                        <br>
                        <a href="https://www.instagram.com/polbengofficial/" class="text-secondary link-effect"
                            target="_blank">Instagramnya Polbeng</a><br>
                        <a href="https://www.youtube.com/@PolbengOfficial" class="text-secondary link-effect"
                            target="_blank">Nonton YouTube</a>
                    </p>
                </div>
                <div class="footer-section">
                    <h5>Jurusan & Prodi Polbeng</h5>
                    <p class="p2">
                        <a href="https://ti.polbeng.ac.id/prodi/profil/RPL.html" class="text-secondary link-effect"
                            target="_blank">Jurusan Teknik Informatika</a>
                        <br>
                        <a href="http://www.polbeng.ac.id/official/jurusan-teknik-informatika"
                            class="text-secondary link-effect" target="_blank">Prodi Rekayasa Perangkat Lunak</a>
                    </p>
                </div>
                <div class="footer-section">
                    <h5>Media Promosi</h5>
                    <p class="p2">
                        <a href="https://www.instagram.com/rpl.polbeng/" class="text-secondary link-effect"
                            target="_blank">Rpl Angkatan 21</a>
                        <br>
                        <a href="https://www.instagram.com/rpla.agense/" class="text-secondary link-effect"
                            target="_blank">Agense</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
