<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST as $key => $value) {
        $_SESSION[$key] = $value; // argument pro session
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

require_once __DIR__ .'/app/router.php';
$router = new Router();

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logic</title>
    <link rel="stylesheet" href="/lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/css/main.css">
</head>
<body>' . "\n";

require_once __DIR__ . '/app/partials/header.php';

echo $router->router();

require_once __DIR__ . '/app/partials/footer.php';
echo '
<script src="/lib/js/bootstrap.bundle.min.js"></script>
<script src="app/js/main.js"></script>
</body>
</html>' . "\n";
?>