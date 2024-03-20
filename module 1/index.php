<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./templates/assets/css/style1.css">
    <title>OnePage</title>
</head>
<body>

<header>
    <img src="logo.svg" alt="Logo" class="logo">
    <nav>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">À propos</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header>
<div class="slider">
    <div id="slide1" class="slide"></div>
    <div id="slide2" class="slide"></div>
    <div id="slide3" class="slide"></div>
    <div class="slides">
        <img src="SPW.JPG" alt="Image 1">
        <img src="WOG.png" alt="Image 2">
        <img src="logo.svg" alt="Image 3">
    </div>
    <a href="#slide3" class="prev" tabindex="0">&#10094;</a>
    <a href="#slide2" class="next" tabindex="0">&#10095;</a>
</div>
<div class="container">
    <img src="Pika.jpg" alt="Image 1" width="300" height="200">
    <img src="Pika.jpg" alt="Image 2" width="300" height="200">
    <img src="Pika.jpg" alt="Image 3" width="300" height="200">
</div>
</body>
</html>

<?php
include './templates/parts/footer.php';
?>