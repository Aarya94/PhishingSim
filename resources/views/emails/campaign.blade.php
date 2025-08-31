<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $campaign->subject }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background: #f9f9f9;
            padding: 20px;
        }
        .container {
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        h3 {
            color: #2c3e50;
        }
        a.button {
            display: inline-block;
            padding: 10px 16px;
            margin-top: 12px;
            background: #3498db;
            color: #fff !important;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        a.button:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>{{ $campaign->subject }}</h3>

        {{-- Campaign email body --}}
        <p>{!! nl2br(e($body)) !!}</p>

        {{-- Phishing simulation link --}}
        <p>
            <a href="{{ $campaign->phishing_link }}" class="button">
    Click here to login and view details
</a>

        </p>
    </div>
</body>
</html>
