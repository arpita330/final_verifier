<?php
// verify.php - This handles the webhook and redirects to the Mini App

// Get the webhook parameter
$webhook = isset($_GET['webhook']) ? $_GET['webhook'] : '';

// Decode the webhook URL
$webhook_url = urldecode($webhook);

// You can process the webhook here if needed
// For example, store in database, verify user, etc.

// Then redirect to the actual Mini App with the webhook data
// The Mini App will handle the Telegram data from the URL fragment
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
    <style>
        body {
            background: #0b1424;
            color: #0ff;
            font-family: monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        .loader {
            border: 3px solid #0ff3;
            border-top: 3px solid #0ff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    </style>
</head>
<body>
    <div class="loader"></div>
    <div>🔄 Verifying... Please wait</div>
    
    <script>
        // Redirect to the main Mini App with the webhook data
        // The Telegram data will be in the URL fragment (after #)
        setTimeout(() => {
            window.location.href = '/index.html?webhook=<?php echo urlencode($webhook_url); ?>' + window.location.hash;
        }, 1500);
    </script>
</body>
</html>
