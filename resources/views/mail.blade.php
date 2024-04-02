<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Membership Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
            margin-top: 0;
        }

        p {
            margin-bottom: 20px;
            color: #555;
        }

        .highlight {
            color: #007bff;
            font-weight: bold;
        }

        .divider {
            border-top: 1px solid #ccc;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
            color: #888;
            font-size: 14px;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Membership Confirmation</h1>
        <p>Dear <span class="highlight"><?php echo htmlspecialchars(Auth::user()->name); ?></span>,</p>
        <p>We're thrilled to confirm that you've successfully availed our <span class="highlight"><?php echo htmlspecialchars($membership); ?></span> Membership for <span class="highlight"><?php echo htmlspecialchars($duration); ?> months</span>.</p>
        <p>Your dedication to fitness is commendable, and we're excited to accompany you on this journey.</p>
        <p>Your due payment amounts to <span class="highlight"><?php echo htmlspecialchars($payment); ?></span>.</p>
        <div class="divider"></div>
        <p>Please let us know if you have any questions or need further assistance.</p>
        <p>Warm regards,</p>
        <p>The Gym Team</p>
        <div class="footer">
            <p>123 Gym Street, Fitness City, Gymland</p>
            <p>Email: info@fitzone.com | Phone: 123-456-7890</p>
        </div>
    </div>
</body>
</html>
