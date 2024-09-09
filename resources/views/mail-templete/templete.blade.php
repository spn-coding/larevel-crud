<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            background-color: #3498db;
            color: white;
            padding: 10px;
            border-radius: 8px 8px 0 0;
        }
        .header h1 {
            margin: 0;
        }
        .body {
            padding: 20px;
            color: #333;
        }
        .body p {
            line-height: 1.6;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #f4f4f4;
            color: #888;
            border-radius: 0 0 8px 8px;
        }
        .footer a {
            color: #3498db;
            text-decoration: none;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to {{ $company }}</h1>
        </div>
        <div class="body">
            <p>Dear {{ $name }},</p>
            <p>{{ $mailMessage }}</p>
            <p>Thank you for joining us. We are excited to have you on board! Below is some important information to get you started.</p>
            <p>If you have any questions, feel free to reach out to us at any time.</p>
            <a href="http://localhost:8000/dashboard" class="button">Get Started</a>
            <p>Best Regards,<br>{{ $company }}</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 {{ $company }}. All rights reserved.</p>
            <p><a href="#">Unsubscribe</a> | <a href="#">Contact Us</a></p>
        </div>
    </div>
</body>
</html>
