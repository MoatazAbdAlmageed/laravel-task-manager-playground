<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Welcome to Our Platform</title>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #1a202c;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 20px;
            text-align: center;
            color: white;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }

        .content {
            padding: 40px 30px;
        }

        .welcome-text {
            font-size: 18px;
            color: #4a5568;
            margin-bottom: 20px;
        }

        .button-container {
            text-align: center;
            margin-top: 30px;
        }

        .button {
            display: inline-block;
            padding: 14px 30px;
            background: #764ba2;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: transform 0.2s ease;
        }

        .footer {
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #a0aec0;
            background-color: #f9fafb;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Welcome, {{ $user->name }}!</h1>
        </div>
        <div class="content">
            <p class="welcome-text">We're absolutely thrilled to have you here. Your journey with us starts now, and we can't wait to see what you'll achieve.</p>
            <p>Our platform is designed to help you streamline your workflow and reach your goals faster than ever before.</p>
            <div class="button-container">
                <a href="{{ config('app.url') }}" class="button">Get Started Now</a>
            </div>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>

</html>