<?php
if (!isset($_SESSION['auth'])) {
    header('Location: /login');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="/favicon.png">
        <title>COSC 4806</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <!--Added Bootsrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootsrap icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <!-- Added CSS style -->
        <link rel="stylesheet" href="/style.css">     

    </head>

    <body>
      <nav class="navbar">
        <div class="container">
          <a class="navbar-brand" href="/home">Entertainment Review</a>
          <ul>
            <li class="nav-item"><a href="/home">Home</a></li>
            <li class="nav-item"><a href="/logout">Logout</a></li>
          </ul>
        </div>
      </nav>
      


