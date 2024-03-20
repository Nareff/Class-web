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
				<li><a href='#slider'>Galerie</a></li>
				<li><a href="#playersSection">Joueurs</a></li>
				<li><a href="#legal">Contact</a></li>
			</ul>
		</nav>
	</header>

	<section id="slider">
		
		<div class="container">
		<input type="radio" name="slider" id="item-1" checked>
		<input type="radio" name="slider" id="item-2">
		<input type="radio" name="slider" id="item-3">
		<div class="cards">
		<label class="card" for="item-1" id="song-1">
		  <img src="./templates/assets/img/3.jpeg" alt="song">
		</label>
		<label class="card" for="item-2" id="song-2">
		  <img src="./templates/assets/img/2.jpeg" alt="song">
		</label>
		<label class="card" for="item-3" id="song-3">
		  <img src="./templates/assets/img/1.jpeg" alt="song">
		</label>
		</div>
		</div>
		</div>

	</section>

	<section id="playersSection">

		<div class="player">
			<div class="leftpart">
				<img src="./templates/assets/img/j1.webp">
			</div>
			<div class="rightpart">
				<h2>Kiin</h2>
				<div><img src="./templates/assets/img/Lanes/top.jpg"><p>Top Laner</p></div>
				<p>Kim "Kiin" Gi-in (Hangul: 김기인) is a League of Legends esports player, currently top laner for Gen.G.</p>
			</div>
		</div>
		
		<div class="player">
			<div class="leftpart">
				<img src="./templates/assets/img/j2.webp">
			</div>
			<div class="rightpart">
				<h2>Canyon</h2>
				<div><img src="./templates/assets/img/Lanes/jgk.jpg"><p>Jungler</p></div>
				<p>Kim "Canyon" Geon-bu (Hangul: 김건부) is a League of Legends esports player, currently jungler for Gen.G.</p>
			</div>
		</div>

		<div class="player">
			<div class="leftpart">
				<img src="./templates/assets/img/j3.webp">
			</div>
			<div class="rightpart">
				<h2>Chovy</h2>
				<div><img src="./templates/assets/img/Lanes/mid.jpg"><p>Mid Laner</p></div>
				<p>Jeong "Chovy" Ji-hoon (Hangul: 정지훈) is a League of Legends esports player, currently mid laner for Gen.G. He was previously known as ji hun.</p>
			</div>
		</div>

		<div class="player">
			<div class="leftpart">
				<img src="./templates/assets/img/j4.webp">
			</div>
			<div class="rightpart">
				<h2>Lehends</h2>
				<div><img src="./templates/assets/img/Lanes/sup.jpg"><p>Support</p></div>
				<p>Son "Lehends" Si-woo (Hangul: 손시우) is a League of Legends esports player, currently support for Gen.G.</p>
			</div>
		</div>

		<div class="player">
			<div class="leftpart">
				<img src="./templates/assets/img/j5.webp">
			</div>
			<div class="rightpart">
				<h2>Peyz</h2>
				<div><img src="./templates/assets/img/Lanes/bot.jpg"><p>Bot Laner</p></div>
				<p>Kim "Peyz" Su-hwan (Hangul: 김수환) is a League of Legends esports player, currently bot laner for Gen.G.</p>
			</div>
		</div>

	</section>

</body>
</html>

<?php
include './templates/parts/footer.php';
?>