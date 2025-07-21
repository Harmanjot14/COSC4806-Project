<?php session_start(); ?>
<?php
if (isset($_SESSION['auth']) == 1) {
    header('Location: /home');
}
?>

<!DOCTYPE html>
<html lang="en">
    <link rel="icon" href="/favicon.png">
    <title>COSC 4806</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <!-- Added CSS style -->
    <link rel="stylesheet" href="/style.css">
    <!--Added Bootsrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="container">
          <a class="navbar-brand" href="/home">Movie Project</a>
          <ul>
            <li class="nav-item"><a href="/home">Home</a></li>
            <li class="nav-item"><a href="/login">Login</a></li>
          </ul>
        </div>
      </nav>
      