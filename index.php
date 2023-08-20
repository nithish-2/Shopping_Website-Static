<?php
// Start a new session
if (!isset($_SESSION)) {
	session_start();
}

// Check if the user is logged in
if (isset($_SESSION["username"])) {
	// Redirect to the first shopping page
	header("Location: ElectronicsPage.php");
	exit();
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get the name from the form
	$name = $_POST["name"];

	// Save the name in the session
	$_SESSION["username"] = $name;

	// Redirect to the first shopping page
	header("Location: ElectronicsPage.php");
	exit();
}
?>



<!DOCTYPE html>
<html>

<head>
	<title>Shopping Website</title>
	<link rel="stylesheet" type="text/css" href="CSS\style.css">
	<script src="scripts\script.js"></script>
</head>

<body>
	<header>
		<nav>
			<ul>
				<li><img src="Images/logo.png" alt="Easy Shopping Logo"></li>
				<li><a href="ElectronicsPage.php">Electronics</a></li>
				<li><a href="HomeEssentialsPage.php">Home Essentials</a></li>
				<li><a href="GroceryPage.php">Grocery</a></li>
			</ul>
		</nav>
		<section class="hero">
			<div class="hero-image">
			</div>
	</header>
	</section>
	<div class="login-popup" id="login-popup">
		<div class="login-content">
			<h2>Log In</h2>
			<form method="post">
				<label for="name">Enter your name:</label>
				<input type="text" name="name" placeholder="Your name" required>
				<button id="submit-btn" type="submit">Sign in</button>
			</form>
		</div>
	</div>

	<footer>
		<p>&copy; 2023 Easy Shopping Website. All rights reserved.</p>
	</footer>
</body>

</html>