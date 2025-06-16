<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Font dari Google -->
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

        .login-container {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #0077b6;
        }

        label {
            display: block;
            text-align: left;
            margin-top: 15px;
            font-weight: bold;
            color: #023e8a;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
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

        .success {
            color: green;
            margin-bottom: 10px;
        }

        .errors {
            color: red;
            margin-bottom: 10px;
            text-align: left;
        }

        .register-link {
            margin-top: 20px;
            font-size: 14px;
        }

        .register-link a {
            color: #0077b6;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Form Login</h2>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <!-- Menampilkan daftar error validasi -->
    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form login -->
    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Login</button>
    </form>

    <!-- Link ke halaman registrasi -->
    <div class="register-link">
        Belum punya akun? <a href="/register">Daftar di sini</a>
    </div>
</div>

</body>
</html>
