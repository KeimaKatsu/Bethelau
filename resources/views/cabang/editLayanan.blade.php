<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Edit Layanan</title>
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
            padding-left: 40px;
            padding-right: 40px;
            padding-bottom: 10px;
            padding-top: 10px;
            font-family: 'Ubuntu', sans-serif;
            margin-left: 35%;
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
        <a href="{{ route('cabang.laundry') }}" class="btn btn-secondary mb-3">
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

        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Edit Layanan</h5>
                <form action="{{ route('postEditLayanan', ['id' => $data->id]) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="jenis" class="form-label">id</label>
                        <input type="text" class="form-control" id="id_user" name="id_user" value="{{ $data->id_user }}" required>
                        @error('id_user')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Layanan</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $data->jenis }}" required>
                        @error('jenis')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="durasi" class="form-label">Durasi</label>
                        <input type="text" class="form-control" id="durasi" name="durasi" value="{{ $data->durasi }}" required>
                        @error('durasi')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ $data->harga }}" required>
                        @error('harga')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Update Data Layanan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>