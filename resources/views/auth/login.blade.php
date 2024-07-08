<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Login</title>
    <style>
        body {
            background: linear-gradient(to right,  #406AD3, #009CE1);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: "Space Grotesk", sans-serif;
            color: #1a1a1a;
        }
        .card {
            width: 800px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            margin-bottom: 60px;
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
    border-color: #009CE1;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #009CE1;
    outline: 5;
    box-shadow: 0 0 10px rgba(0, 156, 225, 0.5);
}


        .btn {
            cursor: pointer;
            border-radius: 1em;
            color: #fff;
            background: linear-gradient(to right,  #406AD3, #009CE1);
            border: 0;
            padding-left: 50px;
            padding-right: 50px;
            padding-bottom: 10px;
            padding-top: 10px;
            font-family: 'Ubuntu', sans-serif;
            font-size: 13px;
            box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
            margin-bottom: 10px;
            font-weight: bold;
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
        .btnk {
            cursor: pointer;
            border-radius: 1em;
            color: #fff;
            background: linear-gradient(to right,  #406AD3, #009CE1);
            border: 0;
            padding-left: 50px;
            padding-right: 50px;
            padding-bottom: 10px;
            padding-top: 10px;
            font-family: 'Ubuntu', sans-serif;
            font-size: 13px;
            box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
            font-weight: bold;
        }

    </style>
</head>

<body>
<div class="container mt-5">
        <a href="/" class="btnk btn-secondary mb-3">
            <i class="bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="container mt-3">
        @if (Session::get('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Gagal!</strong> {{ Session::get('failed') 
}}
            <button type="button" class="btn-close" data-bs dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    <div class="container d-flex justify-content-center align-items-center" style="margin-top: 60px">
        <div class="card" style="width: 35%">
            <div class="card-body p-4">
                <h3 class="card-title text-center">Login</h3>
                <form action="{{ route('postLogin') }}" method="POST">
                    @csrf
                    <div class="form-group mt-4">
                        <label class="text-secondary">Email Anda</label>
                        <input type="email" class="form-control" name="email"
                            required value="{{ old('email') }}"> <span class="text-danger">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-1">
                        <label class="text-secondary">Password Anda</label>
                        <input type="password" class="form-control"
                            name="password">
                        <span class="text-danger">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="form-control btn btn-primary mt-3">Login</button>
                </form>
                <p class="mt-2 text-center">Belum punya akun?
                    <a href="{{ route('auth.register') }}" style="text-decoration: none">Ayo buat akun!</a>
                </p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>