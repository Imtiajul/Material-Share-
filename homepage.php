<?php
include_once('session.php');
//session_start();
//include("connect.php");

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>BorrowBook</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
			<header id="header">
				<div class="inner">
					<a href="homepage.php" class="logo"><strong>BorrowBook</strong></a>
					<nav id="nav">
						<a href="homepage.php">Home</a>
						<a href="profile.php">Profile</a>
						<!-- <a href="aboutus.php">About Us</a> -->
						<a href="finalLogout.php">Logout</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<?php
						$u_name = $login_session;
						$msg = "Welcome to BorrowBook ";
						$totalmsg = $msg.$u_name;
						echo "<h1>".$totalmsg."</h1>";
						?>
					</header>

					<div class="flex ">

						<div>
							<a href="uploadbook.php"><img src="images/uploadbook.png"></a>
							<h3>Upload Book</h3>
							<p>Share a good book with other reader...</p>
						</div>

						<div>
							<a href="getbook.php"><img src="images/getbook.png"></a>
							<h3>Get Book</h3>
							<p>Happiness is... getting lost in a good book</p>
						</div>

						<div>
							<h3>Other Helpfulsite</h3>
							<a href="https://www.rokomari.com/book"># Rokomari </a><br>
							<a href="https://www.boibazar.com/"># Boibazar </a><br>
							<a href="https://www.amazon.com/b/ref=usbk_surl_books/?node=283155"># Amazon </a><br>
						</div>
					</div>
				</div>
			</section>


		<!-- Three -->
			<section id="three" class="wrapper align-center">
				<div class="inner">
					<div class="flex flex-2">
						<article>
							<div class="image round" >
								<img src="images/Imtiaj.jpg" alt="Imtiajul Islam" />
							</div>
							<header>
								<h3>Imtiajul Islam</h3>
							</header>
							<p>EWU, CSE</p>
							<footer>
								<a href="https://www.facebook.com/iimtiajul" class="button">Learn More</a>
							</footer>
						</article>
						<article>
							<div class="image round">
								<img src="images/Sadik.jpg" alt="Sakik Nahian" />
							</div>
							<header>
								<h3>Sadik Nahian</h3>
							</header>
							<p>EWU, CSE</p>
							<footer>
								<a href="#" class="button">Learn More</a>
							</footer>
						</article>
					</div>
				</div>
			</section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>