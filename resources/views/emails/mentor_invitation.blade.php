<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Invitation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            background-color: #ffffff;
            padding: 20px;
            margin: 0 auto;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }
        .content {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #283566;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #999;
            text-align: center;
        }
        .footer p {
            margin: 5px 0;
        }
        @media screen and (max-width: 600px) {
            .email-container {
                width: 100%;
                padding: 10px;
            }
            .email-body {
                font-size: 14px;
            }
            .email-button {
                padding: 12px 25px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section with Logo -->
        <div class="header">
            <img src="{{ asset($contactUs->site_logo)}}" alt="WGRCFP Logo">
            <h1>Welcome to Women In GRC & Financial Crime Prevention!</h1>
        </div>

        <!-- Content Section -->
        <div class="content">
            <p>Hello {{ $name }},</p>
            <p>You have been invited by {{ $email }} to become a mentor. Please click below to accept the invitation:</p>
            <a href="{{ url('/accept-mentor-invitation?email=' . $email) }}">Accept Invitation</a>
        
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} WGRCFP. All rights reserved.</p>
            <p>Women In GRC & Financial Crime Prevention</p>
            <p><a href="https://www.wgrcfp.org" style="color: #555; text-decoration: none;">https://www.wgrcfp.org</a></p>
        </div>
    </div>
</body>
</html>