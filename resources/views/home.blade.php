<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('img/landing/jj.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/landing/10.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <style>
        body {
            background-image: url("{{ asset('image/10.png') }}"); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #060355;
        }
        .navbar{
            padding: 10px 20px;
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
    color: #009CE1; /* Ubah warna teks ketika ditekan */
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


        
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container" style="margin-top: auto">
            <a href="http://polbeng.ac.id/" target="_blank">
                <img src="{{ asset('image/logo1.png') }}" width="38" height="38" class="d-inline-block align-text-top" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="margin-right: 50px;">
                <ul class="navbar-nav ms-auto">
                <style>
    .nav-container {
        margin-right: 10PX;
        list-style: none;
        display: flex;
        justify-content: center; /* Membuat tautan tetap di tengah */
        gap: 20px; /* Jarak antara tautan */
        padding: 0;
    }

    .nav-item {
        margin: 0;
    }

    .nav-link {
        text-decoration: none;
        color: #060355;
    }
</style>
                <ul class="nav-container">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hubungi Kami</a>
                    </li>
                   
                </ul>
                    <style>
        .btn1 {
            display: inline-block;
            margin-top: 5px;
            margin-left: 8px;
            padding: 5px 20px;
            text-decoration: none;
            color: #FFFFFF; /* Warna teks */
            border-radius: 8px;
            background-color: #009CE1; /* Warna latar belakang */
            position: relative;
            transition: transform 1s, color 0.5s, background-color 0.5s; /* Menambahkan transisi untuk menghaluskan gerakan dan perubahan warna */
            font-weight: bold;
          }

        .btn1:hover {
            background-color: #009CE1; /* Warna latar belakang saat dihover */
            color: #FFFFFF; /* Warna teks saat dihover */
            border: 1px solid #009CE1;
            animation: gerakanAtas 0.5s forwards;
        }

        .btn1:active {
            animation: kembali 0.5s forwards;
        }

        @keyframes gerakanAtas {
            0% { transform: translateY(0); }
            100% { transform: translateY(-5px); }
        }

        @keyframes kembali {
            0% { transform: translateY(-5px); }
            100% { transform: translateY(0); }
        }
    </style>
<!-- Kemudian, terapkan pada tautan "Login" -->
<li class="nav-item">
    <a class="btn1" href="{{ route('auth.login') }}">Login</a>
</li>
<style>
        .btn3 {
            display: inline-block;
            margin-top: 5px;
            margin-left: 5px;
            padding: 5px 10px;
            text-decoration: none;
            color: #009CE1; /* Warna teks */
            border: 1px solid #009CE1; /* Warna border */
            border-radius: 8px;
            background-color: light; /* Warna latar belakang */
            position: relative;
            transition: transform 1s, color 0.5s, background-color 0.5s;
            font-weight: bold; /* Menambahkan transisi untuk menghaluskan gerakan dan perubahan warna */
        }

        .btn3:hover {
            background-color: #008ACD; /* Warna latar belakang saat dihover */
            color: #FFFFFF; /* Warna teks saat dihover */
            border: 1px solid #009CE1;
            animation: gerakanAtas 0.5s forwards;
        }

        .btn3:active {
            animation: kembali 0.5s forwards;
        }

        @keyframes gerakanAtas {
            0% { transform: translateY(0); }
            100% { transform: translateY(-5px); }
        }

        @keyframes kembali {
            0% { transform: translateY(-5px); }
            100% { transform: translateY(0); }
        }
    </style>

                    <li class="nav-item">
                        <a class="btn3" href="{{ route('auth.register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="features" style="margin-top: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" style="color: #060355;">
                    <div class="feature-item">
                        <i class="fa fa-cogs"></i>
                        <h1 style="font-weight: 600; font-size: 4em; margin: 3px;">Solution for your</h1>
                        <h1 style="font-weight: 600; font-size: 4em; color:#009CE1;">Bethelau .</h1>
                        <p>Bengkalis the laundry, Hadirkan kemudahan dalam <br>menggunakan jasa pelayanan laundry <a href="https://www.instagram.com/sfnsoo/" style="color:#060355; text-decoration: none;">@sfnsoo</a></p>
                        <a href="{{ route('auth.login') }}" class="btn text-light shadow-lg-warning" style="background-color: #009CE1; position: relative; margin-right: 5px;" target="_blank" onmouseover="gerakkanAtas(this)" onmouseout="kembali(this)">
    Pesan Sekarang
</a>

<style>
    @keyframes gerakanAtas {
        0% { transform: translateY(0); }
        100% { transform: translateY(-5px); }
    }

    @keyframes kembali {
        0% { transform: translateY(-5px); }
        100% { transform: translateY(0); }
    }

    .btn {
        transition: transform 1s; /* Menambahkan transisi untuk menghaluskan gerakan */
        border-radius: 10px; /* Melengkungkan sudut tombol */
        padding: 10px 20px;
        
    }
</style>

<script>
    function gerakkanAtas(element) {
        element.style.animation = 'gerakanAtas 0.5s forwards';
    }

    function kembali(element) {
        element.style.animation = 'kembali 0.5s forwards';
    }
</script>

<a href="https://wa.me/081250329327" class="btn2" target="_blank">
    Hubungi Kami
</a>
<style>
        .btn2 {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: #060355; /* Warna teks */
            border: 1px solid #060355; /* Warna border */
            border-radius: 10px;
            background-color: light; /* Warna latar belakang */
            position: relative;
            transition: transform 1s, color 0.5s, background-color 0.5s; /* Menambahkan transisi untuk menghaluskan gerakan dan perubahan warna */
        }

        .btn2:hover {
            background-color: #008ACD; /* Warna latar belakang saat dihover */
            color: #FFFFFF; /* Warna teks saat dihover */
            border: 1px solid #009CE1;
            animation: gerakanAtas 0.5s forwards;
        }

        .btn2:active {
            animation: kembali 0.5s forwards;
        }

        @keyframes gerakanAtas {
            0% { transform: translateY(0); }
            100% { transform: translateY(-5px); }
        }

        @keyframes kembali {
            0% { transform: translateY(-5px); }
            100% { transform: translateY(0); }
        }
    </style>




                    </div>
                </div>
                <div class="col-lg-5 text-center ms-auto" style="margin-left: 10px;">
    <img src="{{ asset('image/icon6.png') }}" width="400" height="400" class="img-fluid d-inline-block align-text-top moving-image">
</div>
<style>
    @keyframes moveHorizontal {
        0% {
            transform: translateX(0);
        }
        50% {
            transform: translateX(20px); /* Sesuaikan dengan seberapa jauh ingin bergerak */
        }
        100% {
            transform: translateX(0);
        }
    }

    .moving-image {
        animation: moveHorizontal 2s linear infinite;
    }
</style>

            </div>
        </div>
        
        <style>
    section {
      margin-top: auto;
    }

    img {
      max-width: 100%;
      height: auto;
      display: block;
      margin: 0 auto;
    }
  </style>

  <section>
    <img src="{{ asset('image/9.png') }}" alt="Responsive Image" class="img-fluid">
  </section>

    <style>
    article {
  --img-scale: 1.001;
  --title-color: #060355;
  --link-icon-translate: -20px;
  --link-icon-opacity: 0;
  position: relative;
  border-radius: 16px;
  box-shadow: none;
  background: #fff;
  transform-origin: center;
  transition: all 0.4s ease-in-out;
  overflow: hidden;
  margin-bottom: 30px;
  
}

article a::after {
  position: absolute;
  inset-block: 0;
  inset-inline: 0;
  cursor: pointer;
  content: "";
}

/* basic article elements styling */
article h2 {
  margin: 0 0 18px 0;
  font-family: "Bebas Neue", cursive;
  font-size: 1.9rem;
  letter-spacing: 0.06em;
  color: var(--title-color);
  transition: color 0.3s ease-out;
}

figure {
  margin: 0;
  padding: 0;
  aspect-ratio: 16 / 9;
  overflow: hidden;
}

article img {
  max-width: 100%;
  transform-origin: center;
  transform: scale(var(--img-scale));
  transition: transform 0.4s ease-in-out;
}

.article-body {
  padding: 10px;
  font-family:'Franklin Gothic reguler', 'Arial Narrow', Arial, sans-serif;
}

article a {
  display: inline-flex;
  align-items: center;
  text-decoration: none;
  color: #28666e;
}

article a:focus {
  outline: 1px dotted #28666e;
}

article a .icon {
  min-width: 24px;
  width: 24px;
  height: 24px;
  margin-left: 5px;
  transform: translateX(var(--link-icon-translate));
  opacity: var(--link-icon-opacity);
  transition: all 0.3s;
}

/* using the has() relational pseudo selector to update our custom properties */
article:has(:hover, :focus) {
  --img-scale: 1.1;
  --title-color: #009CE1;
  --link-icon-translate: 0;
  --link-icon-opacity: 1;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
}


/************************ 
Generic layout (demo looks)
**************************/

*,
*::before,
*::after {
  box-sizing: border-box;
}


.articles {
  display: grid;
  max-width: 1200px;
  margin-inline: auto;
  padding-inline: 24px;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 24px;
}

@media screen and (max-width: 960px) {
  article {
    container: card/inline-size;
  }
  .article-body p {
    display: none;
  }
}

@container card (min-width: 380px) {
  .article-wrapper {
    display: grid;
    grid-template-columns: 100px 1fr;
    gap: 16px;
  }
  .article-body {
    padding-left: 0;
  }
  figure {
    width: 100%;
    height: 100%;
    overflow: hidden;
  }
  figure img {
    height: 100%;
    aspect-ratio: 1;
    object-fit: cover;
  }
}

.sr-only:not(:focus):not(:active) {
  clip: rect(0 0 0 0); 
  clip-path: inset(50%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap; 
  width: 1px;
}
</style>
    <section class="articles">
  <article>
    <div class="article-wrapper">
      <figure>
        <img src="{{ asset('image/opi.jpg') }}" alt="" />
      </figure>
      <div class="article-body">
        <h2 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Ini Laundry</h2>
        <p>
        Aplikasi laundry di Bengkalis merupakan solusi digital canggih yang dikembangkan khusus untuk memudahkan pengelolaan usaha laundry di wilayah bengkalis.
        </p>
        <a href="{{ route('auth.login') }}" class="btn-primary"
                            style="text-decoration: none; margin-top: 10px; border-color:#009CE1;">Pesan</a>
                    </div>
                </div>
</button>

      </div>
    </div>
  </article>
  <article>

    <div class="article-wrapper">
      <figure>
        <img src="{{ asset('image/opo.jpg') }}" alt="" />
      </figure>
      <div class="article-body">
        <h2 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Suka laundry</h2>
        <p>
        Aplikasi laundry di Bengkalis merupakan solusi digital canggih yang dikembangkan khusus untuk memudahkan pengelolaan usaha laundry di wilayah bengkalis.
        </p>
        <a href="{{ route('auth.login') }}" class="btn-primary"
                            style="text-decoration: none; margin-top: 10px; border-color:#009CE1;">Pesan</a>
                    </div>
                </div>
</button>
      </div>
    </div>
  </article>
  <article>

    <div class="article-wrapper">
      <figure>
        <img src="{{ asset('image/opu.jpg') }}" alt="" />
      </figure>
      <div class="article-body">
        <h2 style="font-family:'Franklin Gothic', 'Arial Narrow', Arial, sans-serif">Tuah Laundry</h2>
        <p>
        Aplikasi laundry di Bengkalis merupakan solusi digital canggih yang dikembangkan khusus untuk memudahkan pengelolaan usaha laundry di wilayah bengkalis.
        </p>
        <a href="{{ route('auth.login') }}"class="btn-primary"
                            style="text-decoration: none; margin-top: 10px; border-color:#009CE1;">Pesan</a>
                    </div>
                </div>
</button>
      </div>
    </div>
  </article>
</section>
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <a href="http://polbeng.ac.id/" target="_blank">
                    <img src="{{ asset('image/logo1.png') }}" width="50" height="50" class="d-inline-block align-text-top" alt="Logo" style="margin-bottom: 60px; margin-top: 40px">
                </a>
            </div>
            <div class="footer-section">
                <h5>Politeknik Negeri Bengkalis</h5>
                <p class="p2">
                    <a href="https://polbeng.siakadcloud.com/gate/login" class="text-secondary link-effect" target="_blank">Siakad Politeknik Negeri Bengkalis</a>
                    <br>
                    <a href="https://www.instagram.com/polbengofficial/" class="text-secondary link-effect" target="_blank">Instagramnya Polbeng</a><br>
                    <a href="https://www.youtube.com/@PolbengOfficial" class="text-secondary link-effect" target="_blank">Nonton YouTube</a>
                </p>
            </div>
            <div class="footer-section">
                <h5>Jurusan & Prodi Polbeng</h5>
                <p class="p2">
                    <a href="https://ti.polbeng.ac.id/prodi/profil/RPL.html" class="text-secondary link-effect" target="_blank">Jurusan Teknik Informatika</a>
                    <br>
                    <a href="http://www.polbeng.ac.id/official/jurusan-teknik-informatika" class="text-secondary link-effect" target="_blank">Prodi Rekayasa Perangkat Lunak</a>
                </p>
            </div>
            <div class="footer-section">
                <h5>Media Promosi</h5>
                <p class="p2">
                    <a href="https://www.instagram.com/rpl.polbeng/" class="text-secondary link-effect" target="_blank">Rpl Angkatan 21</a>
                    <br>
                    <a href="https://www.instagram.com/rpla.agense/" class="text-secondary link-effect" target="_blank">Agense</a>
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