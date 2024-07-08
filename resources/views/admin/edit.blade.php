<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Edit Data</title>
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
        <a href="{{ route('admin.home') }}" class="btn btn-secondary mb-3">
            <i class="bi-arrow-left"></i> Kembali
        </a>
        <div class="container mt-3">
            @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ Session::get('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px">
                    <div class="card-body">
                        <h5 class="card-title text-center">Edit Data</h5>

                        <form action="{{ route('postEditAdmin', ['id' => $data->id]) }}" method="POST">
                            @csrf
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nama Admin</label>
                                <input type="text" class="form-control" name="name" required value="{{ $data->name }}">
                                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Email Admin</label>
                                <input type="email" class="form-control" name="email" required value="{{ $data->email }}">
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary">Pilih level</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level" value="admin" @if ($data->level == 'admin') checked @endif>
                                    <label class="form-check-label" for="inlineRadio1">Admin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level" value="cabang" @if ($data->level == 'cabang') checked @endif>
                                    <label class="form-check-label" for="inlineRadio2">Cabang</label>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: center; margin-top: 20px;">
                            <button type="submit" class="btn btn-success mt-5">Edit Data Admin</button>
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