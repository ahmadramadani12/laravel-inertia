<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tugas App</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: white;
            color: #202124;
        }

        /* Gaya navigasi utama di bagian atas halaman. */

        header {
            height: 75px;
            padding: 0 7%;

            display: flex;
            align-items: center;
            justify-content: space-between;

            background: white;
            border-bottom: 1px solid #eeeeee;
        }

        .logo {
            color: #5542df;
            font-size: 25px;
            font-weight: bold;
            text-decoration: none;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-login {
            display: inline-block;

            padding: 11px 24px;

            background: #5542df;
            color: white;

            text-decoration: none;

            border-radius: 8px;

            font-weight: bold;
        }

        .btn-login:hover {
            background: #4533c7;
        }

        .btn-register {
            display: inline-block;

            padding: 10px 21px;

            color: #5542df;
            background: white;

            border: 1px solid #5542df;

            text-decoration: none;

            border-radius: 8px;

            font-weight: bold;
        }

        .btn-register:hover {
            background: #f3f1ff;
        }

        /* Gaya bagian pengantar dan ajakan untuk memulai. */

        .hero {
            min-height: 570px;

            padding: 70px 7%;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 50px;

            background: linear-gradient(
                180deg,
                #ffffff,
                #f8f7ff
            );
        }

        .hero-left {
            width: 55%;
        }

        .hero-title {
            font-size: 50px;
            line-height: 1.15;

            margin-bottom: 20px;
        }

        .hero-title span {
            color: #5542df;
        }

        .hero-description {
            max-width: 600px;

            color: #6b7280;

            font-size: 18px;
            line-height: 1.7;

            margin-bottom: 30px;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .btn-start {
            display: inline-block;

            padding: 14px 25px;

            background: #5542df;
            color: white;

            text-decoration: none;

            border-radius: 8px;

            font-weight: bold;
        }

        .btn-start:hover {
            background: #4533c7;
        }

        .btn-learn {
            color: #5542df;

            text-decoration: none;

            padding: 14px 20px;

            font-weight: bold;
        }

        /* Susun ilustrasi layar secara dekoratif dengan elemen CSS. */

        .hero-right {
            width: 42%;

            display: flex;
            justify-content: center;
        }

        .illustration {
            width: 390px;
            height: 320px;

            position: relative;
        }

        .screen {
            width: 310px;
            height: 210px;

            position: absolute;

            top: 25px;
            left: 40px;

            background: white;

            border: 10px solid #5542df;

            border-radius: 18px;

            box-shadow:
                0 20px 40px rgba(85, 66, 223, 0.15);
        }

        .screen-top {
            height: 35px;

            background: #f0efff;

            border-radius: 7px 7px 0 0;
        }

        .screen-content {
            padding: 20px;
        }

        .line {
            height: 10px;

            background: #e5e7eb;

            border-radius: 5px;

            margin-bottom: 14px;
        }

        .line.short {
            width: 60%;
        }

        .card-small {
            width: 80px;
            height: 55px;

            background: #5542df;

            border-radius: 8px;

            margin-top: 20px;
        }

        .circle {
            width: 65px;
            height: 65px;

            position: absolute;

            right: 5px;
            bottom: 30px;

            background: #5542df;

            border-radius: 50%;
        }

        .square {
            width: 55px;
            height: 55px;

            position: absolute;

            left: 0;
            bottom: 35px;

            background: #e9e7ff;

            border-radius: 10px;
        }

        /* Tata tiga langkah penggunaan aplikasi. */

        .how {
            padding: 80px 7%;

            text-align: center;

            background: white;
        }

        .how-title {
            font-size: 34px;

            margin-bottom: 12px;
        }

        .how-subtitle {
            color: #777;

            margin-bottom: 45px;
        }

        .steps {
            max-width: 1050px;

            margin: auto;

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 25px;
        }

        .step {
            padding: 30px;

            background: #f8f7ff;

            border: 1px solid #eeeeff;

            border-radius: 14px;

            text-align: left;
        }

        .step-number {
            width: 45px;
            height: 45px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #5542df;
            color: white;

            border-radius: 50%;

            font-weight: bold;

            margin-bottom: 18px;
        }

        .step h3 {
            margin-bottom: 10px;
        }

        .step p {
            color: #6b7280;

            line-height: 1.6;
        }

        /* Gaya area informasi penutup halaman. */

        footer {
            padding: 25px;

            background: #f8f7ff;

            text-align: center;

            color: #777;

            font-size: 14px;
        }

        /* Susun ulang bagian pengantar dan langkah pada layar kecil. */

        @media (max-width: 850px) {

            .hero {
                flex-direction: column;

                text-align: center;
            }

            .hero-left,
            .hero-right {
                width: 100%;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-title {
                font-size: 40px;
            }

            .steps {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    {{-- Bagian navigasi menyediakan tautan kembali, masuk, dan daftar. --}}

    <header>

        <a href="{{ route('landing') }}" class="logo">
            Tugas App
        </a>

        <nav class="nav">

            {{-- Arahkan pengunjung ke formulir masuk. --}}

            <a href="{{ route('login') }}" class="btn-login">
                Masuk
            </a>

            {{-- Arahkan pengunjung ke formulir pendaftaran. --}}

            <a href="{{ route('register') }}" class="btn-register">
                Daftar
            </a>

        </nav>

    </header>


    {{-- Bagian pengantar menjelaskan aplikasi dan menyediakan aksi awal. --}}

    <section class="hero">

        <div class="hero-left">

            <h1 class="hero-title">
                Selamat Datang di
                <span>Aplikasi Tugas</span>
            </h1>

            <p class="hero-description">
                Aplikasi sederhana untuk membantu kamu
                mengelola dan menyimpan tugas dengan lebih
                mudah, cepat, dan terorganisir.
            </p>

            <div class="hero-buttons">

                {{-- Tombol utama memulai alur autentikasi pengguna. --}}

                <a
                    href="{{ route('login') }}"
                    class="btn-start"
                >
                    Mulai Sekarang →
                </a>

                <a
                    href="#cara-pakai"
                    class="btn-learn"
                >
                    Pelajari
                </a>

            </div>

        </div>


        {{-- Ilustrasi dekoratif dibangun dari bentuk CSS tanpa gambar tambahan. --}}

        <div class="hero-right">

            <div class="illustration">

                <div class="screen">

                    <div class="screen-top"></div>

                    <div class="screen-content">

                        <div class="line"></div>

                        <div class="line short"></div>

                        <div class="card-small"></div>

                    </div>

                </div>

                <div class="circle"></div>

                <div class="square"></div>

            </div>

        </div>

    </section>


    {{-- Langkah ringkas menjelaskan alur dasar penggunaan aplikasi. --}}

    <section
        class="how"
        id="cara-pakai"
    >

        <h2 class="how-title">
            Tata Cara Penggunaan
        </h2>

        <p class="how-subtitle">
            Ikuti langkah sederhana berikut untuk menggunakan aplikasi.
        </p>

        <div class="steps">

            <div class="step">

                <div class="step-number">
                    1
                </div>

                <h3>
                    Login atau Daftar
                </h3>

                <p>
                    Klik tombol Masuk untuk login menggunakan
                    akun kamu. Jika belum mempunyai akun,
                    pilih menu Daftar.
                </p>

            </div>


            <div class="step">

                <div class="step-number">
                    2
                </div>

                <h3>
                    Kelola Postingan
                </h3>

                <p>
                    Setelah berhasil login, kamu dapat melihat
                    daftar postingan dan menambahkan tugas baru.
                </p>

            </div>


            <div class="step">

                <div class="step-number">
                    3
                </div>

                <h3>
                    Logout
                </h3>

                <p>
                    Setelah selesai, klik Logout untuk kembali
                    ke halaman utama.
                </p>

            </div>

        </div>

    </section>


    {{-- Tahun hak cipta diperbarui secara otomatis oleh Blade. --}}

    <footer>

        © {{ date('Y') }} Tugas App.
        Semua hak dilindungi.

    </footer>

</body>
</html>