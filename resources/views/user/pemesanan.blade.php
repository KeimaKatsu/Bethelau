<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrapicons@1.10.5/font/bootstrap-icons.css">
    <title>Tambah Layanan</title>
    <style>
    body {
        background: linear-gradient(to right, #406AD3, #009CE1);
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: "Space Grotesk", sans-serif;
        color: #1a1a1a;
    }

    .navbar {
        margin-top: auto;
    }

    .container {
        margin-top: 30px;
    }

    .card {
        width: 800px;
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        margin-bottom: 50px;
    }

    .card-title {
        color: #009CE1;
        margin-top: 40px;
        margin-bottom: 40px;
    }

    .form-group {
        margin-top: 1rem;
    }

    .form-control {
        border: 1px solid rgba(0, 0, 0, 0.02);
        border-radius: 15px;
        transition: border-color 0.3s ease;
        border-color: #009CE1;
    }

    .form-control:focus {
        border-color: #009CE1;
        outline: 5;
        box-shadow: 0 0 10px rgba(0, 156, 225, 0.5);
    }


    .btn {
        cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: linear-gradient(to right, #406AD3, #009CE1);
        border: 0;
        padding-left: 90px;
        padding-right: 90px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;

        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }

    .forgot {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        padding-top: 15px;
    }

    a {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        text-decoration: none;
    }

    .input-group {
        position: relative;
        border-radius: 30px;
        width: 100%;
    }

    .input-group .form-control {
        z-index: 1;
        position: relative;
    }

    .input-group .form-control:focus {
        z-index: 3;
    }

    .input-group .input-group-text {
        background-color: #009CE1;
        padding: 5px 20px;
        margin-bottom: 8px;
        color: #fff;
        cursor: pointer;
    }

    .input-group input[type="file"] {
        position: absolute;
        clip: rect(0, 0, 0, 0);
        pointer-events: none;
    }

    /* Custom styling for datepicker */
    .datepicker-dropdown {
        z-index: 1200 !important;
    }

    .datepicker .datepicker-days table.table-condensed td,
    .datepicker .datepicker-months table.table-condensed td,
    .datepicker .datepicker-years table.table-condensed td {
        padding: 5px;
    }

    /* CSS untuk elemen select */
    .form-select {

        border-radius: 15px;
        padding: 10px;
        background-color: #fff;
        color: #495057;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    /* CSS untuk option yang dipilih */
    .form-select:focus {
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgba(0, 156, 225, 0.25);
    }

    /* CSS untuk option */
    .form-select option {
        background-color: #fff;
        color: #495057;
    }

    /* CSS untuk dropdown saat dihover */
    .form-select:hover {
        border-color: #007BFF;
    }

    /* CSS untuk dropdown yang dibuka */
    .form-select:active,
    .form-select.open {

        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
    }

    /* Styling for the uploaded image */
    .mt-3 img {
        border: 4px solid #009CE1;
        margin-top: 10px;
    }

    @media (max-width: 600px) {
        .main {
            border-radius: 30px;
        }
    }
    </style>
</head>

<body>

    <div class="container mt-5">
        <a href="{{ route('user.home') }}" class="btn btn-secondary mb-3">
            <i class="bi-arrow-left"></i> Kembali
        </a>

        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (Session::has('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> {{ Session::get('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px">
                    <div class="card-body">

                        <h5 class="card-title text-center">Form Pemesanan</h5>
                        <form action="{{ route('postTambahPemesanan') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_user" class="form-label">Kode Laundry</label>
                                <input type="text" class="form-control" id="id_user" name="id_user" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_laundry" class="form-label">Kode Pemesanan</label>
                                <input type="text" class="form-control" id="id_laundry" name="id_laundry" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                            </div>


                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis Layanan</label>
                                <select class="form-select" id="jenis" name="jenis" required>
                                    <option value="Cuci Setrika 3 hari (Antar Jemput)" data-harga="8000">Cuci Setrika 3
                                        hari (Antar Jemput)</option>
                                    <option value="Cuci Setrika 3 hari" data-harga="6000">Cuci Setrika 3 hari</option>
                                    <option value="Cuci saja 3 hari (Antar Jemput)" data-harga="5000">Cuci saja 3 hari
                                        (Antar Jemput)</option>
                                    <option value="Cuci saja 3 hari" data-harga="3000">Cuci saja 3 hari</option>
                                    <option value="Setrika saja 3 hari (Antar Jemput)" data-harga="4000">Setrika saja 3
                                        hari (Antar Jemput)</option>
                                    <option value="Setrika saja 3 hari" data-harga="2000">Setrika saja 3 hari</option>
                                    <option value="Cuci Setrika 1 hari (Antar Jemput)" data-harga="17000">Cuci Setrika 1
                                        hari (Antar Jemput)</option>
                                    <option value="Cuci Setrika 1 hari" data-harga="15000">Cuci Setrika 1 hari</option>
                                    <option value="Cuci saja 1 hari (Antar Jemput)" data-harga="12000">Cuci saja 1 hari
                                        (Antar Jemput)</option>
                                    <option value="Cuci saja 1 hari" data-harga="10000">Cuci saja 1 hari</option>
                                    <option value="Setrika saja 1 hari (Antar Jemput)" data-harga="7000">Setrika saja 1
                                        hari (Antar Jemput)</option>
                                    <option value="Setrika saja 1 hari" data-harga="5000">Setrika saja 1 hari</option>
                                    <option value="Cuci Setrika (Kilat/ 3 jam)+(Antar Jemput)" data-harga="22000">Cuci
                                        Setrika (Kilat/ 3 jam)+(Antar Jemput)</option>
                                    <option value="Cuci Setrika (Kilat/ 3 jam)" data-harga="20000">Cuci Setrika (Kilat/
                                        3 jam)</option>
                                    <option value="Cuci saja (Kilat/ 3 jam)+(Antar Jemput)" data-harga="17000">Cuci saja
                                        (Kilat/ 3 jam)+(Antar Jemput)</option>
                                    <option value="Cuci saja (Kilat/ 3 jam)" data-harga="15000">Cuci saja (Kilat/ 3 jam)
                                    </option>
                                    <option value="Setrika saja (Kilat/ 3 jam )+(Antar Jemput)" data-harga="12000">
                                        Setrika saja (Kilat/ 3 jam )+(Antar Jemput)</option>
                                    <option value="Setrika saja (Kilat/ 3 jam )" data-harga="10000">Setrika saja (Kilat/
                                        3 jam )</option>

                                    <!-- Tambahkan lebih banyak opsi sesuai kebutuhan -->
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="berat" class="form-label">Berat (kg)</label>
                                <input type="berat" class="form-control" id="berat" name="berat" required>
                            </div>

                            <div class="mb-3">
                                <label for="total" class="form-label">Total</label>
                                <input type="text" class="form-control" id="total" name="total" readonly required>
                            </div>
                            <div style="display: flex; justify-content: center; margin-top: 20px;">
                                <button type="submit" class="btn">Submit</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <script>
            document.getElementById('jenis').addEventListener('change', function() {
                updateTotal();
            });

            document.getElementById('berat').addEventListener('input', function() {
                updateTotal();
            });

            function updateTotal() {
                // Ambil nilai jenis layanan yang dipilih
                var jenisLayanan = document.getElementById('jenis');
                var selectedOption = jenisLayanan.options[jenisLayanan.selectedIndex];
                var hargaPerKg = parseFloat(selectedOption.getAttribute('data-harga'));

                // Ambil nilai berat
                var berat = parseFloat(document.getElementById('berat').value) || 0;

                // Hitung total dan langsung perbarui input total
                document.getElementById('total').value = (hargaPerKg * berat).toFixed(2);
            }

            </script>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>