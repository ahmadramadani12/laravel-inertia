<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Postingan - Tugas App</title>
    <style>
        /* Gaya halaman daftar, tabel postingan, aksi, dan tata letak responsif. */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f6fa;
            min-height: 100vh;
            color: #333;
        }

        header {
            background: white;
            padding: 20px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        }

        .logo {
            color: #5542df;
            font-size: 25px;
            font-weight: bold;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .welcome {
            color: #555;
            font-size: 14px;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .title {
            font-size: 30px;
            color: #263238;
        }

        .subtitle {
            color: #777;
            margin-top: 7px;
        }

        .btn-add {
            display: inline-block;
            text-decoration: none;
            background: #5542df;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-add:hover {
            background: #4533c7;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #5542df;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #eee;
            vertical-align: top;
            overflow-wrap: anywhere;
        }

        .btn {
            display: inline-block;
            border: none;
            padding: 10px 16px;
            border-radius: 7px;
            color: white;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-logout,
        .btn-delete {
            background: #dc2626;
        }

        .btn-logout:hover,
        .btn-delete:hover {
            background: #b91c1c;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .empty {
            text-align: center;
            color: #777;
            padding: 30px;
        }

        @media (max-width: 700px) {
            header {
                padding: 18px 20px;
            }

            .container {
                width: 94%;
                margin-top: 25px;
            }

            .top-section {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-right {
                flex-direction: column;
                align-items: flex-end;
            }

            .title {
                font-size: 25px;
            }

            .card {
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    {{-- Header menampilkan identitas aplikasi, pengguna, dan aksi logout. --}}
    <header>
        <div class="logo">Tugas App</div>

        <div class="header-right">
            @auth
                <span class="welcome">
                    Halo, {{ auth()->user()->name }}
                </span>
            @endauth

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-logout"
                    onclick="return confirm('Yakin ingin logout?')">
                    Logout
                </button>
            </form>
        </div>
    </header>

    {{-- Area utama menampilkan pesan sukses, aksi tambah, dan daftar postingan. --}}
    <main class="container">
        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <div class="top-section">
            <div>
                <h1 class="title">Daftar Postingan</h1>
                <p class="subtitle">Kelola semua postingan tugas kamu di sini.</p>
            </div>

            <a href="{{ route('posts.create') }}" class="btn-add">
                + Tambah Post
            </a>
        </div>

        {{-- Tabel menampilkan setiap postingan atau keadaan kosong bila belum ada data. --}}
        <section class="card">
            <table>
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Judul</th>
                        <th>Konten</th>
                        <th width="130">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- Form di setiap baris mengirim permintaan DELETE untuk postingan tersebut. --}}
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $post->judul }}</strong></td>
                            <td>{{ $post->konten }}</td>
                            <td>
                                <form
                                    action="{{ route('posts.destroy', $post->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus postingan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty">
                                Belum ada postingan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>