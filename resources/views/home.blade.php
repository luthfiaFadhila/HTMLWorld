<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Utama</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F0F4FF;
            color: #333;
        }

        .navbar {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
            background-color: #3674B5;
            padding: 15px 30px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .navbar a,
        .navbar form button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #578FCA;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            line-height: 1.5;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .navbar a:hover,
        .navbar form button:hover {
            background-color: #0ABAB5;
        }

        .logo {
            width: 160px;
            height: 160px;
            margin: 40px auto 20px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #DFF9FB;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .logo img {
            width: 90%;
            height: 90%;
            object-fit: contain;
            border-radius: 50%;
        }

        .menu {
            text-align: center;
            margin-top: 30px;
        }

        .menu button {
            display: block;
            width: 220px;
            margin: 18px auto;
            padding: 14px;
            font-size: 17px;
            background-color: #00B894;
            font-weight: bold;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: background-color 0.3s, transform 0.2s;
        }

        .menu button:hover {
            background-color: #019875;
            transform: translateY(-2px);
        }

        .navbar form {
            display: inline;
            margin: 0;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="/login">LOGIN</a>
        <a href="/register">REGISTER</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">LOGOUT</button>
        </form>
    </div>

    <div class="logo">
        <img src="/images/logoHTMLWORLD.png" alt="Logo">
    </div>

    <div class="menu">
        <form action="/materi" method="get">
            <button type="submit">MATERI</button>
        </form>
        <form action="{{ route('level.pilih') }}" method="get">
            <button type="submit">MULAI PERMAINAN</button>
        </form>
        <form action="{{ route('game.leaderboard') }}" method="get">
            <button type="submit">LEADERBOARD</button>
        </form>
        <form action="{{ route('about.index') }}" method="get">
            <button type="submit">ABOUT</button>
        </form>
    </div>

</body>
</html>
