<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// ... (rest of your PHP code)
?>

<!DOCTYPE html>
<html>
<head>
    <title>404 - Page Not Found</title>
    <style>
                body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
            font-family: Arial, sans-serif;
        }
        .error-message {
            text-align: center;
            margin-bottom: 20px;
        }
        .loading-spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="error-message">
        <h1>404 - Page Not Found</h1>
        <p>The page you requested could not be found.</p>
        <p>Redirecting to home in 4 seconds...</p>
    </div>
    <div class="loading-spinner"></div>
    <script>
        setTimeout(function() {
            window.location.href = '../index.php?p=home';
        }, 3000); // 3 seconds delay
    </script>
</body>
</html>
