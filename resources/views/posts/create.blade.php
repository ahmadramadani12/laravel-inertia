
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Post</title>

    <style>
        /* Gaya kartu formulir, kontrol masukan, tombol, dan pesan validasi. */
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 30px 15px;
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            color: #333;
        }

        .card {
            max-width: 650px;
            margin: 30px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 18px #00000010;
        }

        h1 { margin-top: 0; }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, textarea {
            display: block;
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 7px;
            font: inherit;
        }

        button, .back {
            display: inline-block;
            padding: 11px 18px;
            border: 0;
            border-radius: 7px;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
        }

        button {
            background: #5542df;
            color: white;
        }

        .back {
            background: #e5e7eb;
            color: #333;
        }

        .error {
            color: #dc2626;
            margin: -12px 0 15px;
        }
    </style>
</head>
<body>

{{-- Kartu memuat validasi server dan formulir pembuatan postingan. --}}
<div class="card">
    <h1>Tambah Postingan</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Kirim judul dan konten ke endpoint penyimpanan dengan perlindungan CSRF. --}}
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <label for="judul">Judul</label>
        <input
            type="text"
            id="judul"
            name="judul"
            value="{{ old('judul') }}"
            required
        >

        <label for="konten">Konten</label>
        <textarea
            id="konten"
            name="konten"
            rows="6"
            required
        >{{ old('konten') }}</textarea>

        <button type="submit">Simpan Post</button>

        <a href="{{ route('posts.index') }}" class="back">
            Kembali
        </a>
    </form>
</div>

</body>
</html>

