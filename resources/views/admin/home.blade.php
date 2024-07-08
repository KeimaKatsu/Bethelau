<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Homepage Admin</title>
    <style>
        body {
            font-family: "Space Grotesk", sans-serif;
            color: var(--dark);
            background-image: url("{{ asset('image/10.png') }}");
        }

        h3 {
            font-size: 1.5em;
            font-weight: 700;
            color: #009CE1;
        }

        p {
            font-size: 1em;
            line-height: 1.7;
            font-weight: 300;
            color: var(--text-gray);
            word-spacing: 0em;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.7);
        }

        .table {
            border-radius: 10px;
            border-color: linear-gradient(to right, #406AD3, #009CE1);
        }

        .container {
            padding-top: 4px;
            padding-bottom: 4px;
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
            background: #009CE1;
            color: #fff;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 40px 0;
        }

        .footer-content {
            display: flex;
            margin-top: 30px;
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

        h5 {
            color: #009CE1;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container" style="margin-top: auto">
            <img src="{{ asset('image/logo1.png') }}" width="38" height="38" class="d-inline-block align-text-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" style="margin-top: 5px">
                    <li class="nav-item">
                        <a class="nav-link active fw-semibold" href="{{ route('admin.home') }}"
                            style="color: #060355;">Admin</a>
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
                <div class="col">
                <form action="{{ route('admin.home') }}" method="GET" class="input-group">
                    @csrf
                    <input type="search" name="search" class="form-control me-2" placeholder="Cari Nama Admin..."
                        aria-label="Search" aria-describedby="search-addon" />
                    <button type="submit" class="btn">
                        <img src="{{ asset('image/cari.png') }}" alt="Search Icon" width="30" height="30">
                    </button>
                </form>
            </div>
        </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h4 class="text-secondary">Selamat Datang {{Auth::user()->name}}</h4>
            </div>
            
        <div id="fixedButton" class="col-1 ms-auto" style="margin-top: 20px;">
            <a class="btn text-light" href="{{ route('admin.tambah') }}">
                <img src="{{ asset('image/tambah.png') }}" alt="Tambah Data Icon" width="60" height="60">
            </a>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row mt-4">
            <table class="table table-striped table-bordered" style="border: #009CE1;">
                <thead style=" color: #009CE1;">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">id</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">level</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table" style="border-color: #009CE1;">
                    @foreach ($data as $index => $user)
                    <tr>
                        <td>{{ $index + $data->firstItem() }}</td>
                        <td>{{ $user->id }}</td>
                        <td scope="row">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->level }}</td>
                        <td class="d-flex align-items-center" >
                            <a class="btn3 " href="/editAdmin/{{ $user->id }}">
                                <img src="{{ asset('image/edit.png') }}" alt="Edit Icon" style="width: 35px; height: 35px;">
                            </a>
                            <a class="btn3 " href="/deleteAdmin/{{ $user->id }}">
                                <img src="{{ asset('image/hapus.png') }}" alt="Delete Icon"
                                    style="width: 35px; height: 35px;">
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
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
