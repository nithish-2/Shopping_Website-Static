<?php
// Start a new session
if (!isset($_SESSION)) {
	session_start();
}

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
	// Redirect to the first page
	header("Location: index.php");
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
		<?php include('scripts/logout.php'); ?>
		<nav>
			<ul>
				<li><img src="Images/logo.png" alt="Easy Shopping Logo"></li>
				<li><a href="ElectronicsPage.php">Electronics</a></li>
				<li><a href="HomeEssentialsPage.php">Home Essentials</a></li>
				<li><a href="GroceryPage.php">Grocery</a></li>
			</ul>
			<p>Welcome,
				<?php echo $_SESSION["username"]; ?>
			</p>
			<form method="post">
				<button type="submit" name="logout">Logout</button>
			</form>
		</nav>
	</header>


	<?php include('scripts/cart.php'); ?>

	<?php include('scripts/form-validation.php'); ?>

	<section class="formSection" id="formSection">
		<div class="form" id="form">
			<h2>Submit below form to complete purchase</h2>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<label>Name</label>
				<input id="name" size="40" placeholder="name" type="text" name="name">
				<span class="error">
					<?php echo $nameError; ?>
				</span><br />


				<label>Email</label>
				<input id="email" size="40" placeholder="email@domain.com" type="email" name="email">
				<span class="error">
					<?php echo $emailError; ?>
				</span><br />


				<label>Phone</label>
				<input id="phone" size="40" placeholder="123-123-1234" type="phone" name="phone">
				<span class="error">
					<?php echo $phoneError; ?>
				</span><br />



				<label>Address</label>
				<input id="address" size="40" placeholder="Street name" type="address" name="address">
				<span class="error">
					<?php echo $addressError; ?>
				</span><br />

				<label>City</label>
				<input id="city" size="40" placeholder="city name" type="city" name="city">
				<span class="error">
					<?php echo $cityError; ?>
				</span><br />

				<label>Province</label>
				<select name="province" id="province">
					<option value="">----- Select -----</option>
					<option value="Alberta">Alberta</option>
					<option value="British">British</option>
					<option value="Manitoba">Manitoba</option>
					<option value="New Brunswick">New Brunswick</option>
					<option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
					<option value="Northwest Territories">Northwest Territories</option>
					<option value="Nova Scotia Columbia">Nova Scotia Columbia</option>
					<option value="Nunavut">Nunavut</option>
					<option value="Ontario">Ontario</option>
					<option value="Prince">Prince</option>
					<option value="Quebec">Quebec</option>
					<option value="Saskatchewan">Saskatchewan</option>
					<option value="Yukon">Yukon</option>
				</select>
				<span class="error">
					<?php echo $provinceError; ?>
				</span><br />

				<label>Country</label>
				<select name="country" id="country">
					<option value="">----- Select -----</option>
					<option value="Canada">Canada</option>
				</select>
				<span class="error">
					<?php echo $countryError; ?>
				</span><br />

				<label>Post Code</label>
				<input id="postcode" size="7" placeholder="X9X 9X9" type="postcode" name="postcode">
				<span class="error">
					<?php echo $postcodeError; ?>
				</span><br />

				<label>Name on Card</label>
				<input id="cardname" size="40" placeholder="Name on Card" type="cardname" name="cardname">
				<span class="error">
					<?php echo $cardnameError; ?>
				</span><br />

				<label>Credit Card Number</label>
				<input id="cardnumber" size="40" placeholder="XXXX-XXXX-XXXX-XXXX" type="cardnumber" name="cardnumber">
				<span class="error">
					<?php echo $cardnumberError; ?>
				</span><br />

				<label>Credit Card Exp</label>
				<input id="cardexpmonth" size="4" placeholder="XXX" type="cardexpmonth" name="cardexpmonth">
				<input id="cardexpyear" size="5" placeholder="XXXX" type="cardexpyear" name="cardexpyear">
				<span class="error">
					<?php echo $cardexpError; ?>
				</span><br />

				<label>CVV</label>
				<input id="cardcvv" size="4" placeholder="XXX" type="cardcvv" name="cardcvv">
				<span class="error">
					<?php echo $cardcvvError; ?>
				</span><br />
				<br />
				<input type="submit" name="submit" value="Submit">
				<br><br>
			</form>
			<p id="errors">
			</p>
		</div>
	</section>


	<section class="receiptsection" id="receiptsection">
		<div class="container">
			<?php if (isset($_POST['submit'])) {
				if ($formvalidity) { ?>
					<h2>Receipt</h2>
					<h4>Customer Name:</h4>
					<p>
						<?php echo $customername; ?>
					</p>
					<h4>Customer Email:</h4>
					<p>
						<?php echo $customeremail; ?>
					</p>
					<h4>Customer Phone:</h4>
					<p>
						<?php echo $customerphone; ?>
					</p>
					<h4>Customer Address:</h4>
					<p>
						<?php echo $customeraddress; ?>,
						<?php echo $customercity; ?>,
						<?php echo $customerprovince; ?>,
						<?php echo $customercountry; ?>,
						<?php echo $customerpostcode; ?>
					</p>

					<h3>Items Purchased:</h3>
					<?php include('scripts/display-receipt-items.php');
					$tax = 0;
					$total = 0;
					$taxvalue = 0;
					if (
						$customerprovince == 'Alberta' ||
						$customerprovince == "Yukon" ||
						$customerprovince == "Northwest Territories" ||
						$customerprovince == "Nunavut"
					) {
						$tax = 5;
					} else if ($customerprovince == "Saskatchewan") {
						$tax = 11;
					} else if (
						$customerprovince == "British Columbia" ||
						$customerprovince == "Manitoba"
					) {
						$tax = 12;
					} else if ($customerprovince == "Ontario") {
						$tax = 12;
					} else if ($customerprovince == "Quebec") {
						$tax = 14.9;
					} else if (
						$customerprovince == "New Brunswick" ||
						$customerprovince == "Newfoundland and Labrador" ||
						$customerprovince == "Nova Scotia" ||
						$customerprovince == "Prince Edward Island"
					) {
						$tax = 15;
					} else {
						$tax = 0;
					}

					$taxvalue = (calculateSubtotal() * ($tax / 100));

					$total = calculateSubtotal() + $taxvalue;

					?>
					<h3>SUBTOTAL:
						<?php echo calculateSubtotal(); ?> $
					</h3>
					<h3>TAX:
						<?php echo $taxvalue; ?> $
					</h3>
					<h3>Total:
						<?php echo $total; ?> $
					</h3>
					<button id="gotomainpage" onclick="goToMainPage()">Go to Main Page</button>
					<script>
						function goToMainPage() {
							window.location.href = "index.php";
							<?php
							unset($_SESSION['cart']);
							?>}
					</script>
				<?php }
			}
			?>
		</div>
	</section>

	<footer>
		<p>&copy; 2023 Easy Shopping Website. All rights reserved.</p>
	</footer>
</body>

</html>