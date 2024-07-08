<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Tambah Data</title>
    <style>
        body {
            background: linear-gradient(to right,  #406AD3, #009CE1);
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
            background: linear-gradient(to right,  #406AD3, #009CE1);
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
        <a href="{{ route('cabang.pemesanan') }}" class="btn btn-secondary mb-3">
            <i class="bi-arrow-left"></i> Kembali
        </a>


        <div class="container">
            <div class="container mt-3">
                @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (Session::get('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="card mt-4" style="width: 800px">
                        <div class="card-body">
                            <h5 class="card-title text-center">Edit Data</h5>
                            <form action="/postEditPemesanan/{{ $data->id }}" method="POST">
                                @csrf
                                <div class="form-group mt-4">
                                    <label class="text-secondary mb-2">nama</label>
                                    <input type="text" class="form-control" name="nama" required value="{{$data->nama }}">
                                    <span class="text-danger">
                                        @error('nama')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div><br>
                                <div class="form-group mt-4">
                                    <label class="text-secondary mb-2">id user</label>
                                    <input type="text" class="form-control" name="id_user" required value="{{$data->id_user }}">
                                    <span class="text-danger">
                                        @error('id_user')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div><br>
                                <div class="form-group mt-1">
                                    <label class="text-secondary mb-2">ID
                                        Pemesanan</label>
                                    <input type="text" class="form-control " name="id_laundry" required value="{{$data->id_laundry}}">
                                    <span class="text-danger">
                                        @error('id_laundry')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div><br>
                                <div class="form-group mt-1">
                                    <label class="text-secondary mb-2">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" required value="{{ $data->alamat }}">
                                    <span class="text-danger">
                                        @error('alamat')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div><br>
                                <div class="form-group mt-1">
                                    <label class="text-secondary mb-2">no hp</label>
                                    <input type="text" class="form-control " name="no_hp" required value="{{ $data->no_hp }}">
                                    <span class="text-danger">
                                        @error('no_hp')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div><br>
                                <div class="form-group mt-1">
                                    <label class="text-secondary mb-2">Jenis</label>
                                    <input type="text" class="form-control " name="jenis" required value="{{ $data->jenis}}">
                                    <span class="text-danger">
                                        @error('jenis')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div><br>
                                <div class="form-group mt-1">
                                    <label class="text-secondary mb-2">berat</label>
                                    <input type="text" class="form-control " name="berat" required value="{{ $data->berat }}">
                                    <span class="text-danger">
                                        @error('berat')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div><br>
                                <div class="form-group mt-1">
                                    <label class="text-secondary mb-2">Total</label>
                                    <input type="text" class="form-control " name="total" required value="{{ $data->total }}">
                                    <span class="text-danger">
                                        @error('total')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div><br>
                                <div class="form-group mt-1">
                                    <label class="text-secondary mb-2">Status layanan</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="Pending" @if ($data->status == 'Pending') checked @endif>
                                        <label class="form-check-label" for="inlineRadio1">Pending</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="Penjemputan" @if ($data->status == 'Penjemputan') checked @endif>
                                        <label class="form-check-label" for="inlineRadio2">Penjemputan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="Proses Laundry" @if ($data->status == 'Proses Laundry') checked @endif>
                                        <label class="form-check-label" for="inlineRadio3">Proses Laundry</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="Pengantaran" @if ($data->status == 'Pengantaran') checked @endif>
                                        <label class="form-check-label" for="inlineRadio4">Pengantaran</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="Selesai" @if ($data->status == 'Selesai') checked @endif>
                                        <label class="form-check-label" for="inlineRadio5s">Selesai</label>
                                    </div>
                                </div><br>
                                <div style="display: flex; justify-content: center; margin-top: 20px;">
                                <button type="submit" class="btn btn-success mt-5">Update Data Peminjaman</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><br><br><br><br>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        
</body>

</html>