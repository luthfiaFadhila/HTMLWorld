<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Registrasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #ade8f4, #caf0f8);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #0077b6;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #023e8a;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: #00b4d8;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #0077b6;
        }

        .error {
            background: #ffe5e5;
            border-left: 4px solid red;
            padding: 10px;
            color: red;
            margin-bottom: 15px;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .login-link a {
            color: #0077b6;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Form Registrasi</h2>

    <!-- Menampilkan error validasi -->
    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form registrasi -->
    <form method="POST" action="{{ url('/register') }}">
        @csrf

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" placeholder="Username" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email" required>

        <label for="institusi">Institusi:</label>
        <input type="text" name="institusi" id="institusi" placeholder="Nama Institusi" required>

        <label for="kelas">Kelas:</label>
        <input type="text" name="kelas" id="kelas" placeholder="Kelas" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Password" required>

        <label for="password_confirmation">Konfirmasi Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi Password" required>

        <button type="submit">Daftar</button>
    </form>

    <div class="login-link">
        Sudah punya akun? <a href="/login">Login di sini</a>
    </div>
</div>

</body>
</html>
