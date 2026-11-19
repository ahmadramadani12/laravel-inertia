<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Posts</title>

    <style>
        /* Gaya berikut membentuk kartu login, kontrol form, dan pesan validasi. */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f6fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 400px;
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .logo {
            text-align: center;
            color: #5542df;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .title {
            text-align: center;
            font-size: 27px;
            margin-bottom: 8px;
            color: #263238;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #374151;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
        }

        input:focus {
            border-color: #5542df;
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: #5542df;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-login:hover {
            background: #4533c7;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 6px;
        }
    </style>
</head>

<body>

    <div class="login-card">

        <div class="logo">POSTS</div>

        <h1 class="title">Login</h1>

        <p class="subtitle">
            Silakan masuk untuk melanjutkan
        </p>

        {{-- Kirim kredensial ke rute login dan lindungi formulir dengan token CSRF. --}}
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required
                >

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <button type="submit" class="btn-login">
                Login
            </button>

        </form>

    </div>

</body>
</html>